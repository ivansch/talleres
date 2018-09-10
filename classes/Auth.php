<?php

    require_once("DB.php");
    //Auth va a "mandarse mensajes" con DB, hacemos el require_once correspondiente

    class Auth
    {

        public function __construct()
        {
            session_start();
            //Esta clase maneja la sesion, cuando la instanciemos si o si hacemos session_start() para aprovechar las funcionalidades que nos da.
            if (!isset($_SESSION["estoyLogueado"]) && isset($_COOKIE["estoyLogueado"])) {
            //SI NO ESTA SETEADO $_SESSION["estoyLogueado"] Y (PERO) SI esta seteado $_COOKIE["estoyLogueado"]
                //hacemos que...
                $_SESSION["estoyLogueado"] = $_COOKIE["estoyLogueado"];

            }
        }

        public function login($email)
        //ir a login.php para terminar de explicar la funcionalidad de este metodo
        {
            $_SESSION["estoyLogueado"] = $email;
        }

        public function loginControl()
        {
            return isset($_SESSION["estoyLogueado"]);
            //devolveme que esta seteado $_SESSION["estoyLogueado"] (osea, forzamos un true o un false) asi controlo si el cliente que visita la app esta logueado o no.
        }

        public function usuarioLogueado(DB $db)
        //Aca interactuamos con nuestra $db del tipo DB
        {
            if ($this->loginControl()) {
            //SI en una instancia del tipo Auth ($this), login control es true
                $email = $_SESSION["estoyLogueado"];
                //asigno el valor de $_SESSION["estoyLogueado"] a una variable $mail
                return $db->buscamePorEmail($email);
                //para decirle a la $db que busque ese $mail
            } else {
                //EN CUALQUIER OTRO CASO, devolveme null
                return NULL;
            }
        }

        public function logout()
        {
            //destruimos session
            session_destroy();
            //destruimos cookie
            setcookie("estoyLogueado", "", -1);
        }
    }
