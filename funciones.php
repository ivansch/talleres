<?php
  session_start();

	if (isset($_COOKIE['id'])) {
		$_SESSION['id'] = $_COOKIE['id'];
	}

  function validarInformacion($datos) {
		$errores= [];

    foreach($datos as $key => $value){
         $datos[$key] = trim($value);
     }
      // ahora podemos empezar a usar cada valor del array que entre como parametro
     //el array de errores vacio que vamos a ir llenando
     //SI LLEGAN POR EL FORMULARIO DE REGISTRO, VALIDO LA INFORMACION
    if (isset($_POST['reg'])) {
  		  if(strlen($datos['name']) == 0){
  			$errores['name'] = "Completa por favor tu nombre";
  		}
  		if (strlen($datos['email']) == 0) {
  			$errores['email'] = "Completa por favor tu email";
  		} elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
  			$errores['email'] = "Por favor completa con un formato de email valido";
  		}elseif (buscamePorMail($datos['email']) != NULL){
          $errores['email'] = "El mail ingresado ya existe";
      }
      if(strlen($datos['pass']) < 4){
          $errores['pass'] = "La contraseña es muy corta";
        }
  		if ($datos['pass'] == '' || $datos['rpass'] == '') {
  			$errores['pass'] = "Por favor completa tu contraseña";
  		} else if ($datos['pass'] != $datos['rpass']){
          $errores['pass'] = "La contraseña no coincide";
      }
    }
    //SI LLEGAN POR EL FORMULARIO DE LOGUEO, VERIFICO
    if (isset($_POST['log'])) {
      if (strlen($datos['cont']) == 0) {
        $errores['cont'] = "Por favor completa tu contraseña";
      }
      if (strlen($datos['mail']) == 0) {
        $errores['mail'] = "Completa por favor tu mail";
      } elseif (!filter_var($datos['mail'], FILTER_VALIDATE_EMAIL)) {
        $errores['mail'] = "Por favor poner un formato de mail valido";
      }elseif (!$usuario = existeEmail($datos['mail'])) {
  			$errores['email'] = 'Este email no está registrado';
  		}elseif (!password_verify($datos['cont'], $usuario["pass"])) {
        $errores['cont'] = "Tu contraseña es incorrecta";
      }
    }
    return $errores;
  }

  function traerTodos() {
		$todosJson = file_get_contents('usuarios.json');
		$usuariosArray = explode(PHP_EOL, $todosJson);
		array_pop($usuariosArray);
		$todosPHP = [];
		foreach ($usuariosArray as $usuario) {
			$todosPHP[] = json_decode($usuario, true);
		}
		return $todosPHP;
	}

  function traerUltimoID(){
		$usuarios = traerTodos();
		if (count($usuarios) == 0) {
			return 1;
		}
		$elUltimo = array_pop($usuarios);
		$id = $elUltimo['id'];
		return $id + 1;
	}

	function existeEmail($email){
		$todos = traerTodos();
		foreach ($todos as $unUsuario) {
			if ($unUsuario['email'] == $email) {
				return $unUsuario;
			}
		}
		return false;
	}

  function crearUsuario($data) {
    $usuario = [
      'id' => traerUltimoID(),
      'name' => $data['name'],
      'email' => $data['email'],
      'pass' => password_hash($data['pass'], PASSWORD_DEFAULT),
    ];
    return $usuario;
  }

  function guardarUsuario($data){
  		$usuario = crearUsuario($data);
  		$usuarioJSON = json_encode($usuario);
  		file_put_contents('usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);
  		return $usuario;
  	}

	function loguear($usuario) {
  	   $_SESSION['id'] = $usuario['id'];
  		header('location: pagina1.html');
  		exit;
  	}

	function estaLogueado() {
  	return isset($_SESSION['id']);
  	}

	function traerPorId($id){
  	$todos = traerTodos();
  	foreach ($todos as $usuario) {
  		if ($id == $usuario['id']) {
  			return $usuario;
  		}
  	}
		return false;
	}

  function validarSubirTaller($data, $foto){

     $errorSubirTaller = [];
     $nombreTaller = trim($data['nombreTaller']);
     $direccionTaller = trim($data['direccionTaller']);
     $descripcionTaller = trim($data['descripcionTaller']);

     if ($nombreTaller == '' ) {
       $errorSubirTaller['nombreTaller'] = "Por favor completa con el nombre de tu taller";
     }
     if ($direccionTaller == '') {
       $errorSubirTaller['direccionTaller'] = "Completa por favor con la direccion de tu taller";
     }
     if ($descripcionTaller == '') {
       $errorSubirTaller['descripcionTaller'] = "Completa por favor con la descripcion de tu taller";
     }
     if ($_FILES[$foto]['error'] != UPLOAD_ERR_OK) {
 			$errorSubirTaller['foto'] = "Subí una imagen por favor";
 		} else {
 			$ext = strtolower(pathinfo($_FILES[$foto]['name'], PATHINFO_EXTENSION));
      $archivoFisico = $_FILES[$foto]['tmp_name'];
 			if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
        $dondeEstoyParado = dirname(__FILE__);
				$rutaFinalConNombre = $dondeEstoyParado . '/imagenes_talleres/' . $_POST['nombreTaller'] . '.' . $ext;

				move_uploaded_file($archivoFisico, $rutaFinalConNombre);
      }else{
 				$errorSubirTaller['foto'] = "Formatos admitidos: JPG, PNG O JPEG";
 			}
    }
     return $errorSubirTaller;
   }

 function crearTaller($data) {
   	$taller = [
   		'id' => $data['nombreTaller'],
   		'nombreTaller' => $data['nombreTaller'],
   		'direccionTaller' => $data['direccionTaller'],
      'descripcionTaller' => $data['descripcionTaller'],
   	];
  	   return $taller;
 	}

 function guardartaller($data){
  	$taller= crearTaller($data);
   	$tallerJSON = json_encode($taller);
   	file_put_contents('talleres.json', $tallerJSON . PHP_EOL, FILE_APPEND);
 		return $taller;
   	}

  function loguearTaller(){
   header('location: pagina1.php');
   exit;
  }
  function logout() {
      session_destroy();
      //seteo de cookie con -1 para que "muera" D=
      setcookie("email", "", -1);
      header('location:index.php');
  }
  function buscamePorMail($email){
      //Generamos un array de TODA LA BASE DE DATOS para poder manejarla con PHP
      $usuariosTraidos = traeTodaLaBase();
      //la procesamos para buscar el mail que pasamos como parametro
      //a ver si existe o no
      foreach($usuariosTraidos as $usuario){
          //SI elMailDeLaBase es igualigual al mailPasadoPorParametro
          if($usuario['email'] == $email){
              //returname el usario
              return $usuario;
          }
      }
      //si no, "returname" NULL asi uso el dato para validar
      return null;
  }
  function traeTodaLaBase(){
      //le asignamos a $contenido, TODO lo que tiene mi base de datos
      $contenido = file_get_contents('usuarios.json');

      //generamos el array de usuarios, PERO, ese array va a tener
      //en cada valor, un string en formato json que vamos a hacerle decode mas abajo
      $usuariosJSON = explode(PHP_EOL, $contenido);
      array_pop($usuariosJSON);

      //array vacio de usuarios traidos, como lo llenamos? con un foreach
      $usuariosTraidos = [];

      foreach($usuariosJSON as $usuario){
          //ACA le insertamos al array vacio, un array por usuario, porque
          //a cada valor que teiamos en $usuariosJSON, le aplicamos json_decode!
          $usuariosTraidos[] = json_decode($usuario, true);
      }

      //"returname" un array que pueda usar en PHP
      return $usuariosTraidos;
  }
