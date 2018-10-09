<?php

    require_once("DB.php");
    require_once("Usuario.php");


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


        public function guardarUsuario(Usuario $usuario)

        {
            $query = $this->conexion->prepare("INSERT INTO users_db VALUES(default, :name, :email, :password)");
            $query->bindValue(":name", $usuario->getName());
            $query->bindValue(":email", $usuario->getEmail());
            $query->bindValue(":password", $usuario->getPassword());
            $query->execute();
            $id = $this->conexion->lastInsertId();
            $usuario->setId($id);
            return $usuario;
        }

        public function buscamePorEmail($email)
        {
            $query = $this->conexion->prepare("SELECT * FROM users_db WHERE email = :email");
            $query->bindValue(":email", $email);
            $query->execute();

            $usuarioFormatoArray = $query->fetch(PDO::FETCH_ASSOC);

            if ($usuarioFormatoArray) {
                $usuario = new Usuario($usuarioFormatoArray["email"], $usuarioFormatoArray["password"], $usuarioFormatoArray["id"]);
                return $usuario;
            } else {
                return null;
            }
	    }

        public function traeTodaLaBase()
        {
            $query = $this->conexion->prepare("SELECT * FROM users_db");
            $query->execute();

            $usuariosFormatoArray = $query->fetchAll(PDO::FETCH_ASSOC);

            $usuariosFormatoClase = [];

            foreach ($usuariosFormatoArray as $usuario):

                $usuariosFormatoClase[] = new Usuario($usuario["email"], $usuario["password"], $usuario["id"]);
            endforeach;

            return $usuariosFormatoClase;

        }
//        public function insert($modelo)
//        {
//            $columnas = '';
//            $values = '';
//
//            foreach ($datos as $key => $value) {
//                if (in_array($key, $modelo->columns)) {
//                    $columnas .= $key . ',';
//                    $values .= '"' . $value . '",';
//                }
//            }
//
//            $columnas = trim($columnas, ',');
//            $values = trim($values, ',');
//            $sql = 'insert into '.$modelo->table.' ('.$columnas.') values ('.$values.')';
//
//            try {
//                $stmt = $this->conexion->prepare($sql);
//                $stmt->execute();
//            } catch(Exception $e) {
//                $e->getMessage();
//            }
//        }



    }
