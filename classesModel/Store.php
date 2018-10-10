
<?php
class store extends Model
	{
    public $table = 'store';
		public $columns = ['name', 'adress', 'description','district'];
		// ESTA FUNCION ME DEVULEVE LA DIRECCION DONDE SE ENCUENTRA LA IMAGEN, SI SE SUBE UNA IMAGEN
		public function urlPortada($dato)
		{
		 $ext = strtolower(pathinfo($_FILES[$dato]['name'], PATHINFO_EXTENSION));
		  $erroresCarga = [];
		  $nombre = trim($_POST['title']);
		  if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ) {
		    $desde = $_FILES[$dato]['tmp_name'];
		    $hasta = 'images' . '/portadas/' . $nombre .'.'.$ext;
		    move_uploaded_file($desde, $hasta);

		    return $hasta;
		  }

		  $erroresCarga['cover'] = 'Solo se puede subir imágenes en formato png o jpg';

		  return $erroresCarga;

		}
	}
 ?>
