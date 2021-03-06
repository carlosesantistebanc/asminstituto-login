<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a tu WebApp - Pagina 1</title>
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">-->
    <link rel="stylesheet" href="style-2.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['email']; ?>
      <br>Iniciaste sesión correctamente.
      <a href="logout.php">
        Cerrar sesión.
      </a>
    <?php else: ?>
      <h1>Inicia Sesión o Registrate</h1>

      <a href="login.php">Inicia Sesión</a> o
      <a href="signup.php">Registrate</a>
    <?php endif; ?>
  </body>
</html>
