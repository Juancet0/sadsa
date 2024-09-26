<?php
session_start(); 


$dni_usuario = $_SESSION['dni_u'];

include 'conexion.php';

$materia_id = $_POST['materia'];
$t1 = $_POST['t1'];
$t2 = $_POST['t2'];
$t3 = $_POST['t3'];
$nota_final = $_POST['nota_final'];

$sql = "INSERT INTO calificaciones (id_materia, dni_u, T1, T2, T3, nota_final) VALUES ('$materia_id', '$dni_usuario', '$t1', '$t2', '$t3', '$nota_final')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('La calificación se guardó correctamente.'); window.location.href = 'calificacion.php';</script>";
} else {
    echo "<script>alert('Error: No se pudo guardar la calificación.'); history.go(-1);</script>";
}

mysqli_close($conn);
?>
