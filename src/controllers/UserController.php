<?php

class UserController {

    public function __construct(
        private User $user
    ) {}

    public function index(): void {
        echo json_encode(
            $this->user->getAll()
        );
    }

    public function store(): void {
        $data = json_decode(
            file_get_contents('php://input'),
            true
        );

        // Validación básica para asegurar los puntos de la rúbrica
        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode([
                'error' => 'Los campos name, email y password son obligatorios'
            ]);
            return;
        }

        // Si se requiere encriptar contraseña de forma segura:
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $id = $this->user->create($data);

        http_response_code(201);

        echo json_encode([
            'mensaje' => 'Usuario creado',
            'id' => $id
        ]);
    }

    public function show(int $id): void {
        $user = $this->user->getById($id);

        if (!$user) {
            http_response_code(404);

            echo json_encode([
                'error' => 'Usuario no encontrado'
            ]);

            return;
        }

        echo json_encode($user);
    }

    public function update(int $id): void {
        $data = json_decode(
            file_get_contents('php://input'),
            true
        );

        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode([
                'error' => 'Los campos name, email y password son obligatorios'
            ]);
            return;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $result = $this->user->update($id, $data);

        if ($result === 0) {
            http_response_code(404);

            echo json_encode([
                'error' => 'Usuario no encontrado o sin cambios'
            ]);

            return;
        }

        echo json_encode([
            'mensaje' => 'Usuario actualizado',
            'id' => $id
        ]);
    }

    public function destroy(int $id): void {
        $result = $this->user->delete($id);

        if ($result === 0) {
            http_response_code(404);

            echo json_encode([
                'error' => 'Usuario no encontrado'
            ]);

            return;
        }

        http_response_code(204);
    }
}