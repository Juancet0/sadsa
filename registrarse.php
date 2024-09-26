<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <h1>Registrate</h1>
    <form action="funcion_registro.php" method="post">
    <label for="dni">DNI:</label><br>
    <input type="number" name="dniR" placeholder="Ingrese su DNI"><br>
    <label for="nombre">Usuario</label><br>
    <input type="text" name="nombreR" placeholder="Ingrese su Nombre de Usuario"><br>
    <input type="submit" value="Registrarse">
    </form>
</body>
</html>