<?php
include "conexion.php";
if (!isset($_POST['dni']) || !isset($_POST['nombre'])){
    die("Datos Incompletos");
}
$dni = mysqli_real_scape_string($conectar,$_POST['dni']);
$nombre = mysqli_real_scape_string($conectar,$_POST['nombre']);
$sql = mysqli_prepare("SELECT * FROM profesor WHERE dni_p = $dni AND Nombre = $nombre");
mysqli_stmt_bind_param($stmt, "ss", $dni, $nombre);
mysqli_stmt_execute($stmt);
$resul = mysqli_query($conectar, $sql);
$datos = mysqli_num_rows($resul);
if($datos > 0){ 
    echo "<script>alert('¡Sesion Iniciada!'); window.location = 'administrador.php'</script>";
}
else{
    echo "<script>alert('¡Error al iniciar sesion!'); history.go(-1)</script>"
}

?>