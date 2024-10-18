<?php
include "conexion.php";

if(!isset($_POST['dniR']) || !isset($_POST['nombreR']) || !isset($_POST['codCurso'])){
    die ("Datos incompletos");
}

$dni = mysqli_real_escape_string($conn, $_POST['dniR']);
$nombre = mysqli_real_escape_string($conn, $_POST['nombreR']);
$codCurso = mysqli_real_escape_string($conn, $_POST['codCurso']);

// Preparamos la consulta SQL con marcadores de posición
$stmt = mysqli_prepare($conn, "INSERT INTO usuario (dni_u, nombre_usuario, cod_curso, tipo_usuario) VALUES (?, ?, ?, 0)");

// Vinculamos las variables con los marcadores de posición
mysqli_stmt_bind_param($stmt, "isi", $dni, $nombre, $codCurso);

// Ejecutamos la consulta
mysqli_stmt_execute($stmt);

// No es necesario usar mysqli_stmt_get_result en este caso ya que es una inserción y no una consulta SELECT
if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Asignamos las variables de sesión
    $_SESSION['nombre_usuario'] = $nombre;
    $_SESSION['dni_u'] = $dni;
    $_SESSION['codCurso'] = $codCurso;
    header("Location: .php");
    exit();
} else {
    echo "<script>alert('¡Error al registrar usuario!'); history.go(-1)</script>";
}

// Cerramos el statement
mysqli_stmt_close($stmt);
?>




