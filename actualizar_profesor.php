<?php
include "conexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['dni_p']) && isset($_POST['nombre_p'])) {
        $dni_p = mysqli_real_escape_string(mysql: $conectar, string: $_POST['dni_p']);
        $nombre = mysqli_real_escape_string(mysql: $conectar, string: $_POST['nombre_p']);

        $sql = "UPDATE profesor SET Nombre = ? WHERE dni_p = ?";
        $stmt = mysqli_prepare(mysql: $conectar, query: $sql);
        mysqli_stmt_bind_param(statement: $stmt, types: "ss", var: $nombre, vars: $dni_p);

        if (mysqli_stmt_execute(statement: $stmt)) {
            echo "<script> alert('Registro actualizado correctamente.'); window.location.href='administrador.php'; </script>";
        } else {
            echo "<script> alert('Error al actualizar el registro.'); window.history.back(); </script>";
        }

        mysqli_stmt_close(statement: $stmt);
    } else {
        echo "<script> alert('Datos incompletos.'); window.history.back(); </script>";
    }
} else {
    echo "<script> alert('Método de solicitud no válido.'); window.history.back(); </script>";
}

mysqli_close(mysql: $conectar);
?>