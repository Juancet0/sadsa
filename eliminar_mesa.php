<?php
include "conexion.php";
$id_mesa = $_GET['codigm'];
$sql = "DELETE FROM mesa WHERE id_mesa = $id_mesa";
$res = mysqli_query($conn, $sql);
if($res){
    echo "<script> alert('el registro se elimino');history.go(-1);</script>";
}
else{
    echo "<script> alert('el registro no se pudo eliminar');history.go(-1);</script>";
}
mysqli_close($conn);


?>