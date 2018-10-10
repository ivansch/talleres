<?php
    require_once("User.php");

    abstract class DB
    {


        public abstract function insert($model);
        public abstract function getByEmail($email);
        public abstract function bringDb();
        public abstract function update($model);
        public abstract function delete($model);
    }
