<?php
    require_once("Usuario.php");

    abstract class DB
    {
        //En cualquier base de datos que usemos, vamos a aplicar estos 3 metodos si o si porque lo que devuelven estos metodos nos sirve para armar toda nuestra logica de login y sesion con la clase Auth

        public abstract function guardarUsuario(Usuario $usuario);
        public abstract function buscamePorEmail($email);
        public abstract function traeTodaLaBase();
        //Por ser una clase abstracta, los metodos no incluyen la logica sino que cada clase que herede de DB va a darle su propia manera de actuar. Osea, cada base de datos es diferente, MySQL tiene su manera de guardar, buscar, y mostrar, PostgreSQL tiene la suya, SQLi tiene la suya, etc.

        //Si mañana nos llega una base de datos que no sea MySQL, ya tenemos estos 3 metodos listos para interactuar.


    }
