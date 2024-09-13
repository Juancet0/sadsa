<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    <form action="funcion_sesion.php" method="post">
        <label for="">DNI</label><br>
        <input type="number" name="dni" placeholder="Ingrese su DNI" required><br>
        <label for="">Nombre</label><br>
        <input type="text" name="nombre" placeholder="Ingrese su Nombre" required><br>
        <input type="submit" value="Iniciar Sesion">
    </form>
</body>
</html>

