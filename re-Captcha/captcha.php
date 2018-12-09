<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Implementación re-Captcha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <?php
      // INICIALIZACIÓN DE LA SESIÓN
      session_start();
      // REDIRECCIONAMIENTO SI EXISTÍA YA UNA SESIÓN
      if (isset($_SESSION["user"]))
        header('location:perfil.php');
      // CONTADOR DE INTENTOS FALLIDOS
      if (!isset($_POST["contador"]))
        $contador = 0;
      // SI SE HAN REALIZADO 3 INTENTOS FALLIDOS SEGUIDOS QUE SE RECUPERE SI SE HA REALIZADO EL CAPTCHA
      if(isset($_POST["contador"]) and $_POST["contador"] > 3) {
        $secretKey = '6Ld8rH8UAAAAAOSEfcZRrZ8rL11ff8Z97gVc2_oS';
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
      }
     ?>
    <header class="jumbotron text-center">
      <h1 class="display-3">re-Captcha</h1>
    </header>
    <main class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-xs-12">
          <?php
            // COMPROBACIÓN DE USUARIO Y CONTRASEÑA CON EL XML
            if (isset($_POST["user"]) and isset($_POST["pass"])){
              $xml = simplexml_load_file('credenciales.xml');
              $user = $_POST["user"];
              $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);
              $ok = False;
              foreach ($xml->login as $login)
                if ($user == $login->user and password_verify($login->pass, $pass))
                  $ok = True;
            }
            // INCREMENTO DEL CONTADOR Y RESETEO DE LAS VARIABLES POST ****SI NO OK****
            if(isset($ok) and !$ok) {
              $contador = $_POST["contador"] + 1;
              echo "<p class='badge badge-danger'>Usuario o contraseña incorrectos, ".$contador." intentos fallidos.</p>";
              unset($_POST["user"]);
              unset($_POST["pass"]);
            } elseif (isset($ok) and $ok){
              // AÑADIR VARIABLES A LA SESIÓN Y REDIRECCIÓN AL PERFIL ****SI OK****
              if (!isset($response) or (isset($response) and $response->success)){
                $_SESSION["user"] = $user;
                $_SESSION["pass"] = $pass;
                header('location:perfil.php');
              } else {
                // ELIMINAR USUARIO Y CONTRASEÑA SI NO SE HA RELLENADO EL CAPTCHA, RECUPERAR EL CONTADOR DEL POST
                unset($_POST["user"], $_POST["pass"]);
                $contador = $_POST["contador"];
              }
            }
            // SI EXISTE RESPUESTA AL CAPTCHA Y NO ES SATISFACTORIA QUE AVISE AL USUARIO
            if (isset($response) and !$response->success):
            ?>
              <p class="badge badge-info">Es necesario clickar el re-Captcha.</p>
            <?php endif;
            // FORMULARIO SI NO EXISTEN LOS DATOS YA
            if (!isset($_POST["user"]) and !isset($_POST["pass"])): ?>
             <form role="form" class="form" action="captcha.php" method="post">
               <div class="form-group">
                 <label for="username">Usuario:</label>
                 <input class="form-control" type="text" name="user" value="">
               </div>
               <div class="form-group">
                 <label for="pass">Contraseña:</label>
                 <input class="form-control" type="password" name="pass" value="">
               </div>
               <div class="form-group">
                 <input type="hidden" name="contador" value="<?=$contador?>">
                 <?php if($contador >= 3): ?>
                   <!-- SI SE HAN FALLADO 3 VECES O MÁS QUE APAREZCA EL CAPTCHA -->
                   <div class="g-recaptcha" data-sitekey="6Ld8rH8UAAAAAE0G4iepJKIRUyQxdyz22pkzZB91"></div>
                 <?php endif; ?>
                 <button class="btn btn-warning" type="submit" name="button">Acceder</button>
               </div>
             </form>
            <?php endif;?>

           <a href="../index.html">Ir al índice</a>
          </div>
        </div>
      </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
