<?php
  session_start();

	if (isset($_COOKIE['id'])) {
		$_SESSION['id'] = $_COOKIE['id'];
	}


  function traerUltimoID(){
		$usuarios = traeTodaLaBase();
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

