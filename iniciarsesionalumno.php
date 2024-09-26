<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni_u = mysqli_real_scape_string($_POST['dni_u']);
    $nombre_usuario = mysqli_real_scape_string($_POST['nombre_usuario']);

    // Consulta para verificar si el usuario existe
    $sql =  "SELECT * FROM usuario WHERE dni_u = ? AND nombre_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $dni_u, $nombre_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró algún usuario con los datos proporcionados
    if ($result->num_rows === 1) {
        // Guardar los datos del usuario en la sesión
        $usuario = $result->fetch_assoc();
        $_SESSION['dni_u'] = $usuario['dni_u'];
        $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

            

        // Redirigir a previas.php
        header("Location: previas.php");
        exit();
    } else {
        // Si las credenciales son incorrectas, mostrar un error
        echo "<script>alert('DNI o nombre de usuario incorrectos. Por favor, inténtelo de nuevo.');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
} else {
    // Si se intenta acceder a este archivo sin enviar el formulario
    echo "<script>window.location.href='index.php';</script>";
}
?>
