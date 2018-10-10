<?php

class Validator
{


	public function Registry($date)
	{

		$db = new MySQL_DB();
		$name = trim($data['name'])
		$email = trim($data['email']);
		$pass = trim($data['pass']);
		$rpass = trim($data['rpass']);
		$errors = [];

		if ($data['name'] == '') {

			$errors['name'] = 'Ingresa un nombre';

		}
		if ($data['email'] == '') {

			$errors['email'] = 'Ingresa un email';

		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$errors['email'] = 'Ingresa un email en formato válido';

		} elseif ($db->getByEmail($email) == true) {

			$errors['email'] = 'El email ya está registrado';
		}

		if ($pass == '' && $rpass == '') {

			$errors['pass'] = 'Por favor completá tu contraseña';

		} elseif ($pass != $rpass) {

			$errors['pass'] = 'Tus contraseñas no coinciden';
		}

		return $errors;
	}

	public function ValidateLogin($date)
	{
		$email = trim($date['email']);
		$pass = trim($date['pass']);
		$errors = [];
		$db = new MySQL_DB();

		if ($email == '') {

			$errors['email'] = 'Por favor, completa un email';

		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 'Formato de email incorrecto';
		} elseif (!$user = $db->getByEmail($email)) {
			$errors['email'] = 'El email no coincide con un usuario';
		} elseif (!password_verify($pass, $usuario->getAttr('pass'))) {
			$errors['pass'] = 'La contraseña es incorrecta';
		}

		return $errors;
	}

	public function ValidateStore($data, $foto)
	{
			$name = trim($data['name']);
	    $adress = trim($data['$adress']);
	    $description = trim($data['description']);
	    $district = trim($data['$district']);

	    $errors = [];

	    if ($_FILES[$foto]['error'] != UPLOAD_ERR_OK) {
				$errors['foto'] = "Por favor subí una foto";
		   } else {
	  		$ext = strtolower(pathinfo($_FILES[$foto]['name'], PATHINFO_EXTENSION));
	  		if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
	  			$errors['foto'] = "Formatos admitidos JPG o PNG";
	  		}
		   }

	    if ($data['name'] == '') {
        $errors['name'] = 'Ingresá un nombre';
	    }

	    if ($data['adress'] == '') {
	        $errors['adress'] = 'Ingresá una dirección';
	    }

	    if ($data['description'] == '') {
	        $errors['description'] = 'Ingresá una descripcion';
	    }

	    if ($data['district'] == '') {
	        $errors['district'] = 'Ingresá un barrio';
	    }

	    return $errors;

	}
