<?php

    //Loader simple que hace el require de las clases necesarias para que nuestra App trabaje
    require_once("classes/DbMySQL.php");
    //require_once('classes/DbJSON.php');
    require_once("classes/Auth.php");
    require_once("classes/Validator.php");

    //instancias de objetos que necesitamos para la logica de login y registro
    $db = new DbMySQL();
    $auth = new Auth();
    $validator = new Validator();
