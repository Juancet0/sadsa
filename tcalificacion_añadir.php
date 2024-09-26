<?php
session_start();

$dni_usuario = $_SESSION['dni_u'];

include 'conexion.php';

$materia_q = "SELECT * FROM materia";
$materias = mysqli_query($conn, $materia_q);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Añadir Calificación</title>
    <script>

        function calcularNotaFinal() {
            var t1 = parseFloat(document.getElementById('t1').value) || 0;
            var t2 = parseFloat(document.getElementById('t2').value) || 0;
            var t3 = parseFloat(document.getElementById('t3').value) || 0;
            var notaFinal = (t1 + t2 + t3) / 3;
            document.getElementById('nota_final').value = notaFinal.toFixed(2);
        }
    </script>
    
</head>
<body>
    <div class="contenedor-form">
    <form action="tcalificacion_guardar.php" method="POST" class="formulario">
            <center>
            <h1>Añadir Calificación</h1>

            <p>
                <label for="materia">Materia: </label>
                <select name="materia" id="materia" required>
                    <?php
                    while ($materia = mysqli_fetch_assoc($materias)) {
                        echo "<option value='" . $materia['id_materia'] . "'>" . $materia['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="t1">Trimestre 1 (T1): </label>
                <input type="number" id="t1" name="t1" step="0.01" required oninput="calcularNotaFinal()">
            </p>
            <p>
                <label for="t2">Trimestre 2 (T2): </label>
                <input type="number" id="t2" name="t2" step="0.01" required oninput="calcularNotaFinal()">
            </p>
            <p>
                <label for="t3">Trimestre 3 (T3): </label>
                <input type="number" id="t3" name="t3" step="0.01" required oninput="calcularNotaFinal()">
            </p>
            <p>
                <label for="nota_final">Nota Final: </label>
                <input type="number" id="nota_final" name="nota_final" step="0.01" readonly>
            </p>
            <p>
                <button type="submit">Guardar</button>
                <button type="reset">Cancelar</button>
            </p>
            <p><a href="calificacion.php">Volver</a></p>
            </center>
        </form>
    </div>
</body>
</html>
