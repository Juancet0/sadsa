<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estiloaluini.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="fondo">
    <img src="fondo.jpg" alt="">
    </div>
    <div class="login-container">
        <form action="iniciarsesionalumno.php" method="POST" class="login-form">
            <h2>Iniciar Sesión</h2>
            <div class="input-group">
                <label for="dni">Ingrese su DNI</label>
                <input type="text" id="dni" name="dni_u" placeholder="Ingrese su DNI" required>
            </div>
            <div class="input-group">
                <label for="nombre_usuario">Nombre de Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese su nombre de usuario" required>
            </div>
            <div class="button-group">
                <button type="button" class="btn-back" onclick="window.location.href='index.html'">Volver Atrás</button>
                <button type="submit" class="btn-login">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</body>
</html>
