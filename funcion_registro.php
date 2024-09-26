<?php
include "conexion.php";
if(!isset($_POST['dniR']) & !isset($_POST['nombreR'])){
    die ("Datos incompletos");
}
$dni = mysqli_real_escape_string($conectar, $_POST['dniR']);
$nombre = mysqli_real_escape_string($conectar, $_POST['nombreR']);
$stmt = mysqli_prepare($conectar, "INSERT INTO usuario ('dni_u, nombre_usuario, tipo_usuario') VALUES $dni, $nombre, 0");
mysqli_stmt_bind_param($stmt, "ss", $dni, $nombre);
mysqli_stmt_execute($stmt);
$resul = mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($resul) > 0){
    $_SESSION['nombre_usuario'] = $nombre;
    $_SESSION['dni_u'] = $dni;
    header("Location: administrador.php");
    exit();
} else {
    echo "<script>alert('¡Error al iniciar sesión!'); history.go(-1)</script>";
}






