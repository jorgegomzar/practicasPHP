<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Examen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
      li:hover {
        background-color: darkcyan;
      }
      li:hover > a {
        color: white;
      }
      a{
        display: block;
      }
      #content {
        position: relative;
        margin: 0 auto;
        width: 80%;
        border-radius: 20px;
      }
    </style>
  </head>
  <body style="background-image: linear-gradient(lightgrey, grey)">
    <form id="content" method="get" action="shownumbers.php" class="bg-secondary">
      <header style="border-radius: 10px" class="jumbotron text-center bg-dark text-white">
        <h1 class="display-4">LISTA DE NÚMEROS</h1>
      </header>
      <div class="form-group">
        <?php
          $num = $_GET['num'];
          for($i=1; $i<=$num; $i++){
            echo "<label for=\"$i\">Escribe el número $i</label><br>";
            echo "<input class='form-control' type='number' name=\"$i\"></input><br>";
          }
        ?>
        <button class="form-control" type="submit">Enviar</button><br>
      </div>
    </form>
    <footer class="bg-secondary text-white text-center" style="position:relative;bottom:0;width:100%;font-size:1.25em;">
      Thanks <a style="display: inline-block; text-transform:none; color:yellow;" href="https://github.com/powervic">Victoria</a>, for always supporting me.
      <br>
      Credits to <a style="display: inline-block;text-transform:none; color:yellow;" href="http://jorgesanchez.net/">&copy;Jorge Sánchez</a>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
