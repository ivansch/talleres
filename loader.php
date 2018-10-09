<?php

    //Loader simple que hace el require de las clases necesarias para que nuestra App trabaje
    require_once("classes/DBMySql.php");
    require_once("classes/Validator.php");
    require_once("classes/Auth.php");

    //instancias de objetos que necesitamos para la logica de login y registro
    $db = new DBMySQL();
    $auth = new Auth();

