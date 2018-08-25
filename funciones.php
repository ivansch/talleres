<?php

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
      }
      return $errorLog;
    }















 ?>
