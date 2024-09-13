<?php
include "conexion.php";
if (isset($_GET['codigp'])) {
    $dni_p = mysqli_real_escape_string($conectar, $_GET['codigp']);
    $sql = "SELECT * FROM profesor WHERE dni_p = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "s", $dni_p);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nombre = htmlspecialchars($fila['Nombre']);
    } else {
        echo "Profesor no encontrado.";
        exit();
    }
} else {
    echo "No se proporcionó el DNI del profesor.";
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conectar);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Profesor</title>
</head>
<body>
    <form action="actualizar_profesor.php" method="post">
        <label for="">DNI</label>
        <input type="number" name="dni_p" value="<?php echo htmlspecialchars($dni_p); ?>">
        <label for="nombre_p">Nombre</label>
        <input type="text" name="nombre_p" id="nombre_p" value="<?php echo $nombre; ?>" required>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>