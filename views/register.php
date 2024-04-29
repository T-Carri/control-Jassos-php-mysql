<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <h2>Registrar</h2>
    <form action="../controllers/RegisterController.php" method="post">

    <label for="nombre">nombre:</label>
        <input type="nombre" id="nombre" name="nombre" required><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>

<?php ob_end_flush();?>