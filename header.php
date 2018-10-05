<?php
require_once('funciones.php');

if (!estaLogueado()) {
    header('location:login.php');
    exit;
}

$usuario = traerPorID($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500,700,800" rel="stylesheet">
		<link rel="stylesheet" href="css/perfil.css">
    <title></title>
  </head>
  <body>
    <header>
      <nav>
        <article class="">
          <p class="usuario"><?=$usuario['name']?></p>
          <img src="img/user1.png" class="imguser">
        </article>
      </nav>
    </header>
  </body>
</html>
