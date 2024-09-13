<?php
session_start();
include "conexion.php";
if (!isset($_POST['dni']) || !isset($_POST['nombre'])) {
    die("Datos Incompletos");
}

$dni = mysqli_real_escape_string($conectar, $_POST['dni']);
$nombre = mysqli_real_escape_string($conectar, $_POST['nombre']);
$stmt = mysqli_prepare($conectar, "SELECT * FROM usuario WHERE dni_u = ? AND nombre_usuario = ?");
mysqli_stmt_bind_param($stmt, "ss", $dni, $nombre);
mysqli_stmt_execute($stmt);
$resul = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resul) > 0) {
    $_SESSION['nombre_usuario'] = $nombre;
    $_SESSION['dni_u'] = $dni;
    header("Location: administrador.php");
    exit();
} else {
    echo "<script>alert('¡Error al iniciar sesión!'); history.go(-1)</script>";
}