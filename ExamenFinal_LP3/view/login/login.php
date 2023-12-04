<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <?php include_once (ROOT_PATH . 'header.php') ?>
</head>
<body>
    <!-- Section: Design Block -->
    <section >
      <style>

        body  {
          background-image: url("/ExamenFinal_LP3/img/fondo_pan1.jpg");
          background-size: 100%;
        }

        #radius-shape-1 {
          height: 220px;
          width: 220px;
          top: -60px;
          left: -130px;
          background: radial-gradient(#c4c4c5, #c4c4c5);
          overflow: hidden;
        }

        #radius-shape-2 {
          border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
          bottom: -60px;
          right: -110px;
          width: 300px;
          height: 300px;
          background: radial-gradient(#c4c4c5, #c4c4c5);
          overflow: hidden;
        }

        .bg-glass {
          background-color: hsla(0, 0%, 100%, 0.7) !important;
          backdrop-filter: saturate(200%) blur(25px);
          
        }
      </style>

      <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5 ">
          <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
           
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

            <div class="card bg-glass ">
              <div class="card-body px-4 py-5 px-md-5 position-relative ">
                <form id="formLogin" action="" method="post" autocomplete="off">
                  
                  <!-- User input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Usuario</label>  
                    <input type="text" name="usuario" id="usuario" class="form-control" autocorrect="off" spellcheck="false" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="password" >Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" autocorrect="off" spellcheck="false" />
                  </div>


                  <!-- Submit button -->
                  <button type="submit" class="btn btn-dark btn-block mb-4" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                    Ingresar
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
</body>
    <?php
      require_once('../../footer.php');
    ?>
</html>