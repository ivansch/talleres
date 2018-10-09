<?php


    class UsuarioAsociado extends Usuario
{
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