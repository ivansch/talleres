<?php

class Dato
{
  protected $table;
  protected $columns;
  protected $db;

  public function __construct()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=vet', 'root', 'root');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
  }

  public function insert($datos)
  {
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
    $sql = 'insert into '.$this->table.' ('.$columnas.') values ('.$values.')';

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } catch(Exception $e) {
      $e->getMessage();
    }
  }
}

class Humano extends Dato
{
  protected $table = 'humanos';
  protected $columns = ['nombre'];
}

$humano = new Humano;
$humano->save([
  'nombre' => 'Hugo',
  'especie' => 'Humano'
]);
