<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <?php
      $users = array('pedro' , 'ana', 'marta', 'luis');
      $logins = array(
        'pedro' => '12345',
        'ana' => '54321',
        'marta' => '55555',
        'luis' => '11111');
      $user = $_GET['user'];
      $pass = $_GET['pass'];
     ?>
  <header class="jumbotron text-center">
    <?php if (in_array($user, $users) AND $pass == $logins[$user]):?>
    <h1 class="display-3 text-success">¡BIENVENIDOS!</h1>
  <?php else: ?>
    <h1 class="display-3 text-danger">¡¡USUARIO Y CONTRASEÑA INCORRECTA!!</h1>
  <?php endif; ?>
  </header>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
