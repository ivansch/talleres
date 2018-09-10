<?php

    require_once("DB.php");

    class Validator
    {
        //Esta clase solamente tiene dos metodos, y su unica responsabilidad para con nuestra App es devolver errores si los hubo

        function validarLogin($datos, DB $db) {
            //ya que hicimos el require de DB, ademas de $datos como veniamos usando, consultamos contra nuestra base de datos usando los metodos que creamos en ella.
            $errores = [];

            foreach ($datos as $clave => $valor) {
                $datos[$clave] = trim($valor);
            }

            if ($datos["email"] == "") {
                $errores["email"] = "Y el email?";
            }

            else if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false) {
                $errores["mail"] = "El mail tiene que ser un mail";
            } else if ($db->buscamePorEmail($datos["email"]) == null) {
                //SI haciendo uso del metodo buscamePorMail tenemos como resultado null, es porque el mail no esta registrado.
                $errores["mail"] = "No estas registrado en nuestra plataforma";
            }

            $usuario = $db->buscamePorEmail($datos["email"]);
            //A partir de aca, tenemos una variable $usuario con un objeto del tipo Usuario, ya que si buscamePorMail() devuelve null o un objeto, la parte de null ya la pasamos, asi que solamente queda que se instancie el usuario. Esa instancia se genera en la clase DB, por eso no necesitamos hacer require de Usuario para que esto pase.
            if ($datos["password"] == "") {
                $errores["password"] = "No llenaste la contraseña";
            } else if ($usuario != null) {
                //Doble check de que $usuario no sea null, confirmamos que usuario existe y puso contraseña, pero engo que validar que la contraseño que ingreso sea valida
                if (password_verify($datos["password"], $usuario->getPassword()) == false) {
                    $errores["password"] = "La contraseña no es valida";
                }
            }

            return $errores;
        }

        function validarInformacion($informacion, DB $db) {
            $errores = [];

            foreach ($informacion as $clave => $valor) {
                $informacion[$clave] = trim($valor);
            }

            if ($informacion["email"] == "") {
                $errores["email"] = "Y el email??";
            }
            else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
                $errores["mail"] = "El email no es valido";

            } else if ($db->buscamePorEmail($informacion["email"]) != NULL) {
                //SI el metodo de DB buscamePorEmail() da como resultado que NO es null, es porque el metodo pudo instanciar al usuario, entonces ya existe en nuestra base de datos.
                $errores["mail"] = "Ya hay un chabon con ese email";
            }

            if ($informacion["password"] == "") {
                $errores["password"] = "Sin contraseña no va la cosa";
            }

            if ($informacion["cpassword"] == "") {
                $errores["cpassword"] = "La contraseña va dos veces";
            }

            if ($informacion["password"] != "" && $informacion["cpassword"] != "" && $informacion["password"] != $informacion["cpassword"]) {
                $errores["password"] = "Las contraseñas no coinciden";
            }

            return $errores;
        }

    }
