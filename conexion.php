<?php
$host = "198.59.144.15";
$usuario = "jassosmx_darkNight";
$contrasena = "bze0][n{*7Xl";
$base_datos = "jassosmx_sij";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>