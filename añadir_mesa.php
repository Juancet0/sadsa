<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Mesa</title>
</head>
<body>
    <form action="" method="post">
        <label for="idmesa">Id Mesa</label><br>
        <input type="number" name="dni" id="dni" placeholder="Ingrese el Id de la mesa" required><br>
        <label for="fechamesa">Fecha</label><br>
        <input type="date" name="fechamesa" id="fechamesa" placeholder="Fecha de la mesa" required><br>
        <label for="hora">Hora</label><br>
        <input type="datetime" name="hora" id="hora" placeholder="Horario de la mesa" required><br>
        <label for="dni_p1">dni_p1</label><br>
        <input type="number" name="dni_p1" id="dni" placeholder="Ingrese el DNI del Profesor" required><br>
        <label for="dni_p2">dni_p2</label><br>
        <input type="number" name="dni_p2" id="dni" placeholder="Ingrese el DNI del Profesor" required><br>
        <label for="dni_p3">dni_p3</label><br>
        <input type="number" name="dni_p3" id="dni" placeholder="Ingrese el DNI del Profesor" required><br>
        <label for="id_materia">id_materia</label><br>
        <input type="number" name="id_materia" id="id_materia" placeholder="Ingrese el Id de materia" required><br>
        <input type="submit" value="Añadir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['dni']) && isset($_POST['nombre_p'])) {
            $dni = trim($_POST['dni']);
            $nombre = trim($_POST['nombre_p']);
            if (!is_numeric($dni)) {
                echo "<script> alert('El DNI debe ser un número.'); </script>";
                exit();
            }
            include "conexion.php";

            $dni = mysqli_real_escape_string($conectar, $dni);
            $nombre = mysqli_real_escape_string($conectar, $nombre);

            $stmt = mysqli_prepare($conectar, "INSERT INTO profesor (dni_p, Nombre) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "ss", $dni, $nombre);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script> alert('Se añadió el registro correctamente.'); window.location.href='administrador.php'; </script>";
            } else {
                echo "<script> alert('No se añadió el registro.'); </script>";
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo "<script> alert('Por favor, complete todos los campos.'); </script>";
        }
    }
    ?>
</body>
</html>