<?php
require_once('funciones.php');
require_once('footer.php');


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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Asociate</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500,700,800" rel="stylesheet">
		<link rel="stylesheet" href="css/login.css">
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
					<label class="parrwhite"for="exampleFormControlSelect1">Negocio</label>
						<select class="form-control input2" id="exampleFormControlSelect1">
						<option class="parrblack">Taller</option>
						<option class="parrblack">Gomeria</option>
						<option class="parrblack">Lubricentro</option>
						<option class="parrblack">Autoradio</option>
						
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
</html>
