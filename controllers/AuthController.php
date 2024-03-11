<?php
session_start();
require_once '../models/UsuarioModel.php';
class AuthController {
    public function login($email, $password) {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->getUserByEmail($email);
        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['email'] = $email;
            header('Location: ../views/dashboard.php');
            exit();
        } else {
            echo "Credenciales incorrectas".$password.$email;
        }
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $authController = new AuthController();
    $authController->login($email, $password);
}
?>