<?php
  require_once('funciones.php');

  if (estaLogueado()) {
    header('location: pagina1.php');
    exit;
  }


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="css/index.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500,700,800" rel="stylesheet">
     <title></title>
   </head>
   <body >
     <header>
       <nav class="container">
         <div>
           <img src="#" alt="Logo">
         </div>
       </nav>
     </header>
     <div class="container">
       <div class="textoUno">
         <h1 class="tit">¿Necesitas un taller para tu auto?</h1>
      </div>
      <br>
      <div class="boton bot border">
        <a href="login.php" > <p class="text">Ingresa</p></a>
      </div>
      <div class="logo_texto" >
  			<img src="img/talleres.png" alt="" class="imag">
  		  <p class="tenesun">Tenes un taller? ¡Asociate <a href="asociate.php">aca!</a></p>
  		</div>
  </div>
     </div>
   </body>
 </html>
