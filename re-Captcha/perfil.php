<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Implementación re-Captcha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <header class="jumbotron text-center">
      <h1 class="display-3">Perfil</h1>
    </header>
    <main class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-xs-12">
          <?php
          // INICIO DE SESIÓN
          session_start();
          // DESTRUCCIÓN DE LA SESIÓN
          if (isset($_POST["logout"])) {
            unset($_POST["logout"]);
            session_unset();
            session_destroy();
            echo "<script>
            alert('Sesión cerrada');
            window.location.href='captcha.php';
            </script>";
          }
          // HTML A MOSTRAR SI SE HA INICIADO SESIÓN CORRECTAMENTE
          if (isset($_SESSION["user"])): ?>
            <p>Bienvenido <?=$_SESSION["user"] ?>, este es tu perfil.</p>
            <form class="form" action="perfil.php" method="post">
              <input type="hidden" name="logout" value="True">
              <button class="btn btn-danger" type="submit">Cerrar sesión</button>
            </form>
          <?php
            endif;
            // REDIRECCIÓN A LOGIN PARA EVITAR GUARRADAS
            if(!isset($_SESSION["user"]))
              header('location:captcha.php');?>
          <a href="../index.html">Volver al índice</a>
        </div>
      </div>
    </main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
