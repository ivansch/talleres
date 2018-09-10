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
                //SI el id que llega es = a null, hasheame la password porque es un new Usuario que viene de REGISTRO
                $this->password = password_hash($password, PASSWORD_DEFAULT);
            } else {
                //PARA CUALQUIER OTRA INSTANCIA DE USUARIO, deja la password como esta para que sea usada en password_verify()
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

        public function guardarImagen($email)
        {
            //SI la foto de perfil sube sin error
            if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK)
            {
                //ENTRA a esta logica
                $nombre=$_FILES["avatar"]["name"];                $archivo=$_FILES["avatar"]["tmp_name"];

                $ext = pathinfo($nombre, PATHINFO_EXTENSION);
                //SI la foto no es JPG o JPEG
                if ($ext != "jpg" || $ext != "jpeg" || $ext != "png") {
                    //Dame error
                    return "Error";
                }

                $miArchivo = dirname(__FILE__);
                $miArchivo = $miArchivo . "/../img/";
                $miArchivo = $miArchivo . $this->getEmail() . "." . $ext;

                move_uploaded_file($archivo, $miArchivo);
            }
        }

    }
