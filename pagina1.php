<!doctype html>
<html lang="en">
  <head>
    <?php require_once ('head.php'); ?>
    <link rel="stylesheet" href="css/pagina1.css">
    <title> TALLERES </title>
  </head>
  <body>
    <header>
      <nav class="container-fluid ">
        <div>
          <img src="#" alt="Logo">
        </div>
        <ul >
          <li class="nose_ve">TALLERES</li>
          <li class="nose_ve">GOMERIAS</li>
          <li class="nose_ve">LUBRICENTROS</li>
          <li class="nose_ve">AUTORADIOS</li>
          <li>
        </ul>
      </nav>
    </header>
    <h1 class="nose_ve">LA MEJOR MANERA DE ENCONTRAR LO QUE TU AUTO NECESITA</h1>
    <div class="container">
      <div class="row">
        <section class="col-xl-6 col-lg-12 ">
          <article >
            <p class="textouno">¿Qué es lo que <br> tu auto necesita?</p>
            <br>
            <p class="textodos">Sabemos lo importante que es encontrar un lugar cerca y confiable para tu vehiculo. Mirá nuestras sugerencias y encontrá el taller más adecuado para tu auto.</p>
          </article>
          <article class=" row botones_inicio">
            <a href="#" id="vt" class="badge badge-pill badge-primary botones_home_uno" > <p class="ver_todo">Ver Todo</p></a>
            <a href="#" class="badge badge-pill badge-primary botones_home_dos" > <p class="sos">S.O.S</p></a>
          </article>
        </section>
        <main class="main_index col-xl-6 col-lg-8 col-md-8">
          <div class="row">
            <article class=" pad col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <a href="talleres.php">
                  <div class="cuadrado">
                  <img class="imagen_cuadrado" src="img/talleres.png" alt=""><br><br>
                  <h2 class="letras_cuadrados">TALLERES</h2>
                </div>
                </a>
              </article>
              <article class="pad col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                  <a href="gomerias.php">
                    <div class="cuadrado">
                      <img class="imagen_cuadrado" src="img/gomerias.png" alt="GOMERIAS"><br><br>
                      <h2 class="letras_cuadrados">GOMERIAS</h2>
                    </div>
                  </a>
              </article>
              <article class=" pad col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <a href="lubricentro.php">
                    <div class="cuadrado">
                      <img class="imagen_cuadrado" src="img/lubricentros.png" alt="LUBRICENTROS"><br><br>
                     <h2 class="letras_cuadrados margen_cuadrado_lubri">LUBRICENTROS</h2>
                   </div>
                 </a>
                </article>
               <article class="pad  col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <a href="autoradio.php">
                    <div class="cuadrado">
                      <img class="imagen_cuadrado" src="img/autoradio.png" alt="autoradio"><br><br>
                     <h2 class="letras_cuadrados margen_cuadrado_autor ">AUTORADIOS</h2>
                     </div>
                  </a>
                </article>
               </div>
              </main>
            </div>
          </div>
          <div class="">
            <article class="vtdos nose_ve col-lg-8 botones_inicio ">
              <a href="#" id="vtdos" class="badge badge-pill badge-primary botones_home_uno" > <p class="ver_todo">Ver Todo</p></a>
              <a href="#" class="badge badge-pill badge-primary botones_home_dos" > <p class="sos">S.O.S</p></a>
            </article>
          </div>
    <footer>
        <?php require_once ('footer.php');?>
    </footer>
  </body>
</html>
