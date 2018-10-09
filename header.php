<?php
require_once('funciones.php');

if (!estaLogueado()) {
    header('location:login.php');
    exit;
}

$usuario = traerPorID($_SESSION['id']);
?>
<header>
  <nav>
    <article class="">
      <p class="usuario"><?=$usuario['name']?></p>
    </article>
  </nav>
</header>
