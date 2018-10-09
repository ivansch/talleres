<?php
    require_once("loader.php");


    //Permanencia de datos//

    $name = '';
    $email = '';
    $mail = '';

    $errores = [];

    if($_POST){
        if (isset($_POST['reg'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
        }
        if (isset($_POST['log'])) {
            $mail = $_POST['mail'];
        }
}


//    Valido la informacion que viene por POST//


    if ($_POST) {
        if (isset($_POST['reg'])) {
            $errores = Validator::validarRegistroYLogin($_POST, $db);
        if (empty($errores)) {
            $usuario = new Usuario( $_POST['name'], $_POST['email'], $_POST['pass']);
            $db->guardarUsuario($usuario);
            $auth->login($_POST["email"]);
            header('location: pagina1.php');
            exit;
        }
    }
        if (isset($_POST['log'])) {
            $errores =Validator::validarRegistroYLogin($_POST, $db);
            if (empty($errores)) {
                $usuario =$db->buscamePorEmail($email);
                $auth->login($usuario);
                if (isset($_POST["recordar"])) {
                setcookie('id', $usuario['id'], time() + 3600 * 24 * 30);
              }
                    header('location: pagina1.php');
                exit;

            }
    }
    }
?>
    <!DOCTYPE html>
    <html>
        <head>
            <?php require_once ('head.php');?>
            <link rel="stylesheet" href="css/login.css">
        </head>
        <body>
        <div class="container contenedor">
            <section class="">
              <article class="singup col-10 col-sm-10 col-md-10 col-lg-10 col-xl-6" >
                <p class="sosnuevo">¿Sos nuevo?</p>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
                        <label class="parrwhite">Nombre</label>
                            <input type="text" name="name" value="<?=$name?>"><p class="text-warning">
                            <?= isset($errores['name']) ? $errores['name'] : '' ; ?></p>
                  </div>
                <div class="form-group">
                  <label class="parrwhite">Mail</label>
                        <input type="text" name="email" value="<?=$email?>">	 <p class="text-warning">
                         <?= isset($errores['email']) ? $errores['email'] : '' ; ?>
                     </p>
                </div>
                <div class="form-group">
                  <label class="parrwhite">Contraseña</label>
                  <input type="password" name="pass"><p class="text-warning">
                        <?= isset($errores['pass']) ? $errores['pass'] : '' ; ?> </p>
                </div>
                    <div class="form-group">
                  <label class="parrwhite"> Repetir Contraseña</label>
                  <input type="password" name="rpass"><p class="text-warning">
                        <?= isset($errores['rpass']) ? $errores['rpass'] : '' ; ?> </p>
                </div>
                    <button type="submit" class="crear_cuenta" name="reg">Crear cuenta</button>
              </form>
            </article>
        </section>
            <section class="">
            <article class="login col-10 col-sm-10 col-md-10 col-lg-10 col-xl-6">
            <p class="text2">Inicia sesión</p>
              <form method="post">
              <div class="form-group">
                <label class="parrblack">Email</label>
                <input type="text" name="mail" value="<?= $mail?>">
                    <p class="text-danger">
                    <?= isset($errores['mail']) ? $errores['mail'] : '' ; ?> </p>
              </div>
              <div class="form-group">
                <label class="parrblack">Contraseña</label>
                <input type="password" name="password" ><p class="text-danger">
                    <?= isset($errores['password']) ? $errores['password'] : '' ; ?> </p>
              </div>
                            <div class="form-group">
                                Recordar
                                <input type="checkbox" name="recordar">
                            </div>
                    <div>
                        <button type="submit" class="logueate" name="log">Logueate</button>
                    </div>
            </form>
            </article>
        </section>
            <div class="logo_texto" >
                <img src="img/talleres.png" alt="" class="imag">
              <p class="tenesun">Tenes un taller? Asociate <a href="asociate.php">aca</a></p>
            </div>
    </div>
        <footer>
           <?php require_once ('footer.php');?>
        </footer>
        </body>
    </html>


