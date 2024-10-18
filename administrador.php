<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilo.css">
    <title>Admin</title>
</head>
<body>
    <h1 class="h1_admin">Bienvenido <?php
        include "conexion.php";
        if(isset($_SESSION['nombre_usuario'])){
        echo $_SESSION['nombre_usuario'];
        }
        ?></h1>
    <div class="contenedor_tabla_datos">
    <div class="datos_usuario">
        <?php
        include "conexion.php";
        if(isset($_SESSION['dni_u'])){
        echo $_SESSION['dni_u'];
        }
        ?>
        
    </div>
    <br>
    <div class="tablas">
    <table border="2">
        <tr>
            <thead>
                <td>id_mesa</td>
                <td>fecha</td>
                <td>hora</td>
                <td>dni_p1</td>
                <td>dni_p2</td>
                <td>dni_p3</td>
                <td>id_materia</td>
            </thead>
        </tr>
        <tbody>
            <?php
                include "conexion.php";
                $sql = "SELECT * FROM mesa";
                $datos = mysqli_query($conn, $sql);
                $resultado = mysqli_num_rows($datos);
                if($resultado > 0){
                    while ($fila = mysqli_fetch_assoc($datos)){
                        echo "<tr>";
                        echo "<td>" . $fila['id_mesa'] . "</td>";
                        echo "<td>" . $fila['fecha'] . "</td>";
                        echo "<td>" . $fila['hora'] . "</td>";
                        echo "<td>" . $fila['dni_p1'] . "</td>";
                        echo "<td>" . $fila['dni_p2'] . "</td>";
                        echo "<td>" . $fila['dni_p3'] . "</td>";
                        echo "<td>" . $fila['id_materia'] . "</td>";
                        echo '<td><a href="modificar_mesa.php?codigm=' . $fila['id_mesa'] . '"> Modificar </a></td>';
                        echo '<td><a href="eliminar_mesa.php?codigm=' . $fila['id_mesa'] . '"> Eliminar </a></td>';
                        echo "</tr>";
                        
                    }
                }
            ?>
            <a href="añadir_mesa.php">Añadir Mesa</a>
        </tbody>
    </table>
    <br>
    <br>
    <table border="2">
        <tr>
            <thead>
                <td>dni_p</td>
                <td>Nombre</td>
            </thead>
        </tr>
        <tbody>
        <?php
                include "conexion.php";
                $sql = "SELECT * FROM profesor";
                $datos = mysqli_query($conn, $sql);
                $registros = mysqli_num_rows($datos);
                if($registros > 0){
                    while ($fila = mysqli_fetch_assoc($datos)){
                        echo '<tr>';
                        echo '<td>' . $fila['dni_p'] . '</td>';
                        echo '<td>' . $fila['Nombre'] . '</td>';
                        echo '<td><a href="modificar_profesor.php?codigp=' . $fila['dni_p'] . '"> Modificar </a></td>';
                        echo '<td><a href="eliminar_profesor.php?codigp=' . $fila['dni_p'] . '"> Eliminar </a></td>';
                        echo '</tr>';
                    }
                }
            ?>
            <a href="añadir_profesor.php">Añadir Profesor</a>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>