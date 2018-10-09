<?php
    require_once("Usuario.php");

    abstract class DB
    {


        public abstract function guardarUsuario(Usuario $usuario);
        public abstract function buscamePorEmail($email);
        public abstract function traeTodaLaBase();

//        public abstract function insert($modelo);
//        public abstract function delete($modelo);
//        public abstract function update($modelo);
//        public abstract function read($modelo);
    }
