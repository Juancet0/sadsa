<?php
session_start();

// Verifica si la sesion existe, sino redirige al usuario al index, si no inicio sesion
if (!isset($_SESSION['dni_u']) || !isset($_SESSION['nombre_usuario'])) {

    echo "<script>alert('Por favor, inicie sesión para acceder a esta página.'); window.location = 'index.php';</script>";
    exit();
}

// variables del iniciar sesion
$nombre_usuario = $_SESSION['nombre_usuario'];
$dni_usuario = $_SESSION['dni_u']; 


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tabla Calificaciones</title>
</head>
<body>
<center>
<p>Alumno: <?php echo $nombre_usuario; ?></p>

    <b>Calificaciones</b>
    <p>
    <div class="lista">
    <table border="1">
        <thead>
        <tr>
            <td>Materia</td>
            <td>Trimestre 1 </td>
            <td>Trimestre 2 </td>
            <td>Trimestre 3 </td>
            <td>Nota Final</td>
            <td>Modificar</td>
            <td>Eliminar</td>

        </tr>
        </thead>
        <tbody>

        <?php
                include 'conexion.php';
                $sql = "SELECT * FROM calificaciones, materia 
                WHERE calificaciones.id_materia = materia.id_materia AND calificaciones.dni_u = '$dni_usuario' 
                 ORDER BY materia.nombre ASC";
                $datos = mysqli_query($conn, $sql);
                $registros = mysqli_num_rows($datos);
        if ($registros > 0) {
            while ($fila = mysqli_fetch_assoc($datos)) {
                echo '<tr>';
                echo '<td>' . $fila['nombre'] . '</td>';
                echo '<td>' . $fila['T1'] . '</td>';
                echo '<td>' . $fila['T2'] . '</td>';
                echo '<td>' . $fila['T3'] . '</td>';
                echo '<td>' . $fila['nota_final'] . '</td>';
                echo '<td><a href="tcalificacion_modificar.php?codi=' . $fila['id_calificacion'] . '"> Modificar </a></td>';
                echo '<td><a href="tcalificacion_eliminar.php?codig=' . $fila['id_calificacion'] . '"> Eliminar </a></td>';    
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7">No hay calificaciones disponibles.</td></tr>';
        }
        ?>
        </tbody>
    </table>
    <br><br>
    <a href="tcalificacion_añadir.php">Añadir calificación</a>
    <p>
    <p><a href="lista.php">Volver</a></p>
    </div>
</center>
</body>
</html>
