<?php

$method = $_SERVER['REQUEST_METHOD'];

$path = parse_url(
    $_SERVER['REQUEST_URI'],
    PHP_URL_PATH
);

// Ruta para listar todos (GET) y crear (POST)
if ($path === '/api/users') {
    if ($method === 'GET') {
        $controller->index();
        exit;
    }
    if ($method === 'POST') {
        $controller->store();
        exit;
    }
}

// Rutas para mostrar por ID (GET), actualizar (PUT) y eliminar (DELETE)
if (preg_match('#^/api/users/([1-9][0-9]*)$#', $path, $matches)) {

    $id = (int) $matches[1];

    if ($method === 'GET') {
        $controller->show($id);
        exit;
    }

    if ($method === 'PUT') {
        $controller->update($id);
        exit;
    }

    if ($method === 'DELETE') {
        $controller->destroy($id);
        exit;
    }
}

http_response_code(404);

echo json_encode([
    'error' => 'Endpoint no encontrado'
]);