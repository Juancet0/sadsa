<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estiloprevia.css">
    <title>Previas</title>
    <div class="barranav">
        <div class="imgbar">
        <img src="epet.png" alt="">
    </div>
    <div class="titulo">
        <h3>Mis previas</h3> 
    </div>
    <div class="botobar">
        <button><a href="index.html">Volver Atras</a></button>
    </div>
        </div>
</head>
<body>
<div class="container">
        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Nota Final</th>
                    <th>Inscribirse</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí van las previas de los alumnos, generado dinámicamente con PHP -->
                <?php
                session_start();
                include "conexionp.php";
                $query = "SELECT calificaciones.id_materia, materia.datos, calificaciones.nota_final
                          FROM calificaciones
                          INNER JOIN materia ON calificaciones.id_materia = materia.id_materia
                          WHERE calificaciones.id_usuario = ? AND calificaciones.nota_final < 6"; // Nota menor a 6
                $stmt = $pdo->prepare($query);
                $stmt->execute([$_SESSION['id_usuario']]);  // Asumiendo que tienes el ID del usuario en la sesión
                
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['datos']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nota_final']) . "</td>";
                    echo "<td><button class='btn-inscripcion' data-id-materia='" . $row['id_materia'] . "'>Inscribirse</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="script.js"></script> <!-- Enlazar tu archivo JavaScript -->
</body>
</html>