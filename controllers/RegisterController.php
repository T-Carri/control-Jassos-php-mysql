<?php
session_start();
/* require_once '../includes/functions.php'; */
require_once '../models/UsuarioModel.php';




class RegisterController {
public function register( $nombre, $email, $password) {
    $usuarioModel = new UsuarioModel();

    // Verificar si el usuario ya existe
    if ($usuarioModel->getUserByEmail($email)) {
        echo "El usuario ya existe.";
        return;
    }

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos
    $success = $usuarioModel->insertUser($nombre, $email, $hashed_password);

    if ($success) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
}





// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $RegisterController = new RegisterController();
    $RegisterController->register( $nombre, $email, $password);
}

?>