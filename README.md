API REST de Usuarios (PHP MVC)

Proyecto backend desarrollado en PHP nativo utilizando el patron Modelo-Vista-Controlador (MVC) y PDO para la gestion de usuarios.

Requisitos de Ejecucion

1 PHP 8.x instalado (ej: XAMPP).
2 Servidor MySQL activo (phpMyAdmin).
3 Servidor PHP local ejecutado desde la terminal en la raiz del proyecto:

Bash
C:\xampp\php\php.exe -S localhost:8000 -t public
Base de Datos SQL

Endpoints y Pruebas

La API opera en la ruta base: http://localhost:8000/api/users

Obtener todos los usuarios (GET)

Postman: Metodo GET en http://localhost:8000/api/users

cURL:

Bash
curl -X GET http://localhost:8000/api/users
Obtener un usuario por ID (GET)

Postman: Metodo GET en http://localhost:8000/api/users/1

cURL:

Bash
curl -X GET http://localhost:8000/api/users/1
Crear un usuario (POST)

Postman: Metodo POST en http://localhost:8000/api/users (Seleccionar Body -> raw -> JSON)

cURL:

Bash
curl -X POST http://localhost:8000/api/users \
     -H "Content-Type: application/json" \
     -d '{"name":"Juan Perez","email":"juan@example.com","password":"123"}'
Actualizar un usuario (PUT)

Postman: Metodo PUT en http://localhost:8000/api/users/1 (Body -> raw -> JSON)

cURL:

Bash
curl -X PUT http://localhost:8000/api/users/1 \
     -H "Content-Type: application/json" \
     -d '{"name":"Juan Modificado","email":"juan.mod@example.com","password":"456"}'
Eliminar un usuario (DELETE)

Postman: Metodo DELETE en http://localhost:8000/api/users/1

cURL:

Bash
curl -X DELETE http://localhost:8000/api/users/1
Codigos de Estado HTTP

200 OK: Peticion exitosa de lectura o actualizacion.

201 Created: Registro creado con exito.

204 No Content: Registro eliminado correctamente.

400 Bad Request: Datos incompletos o JSON invalido.

404 Not Found: Recurso no encontrado.

500 Internal Server Error: Error de conexion o servidor.

![Prueba de API en Postman](./img/postman.JPEG)