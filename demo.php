<div>
    <h1>Gestión de Usuarios (Demo)</h1>

    <form action="http://localhost:8000/api/users" method="post">
        <input type="text" name="name" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Guardar</button>
    </form>

    <?php
    $users = json_decode(file_get_contents('http://localhost:8000/api/users'), true);

    if (is_array($users)) {
        foreach($users as $user){
            echo "<p>ID: {$user['id']} - Nombre: {$user['name']} - Email: {$user['email']}</p>";
        }
    }
    ?>
</div>