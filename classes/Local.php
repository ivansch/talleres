<?php

  class Local
 {
   private $nombre;
   private $direccion;
   private $descripcion;

   public function __construct( $nombre, $direccion, $descripcion, $id = null)
   {
       $this->id = $id;
       $this->nombre = $nombre;
       $this->direccion = $direccion;
       $this->descripcion = $descripcion;

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
   public function getNombre()
   {
       return $this->nombre;
   }

   public function setName($nombre)
   {
       $this->nombre = $nombre;

   }
   public function getDireccion()
   {
       return $this->direccion;
   }

   public function setDireccion($direccion)
   {
       $this->direccion= $direccion;

   }
   public function getDescripcion()
   {
       return $this->descripcion;
   }

   public function setDescripcion($descripcion)
   {
       $this->descripcion = $descripcion;

   }
 }
