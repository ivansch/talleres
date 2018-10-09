<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once ('head.php'); ?>
		<link rel="stylesheet" href="css/perfil.css">
    <title></title>
  </head>
  <body>
    <header>
      <nav>
        <article class="">
          <p class="usuario">Ivan Schmitt</p>
          <img src="img/user1.png" class="imguser">
        </article>
      </nav>
    </header>
    <section>
      <article class="rectablanco">
        <div class="rectaazul">
          <p class="letra">S</p>
        </div>
      </article>
      <h2 class="nombreusu">Ivan Schmitt</h2>
      <p class="parr">schmittivan222@gmail.com</p>
      <p class="parr">2243525721</p>
      <p class="parr">La Plata, Buenos Aires ,Argentina.</p>
      <article>
      <button type="button" class="botonazul">
        <a href="logout.php" class="textblanco">Cerrar sesión</a>
      </button>
      <button type="button" class="botonblanco">
        <p class="textazul">Editar perfil</p>
      </button>

      </article>
    </section>
    <footer>
      <?php require_once('footer.php'); ?>
    </footer>
  </body>
</html>
