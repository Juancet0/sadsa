<?php

$host = "localhost";
$User = "root";
$pass = "";
$db = "colegio2";

$conn = mysqli_connect($host, $User, $pass, $db);

if(!$conn){
    echo "Fallo de conexion con la base de datos";
    exit;
}

?>