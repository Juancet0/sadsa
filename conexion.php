<?php

$host = "localhost";
$User = "root";
$pass = "";
$db = "colegio";

$conectar = mysqli_connect($host, $User, $pass, $db);

if(!$conectar){
    echo "Fallo de conexion con la base de datos";
    exit;
}

?>