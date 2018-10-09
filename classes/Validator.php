<?php

    require_once("DB.php");
    require_once("DBMySql.php");

    class Validator
    {

    static function validarRegistroYLogin($datos , DB $db) {

        $errores= [];


        foreach($datos as $key => $value){
            $datos[$key] = trim($value);
        }
        if (isset($_POST['reg'])) {
            if(strlen($datos['name']) == 0){
                $errores['name'] = "Completa por favor tu nombre";
            }
            if (strlen($datos['email']) == 0) {
                $errores['email'] = "Completa por favor tu email";
            } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Por favor completa con un formato de email valido";
            }elseif ($db->buscamePorEmail($datos['email']) != NULL){
                $errores['email'] = "El mail ingresado ya existe";
            }
            if(strlen($datos['pass']) < 4){
                $errores['pass'] = "La contraseña es muy corta, debe tener minimo 6 caracteres";
            }
            if ($datos['pass'] == '' || $datos['rpass'] == '') {
                $errores['pass'] = "Por favor completa tu contraseña";
            } else if ($datos['pass'] != $datos['rpass']){
                $errores['pass'] = "La contraseña no coincide";
            }
        }



        if (isset($_POST['log'])) {
            if (strlen($datos['mail']) == 0) {
                $errores['mail'] = "Completa por favor tu mail";
            } elseif (!filter_var($datos['mail'], FILTER_VALIDATE_EMAIL)) {
                $errores['mail'] = "Por favor poner un formato de mail valido";
            }
            if (strlen($datos['password']) == 0) {
                $errores['password'] = "Por favor completa tu contraseña";
            }
            elseif ($db->buscamePorEmail($datos["mail"]) == null)  {
                $errores['email'] = 'Este email no está registrado';
            }
//            else if ($usuario != null) {
//                if (password_verify($datos["password"], $usuario->getPassword()) == false) {
//                    $errores["password"] = "La contraseña no es valida";
//                }
       }
        return $errores;
    }

    function validarSubirTaller($data, $foto){

        $errorSubirTaller = [];
        $nombreTaller = trim($data['nombreTaller']);
        $direccionTaller = trim($data['direccionTaller']);
        $descripcionTaller = trim($data['descripcionTaller']);

        if ($nombreTaller == '' ) {
            $errorSubirTaller['nombreTaller'] = "Por favor completa con el nombre de tu taller";
        }
        if ($direccionTaller == '') {
            $errorSubirTaller['direccionTaller'] = "Completa por favor con la direccion de tu taller";
        }
        if ($descripcionTaller == '') {
            $errorSubirTaller['descripcionTaller'] = "Completa por favor con la descripcion de tu taller";
        }
        if ($_FILES[$foto]['error'] != UPLOAD_ERR_OK) {
            $errorSubirTaller['foto'] = "Subí una imagen por favor";
        } else {
            $ext = strtolower(pathinfo($_FILES[$foto]['name'], PATHINFO_EXTENSION));
            $archivoFisico = $_FILES[$foto]['tmp_name'];
            if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                $dondeEstoyParado = dirname(__FILE__);
                $rutaFinalConNombre = $dondeEstoyParado . '/imagenes_talleres/' . $_POST['nombreTaller'] . '.' . $ext;

                move_uploaded_file($archivoFisico, $rutaFinalConNombre);
            }else{
                $errorSubirTaller['foto'] = "Formatos admitidos: JPG, PNG O JPEG";
            }
        }
        return $errorSubirTaller;
     }
    }
