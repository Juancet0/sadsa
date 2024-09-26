<?php
include "conexion.php";
$califi = $_GET['codig'];
$sql = "DELETE FROM calificaciones WHERE id_calificacion = $califi";
$res = mysqli_query($conectar, $sql);
if($res){
    echo "<script> alert('La calificación se elimino correctamente');history.go(-1);</script>";
}
else{
    echo "<script> alert('La calificación no se pudo eliminar');history.go(-1);</script>";
}
mysqli_close($conectar);


?>
