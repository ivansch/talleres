<?php

    require ("DB.php");

    class DBMySQL extends DB
    {

        protected $conexion;

        public function __construct()
        {
            $host = 'mysql:host=localhost;dbname=talleres;port=8889';
            $db_user = 'root' ;
            $db_pass = 'root' ;

            try {
                $this->conexion = new PDO($host, $db_user, $db_pass);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            catch(Exception $e)
            {
                echo "La conexion a la base de datos falló: " . $e->getMessage();
                exit;
            }

        }
        public function insert($modelo){

          $sql = "INSERT INTO ".$modelo->table." (";

          foreach ($modelo->columns as $column => $value) {
            $sql .= "$value, ";
          }

          $sql .= ") VALUES (";

          foreach ($modelo->datos as $column => $value) {
            $sql .= "'$value', ";
          }

          $sql .= ')';

          $sql = str_replace(', )', ')', $sql);

          try {
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

          } catch(Exception $e) {
            $e->getMessage();
          }

        }

  public function update($modelo){
    $id = $modelo->getAttr('id');

    $sql = "UPDATE ".$modelo->table." SET ";

    foreach ($modelo->columns as $colum) {

    $sql .= $colum. " = ";

    foreach ($modelo->datos as $key => $value) {
          if ($key == $colum) {
            $sql .= "'".$value."'". "";
          }
        }
        $sql .= ", ";
      }

      $sql .= "WHERE id = $id;";


      $sql = str_replace(', WHERE', ' WHERE', $sql);


    try {
      $stmt = $this->conexion->prepare($sql);
      $stmt->execute();

    } catch(Exception $e) {
      $e->getMessage();
    }
    }


    public function delete($data, $table){

      $sql = "DELETE FROM ".$modelo->table." WHERE ";

      foreach ($modelo->columns as $column => $value) {
          $sql .= "$column = $value, ";
      }

      $sql .= ")";

      $sql = str_replace(', )', ';', $sql);

      return $sql;


  }
public function bringDb()
{
    $query = $this->conexion->prepare("SELECT * FROM users_db");

    $query->execute();

    $usuariosFormatoArray = $query->fetchAll(PDO::FETCH_ASSOC);

    $usuariosFormatoClase = [];

    foreach ($usuariosFormatoArray as $usuario):

        $usuariosFormatoClase[] = new User($usuario["email"], $usuario["password"], $usuario["id"]);
    endforeach;

    return $usuariosFormatoClase;

}
public function getByEmail($email)
        {
            $query = $this->conexion->prepare("SELECT * FROM users_db WHERE email = :email");
            $query->bindValue(":email", $email);
            $query->execute();

            $userArray = $query->fetch(PDO::FETCH_ASSOC);

            if ($userArray) {
                $user = new User($userArray["email"], $userArray["password"], $userArray["id"]);
                return $user;
            } else {
                return null;
            }
	    }
        }
