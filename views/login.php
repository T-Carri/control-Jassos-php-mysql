<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">

    <title>Iniciar Sesión</title>
</head>
<body>


<div class="full-screen-container">
    <div class="login-container">
      <h1 class="login-title">SOLUCIONES INTEGRALES JASSO</h1>
      <form class="form" action="../controllers/AuthController.php" method="post">
        <div class="input-group success" >
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required/>
          <span class="msg">Valid email</span>
        </div>

        <div class="input-group error" >
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required/>
          <span class="msg">Incorrect password</span>
        </div>

        <button type="submit" class="login-button">Login</button>
      </form>
    </div>
  </div>


</body>
</html>

<?php ob_end_flush();?>