<?php

    function validarFuno($data) {
		$error= [];
		$name = trim($data['name']);
		$email = trim($data['email']);
		$pass = trim($data['pass']);
		$rpass = trim($data['rpass']);

		if ($name == '') {
			$error['name'] = "Completa por favor tu nombre";
		}
		if ($email == '') {
			$error['email'] = "Completa por favor tu email";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error['email'] = "Por favor poner un formato de email valido";
		}
		if ($pass == '' || $rpass == '') {
			$error['pass'] = "Por favor completa tu contraseña";
		} elseif ($pass != $rpass) {
			$error['pass'] = "Tus contraseñas no coinciden";
		}
		return $error;
	}
    function validarFdos ($data){
      $errores = [];
      $mail = trim($data['mail']);
      $cont = trim($data['cont']);

      if ($cont == '' ) {
        $errores['cont'] = "Por favor completa tu contraseña";
      }
      if ($mail == '') {
        $errores['mail'] = "Completa por favor tu mail";
      } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errores['mail'] = "Por favor poner un formato de mail valido";
      }
    }















 ?>
