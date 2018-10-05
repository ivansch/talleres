<?php

    //Loader simple que hace el require de las clases necesarias para que nuestra App trabaje
    require_once("classes/DbMySql.php");
    include_once("funciones.php");
    require_once("classes/Validator.php");

    //instancias de objetos que necesitamos para la logica de login y registro
    $db = new DbMySQL();
    $validator = new Validator();
