<?php
require 'classes/DB.php';
require 'classes/JSON_DB.php';
require 'classes/MySQL_DB.php';
require 'classes/Modelo.php';
require 'classes/Humano.php';
require 'classes/Mascota.php';

$model = new Humano;

echo $model->setAttr('nombre', 'Bort');

$model->save();


echo 'Bien';
