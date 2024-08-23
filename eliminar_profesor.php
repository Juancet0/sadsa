<?php
include "conexion.php";
$dni_prof = $_GET['codigp'];
$sql = "DELETE FROM profesor WHERE dni_p = $dni_prof";
$res = mysqli_query($conectar, $sql);
if($res){
    echo "<script> alert('el registro se elimino');history.go(-1);</script>";
}
else{
    echo "<script> alert('el registro no se pudo eliminar');history.go(-1);</script>";
}
mysqli_close($conectar);


?>
