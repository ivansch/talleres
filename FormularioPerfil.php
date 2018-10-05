<?php
  require_once("loader.php")

?>
<div class="">

<form class="" action="index.html" method="post" enctype="multipart/form-data">
  <div class="">

    <label class="">Nombre</label>
    <input type="text" name="name"><p class="">
      <?= isset($errorFormPerf['name']) ? $errorFormPerf['name'] : '' ; ?> </p>
    </div>
  <div class="">
    <label class="">Telefono</label>
    <input type="text" name="tel"><p class="">
      <?= isset($errorFormPerf['tel']) ? $errorFormPerf['tel'] : '' ; ?> </p>
    </div>
<div class="">
  <label class="">Ciudad</label>
  <input type="text" name="city"><p class="">
  <?= isset($errorFormPerf['city']) ? $errorFormPerf['city'] : '' ; ?> </p>
</div>
<div class="">
  <label class=" selec custom-file-label" 	for="">Imagen</label><p class="text-warning error_foto">
    <input type="file" class="custom-file-input" id="" lang="es" name="file">
    <br>
    <br>
   <?= isset($errorFormPerf['file']) ?      $errorFormPerf['file'] : '' ; ?></p>
</div>
<div class="">
  <button type="button" name="button">Cambiar</button>
</div>
</form>
</div>
