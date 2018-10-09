<?php

    class Usuario
    {
        private $id;
        private $email;
        private $password;
        private $name;

        public function __construct( $name, $email, $password, $id = null)
        {
            if ($id == null) {
                $this->password = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $this->password = $password;
            }
            $this->id = $id;
            $this->email = $email;
            $this->name = $name;

        }

        //Getters & Setters
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;

        }
        public function getName()
        {
            return $this->name;
        }

        public function setName($id)
        {
            $this->id = $name;

        }
        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }
//        public function guardarImagen($email)
//        {
//            if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK)
//            {
//                $nombre=$_FILES["avatar"]["name"];
//                $archivo=$_FILES["avatar"]["tmp_name"];
//
//                $ext = pathinfo($nombre, PATHINFO_EXTENSION);
//                if ($ext != "jpg" && $ext != "jpeg") {
//                    return "Error";
//                }
//
//                $miArchivo = dirname(__FILE__);
//                $miArchivo = $miArchivo . "/../img/";
//                $miArchivo = $miArchivo . $this->getEmail() . "." . $ext;
//
//                move_uploaded_file($archivo, $miArchivo);
//            }
//        }
    }
