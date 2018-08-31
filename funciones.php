<?php
  session_start();

	if (isset($_COOKIE['id'])) {
		$_SESSION['id'] = $_COOKIE['id'];
	}

  function validarReg($data) {
		$errorReg= [];
		$name = trim($data['name']);
		$email = trim($data['email']);
		$pass = trim($data['pass']);
		$rpass = trim($data['rpass']);

		if ($name == '') {
			$errorReg['name'] = "Completa por favor tu nombre";
		}

		if ($email == '') {
			$errorReg['email'] = "Completa por favor tu email";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errorReg['email'] = "Por favor completa con un formato de email valido";
		}elseif (existeEmail($email)) {
			$errorReg['email'] = "Este email ya existe.";
		}

		if ($pass == '' || $rpass == '') {
			$errorReg['pass'] = "Por favor completa tu contraseña";
		} elseif ($pass != $rpass) {
			$errorReg['pass'] = "Tus contraseñas no coinciden";
		}
		return $errorReg;
	}


  function validarLog ($data){
    $errorLog = [];
    $mail = trim($data['mail']);
    $cont = trim($data['cont']);
    if ($cont == '' ) {
      $errorLog['cont'] = "Por favor completa tu contraseña";
    }
    if ($mail == '') {
      $errorLog['mail'] = "Completa por favor tu mail";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errorLog['mail'] = "Por favor poner un formato de mail valido";
    }elseif (!$usuario = existeEmail($mail)) {
			$errorLog['email'] = 'Este email no está registrado';
		}elseif (!password_verify($cont, $usuario["pass"])) {
      $errorLog['pass'] = "Tu contraseña es incorrecta";
    }
    return $errorLog;
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










 ?>
