<?php
session_start();
include "conexion.php";
if (!isset($_POST['dni']) || !isset($_POST['nombre'])) {
    die("Datos Incompletos");
}
$dni = mysqli_real_escape_string($conn, $_POST['dni']);
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$stmt = mysqli_prepare($conn, "SELECT * FROM usuario WHERE dni_u = ? AND nombre_usuario = ?");
mysqli_stmt_bind_param($stmt, "is", $dni, $nombre);
mysqli_stmt_execute($stmt);
$resul = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resul) > 0) {
    $fila = mysqli_fetch_array($result);
    $tusuario = $fila['tipo_usuario'];
    $usuario = $fila['dni_u'];
    
    session_start();
    $_SESSION['dni_u'] = $usuario; 
    $_SESSION['nombre_usuario'] = $fila['nombre_usuario']; 

    if ( $tusuario ==1){ 
        echo "<script>alert('Se ha iniciado sesion correctamente'); window.location = 'calificacion.php'; </script>";
     } else if($tusuario == 0){
        echo "<script>alert('Se ha iniciado sesion correctamente'); window.location = 'calificacion.php'; </script>";
    }

}else {
    echo "<script>alert('ERROR: No se ha iniciado sesion correctamente♥');history.go(-1);</script>";

}