<?php
require 'conn.php';

// $sql1 = 'insert into mascotas (nombre, especie, humano_id) values ("Bronco", "Perro", 1)';
// echo $sql1;
// echo '<br>';
//


insert('mascotas', ['title' => 'título']);

$hunmano->insert($datos);

private $tabla = 'humanos';
private $columns = ['name'];

public function insert($datos)
{
  global $db;
  $columnas = '';
  $values = '';

  foreach ($datos as $key => $value) {
    if (in_array($key, $this->columns)) {
      $columnas .= $key . ',';
      $values .= '"' . $value . '",';
    }

  }

  $columnas = trim($columnas, ',');
  $values = trim($values, ',');
  $sql = 'insert into '.$this->tabla.' ('.$columnas.') values ('.$values.')';

  try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  } catch(Exception $e) {
    $e->getMessage();
  }
}

function update($tabla, $datos, $id)
{
  global $db;
  $set = '';

  foreach ($datos as $key => $value) {
    $set .= $key . '="' . $value . '",';
  }

  $set = trim($set, ',');
  $sql = 'update '.$tabla.' set ' . $set . ' where id = ' . $id;

  try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  } catch(Exception $e) {
    $e->getMessage();
  }
}

function find($tabla, $id)
{
  global $db;
  $sql = 'select * from '.$tabla.' where id = :id'; //fecth
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

// $datos = [
//   'nombre' => 'Bronco',
//   'especie' => 'Dog',
//   'humano_id' => 1
// ];
// insert('humanos', $datos);
// update('mascotas', $datos, 1);

$mascota = find('mascotas', 2);
var_dump($mascota);
