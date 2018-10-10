<?php
require_once('funciones.php');


if ($_POST) {
	$errorSubirTaller = validarSubirTaller($_POST, 'foto');
	if (empty($errorSubirTaller)) {
		$taller = crearTaller($_POST);
		guardartaller($taller);
		loguearTaller();
	}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once ('head.php'); ?>
		<link rel="stylesheet" href="css/login.css">
		<title>Asociate</title>
	</head>
	<body>
	<div class="container contenedor">
		<section class="">
		  <article class="miTaller col-10 col-sm-10 col-md-10 col-lg-10 col-xl-6" >
		    <p class="sosnuevo">Mi Local</p>
		    <form method="post" enctype="multipart/form-data">
		      <div class="form-group">
					<label class="parrwhite">Nombre</label>
						<input  class="input2" type="text" name="nombreTaller" value=""><p class="text-warning">
						<?= isset($errorSubirTaller['nombreTaller']) ? $errorSubirTaller['nombreTaller'] : '' ; ?></p>
		      </div>
					<div class="form-group">
    				<label class="parrwhite"for="exampleFormControlSelect1">Barrio</label>
    					<select class="form-control input2" id="exampleFormControlSelect1">
      				<option class="parrblack">La Plata</option>
      				<option class="parrblack">Ensenada</option>
      				<option class="parrblack">Olmos</option>
      				<option class="parrblack">City Bell</option>
      				<option class="parrblack">Gonnet</option>
    					</select>
  			</div>
		    <div class="form-group">
		      <label class="parrwhite">Dirección</label>
					<input class="input2"type="text" name="direccionTaller" value="">	 <p class="text-warning">
					 <?= isset($errorSubirTaller['direccionTaller']) ? $errorSubirTaller['direccionTaller'] : '' ; ?>
				 </p>
		    </div>
				<div class="form-group">
    		<label class="parrwhite" for="exampleFormControlTextarea1">Descripción</label>
    		<textarea class="form-control input2" name="descripcionTaller" id="exampleFormControlTextarea1" rows="3"></textarea><p class="text-warning">
				 <?= isset($errorSubirTaller['descripcionTaller']) ? $errorSubirTaller['descripcionTaller'] : '' ; ?></p>
  			</div>
				<div class="custom-file">
  				<input type="file" class="custom-file-input" id="customFileLang" lang="es" name="foto">
  				<label class=" selec custom-file-label" 	for="customFileLang">Imagen</label><p class="text-warning error_foto">
						<br>
						<br>
					 <?= isset($errorSubirTaller['foto']) ?      $errorSubirTaller['foto'] : '' ; ?></p>
				</div>
				<button type="submit" class="subir" name="reg">Subir</button>
		  </form>
		</article>
	</section>
</div>
</body>
<footer>
	<?php require_once('footer.php');?>
</footer>
</html>
