<?php
require_once('funciones.php');

	$mail = '';
	$name = '';
	$email = '';

if ($_POST) {
	if (isset($_POST['reg'])) {
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$errorReg = validarReg($_POST);
	if (empty($errorReg)) {
		$usuario = guardarUsuario($_POST);
		loguear($usuario);
	}
}
	if (isset($_POST['log'])) {
		$mail = trim ($_POST['mail']);
		$errorLog = validarLog($_POST);
		if (empty($errorLog)) {
			$usuario = existeEmail($mail);
			loguear($usuario);
			if (isset($_POST["recordar"])) {
	        setcookie('id', $usuario['id'], time() + 3600 * 24 * 30);
	      }
				header('location: pagina1.php');
			exit;

		}
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500,700,800" rel="stylesheet">
	</head>
	<body>
	<div class="container contenedor">
		<section class="">
		  <article class="singup col-10 col-sm-10 col-md-10 col-lg-10 col-xl-6" >
		    <p class="sosnuevo">¿Sos nuevo?</p>
		    <form method="post" action="" enctype="multipart/form-data">
		      <div class="form-group">
					<label class="parrwhite">Nombre</label>
						<input type="text" name="name" value="<?=$name?>"><p class="text-warning">
						<?= isset($errorReg['name']) ? $errorReg['name'] : '' ; ?></p>
		      </div>
		    <div class="form-group">
		      <label class="parrwhite">Mail</label>
					<input type="text" name="email" value="<?=$email?>">	 <p class="text-warning">
					 <?= isset($errorReg['email']) ? $errorReg['email'] : '' ; ?>
				 </p>
		    </div>
		    <div class="form-group">
		      <label class="parrwhite">Contraseña</label>
		      <input type="password" name="pass"><p class="text-warning">
					<?= isset($errorReg['pass']) ? $errorReg['pass'] : '' ; ?> </p>
		    </div>
				<div class="form-group">
 		      <label class="parrwhite"> Repetir Contraseña</label>
 		      <input type="password" name="rpass"><p class="text-warning">
					<?= isset($errorReg['rpass']) ? $errorReg['rpass'] : '' ; ?> </p>
 		    </div>
				<button type="submit" class="crear_cuenta" name="reg">Crear cuenta</button>
		  </form>
		</article>
	</section>
		<section class="">
		<article class="login col-10 col-sm-10 col-md-10 col-lg-10 col-xl-6">
		<p class="text2">Inicia sesión</p>
		  <form method="post">
		  <div class="form-group">
		    <label class="parrblack">Email</label>
		    <input type="text" name="mail" value="<?= $mail?>">
				<p class="text-danger">
				<?= isset($errorLog['mail']) ? $errorLog['mail'] : '' ; ?> </p>
		  </div>
		  <div class="form-group">
		    <label class="parrblack">Contraseña</label>
		    <input type="password" name="cont" ><p class="text-danger">
				<?= isset($errorLog['cont']) ? $errorLog['cont'] : '' ; ?> </p>
		  </div>
						<div class="form-group">
							Recordar
							<input type="checkbox" name="recordar">
						</div>
				<div>
					<button type="submit" class="logueate" name="log">Logueate</button>
				</div>
		</form>
		</article>
	</section>
		<div class="logo_texto" >
			<img src="img/talleres.png" alt="" class="imag">
		  <p class="tenesun">Tenes un taller? Asociate <a href="#">aca</a></p>
		</div>
</div>
	<footer class="container-fluid">
		<ul>
			<li><a class="footer" href="quienes_somos.html">¿Quienes somos?</a></li>
			<li><a class="footer" href="faqs.html">Preguntas Frecuentes</a></li>
		</ul>
	</footer>
	</body>
</html>
