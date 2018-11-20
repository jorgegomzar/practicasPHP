<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calculo de tabla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <header class="jumbotron text-center">
      <h1 class="display-3">Calcular tabla</h1>
    </header>
    <main class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-xs-12">
          <form class="form" method="get" action="./ejercicio02.php">
            <div class="form-group">
              <label for="row">Número de filas</label>
              <input type="number" class="form-control" id="row" name="row" aria-describedby="numberHelp" placeholder="Introduce un número">
              <small id="numberHelp" class="form-text text-muted">Tiene que ser un número.</small>
            </div>
            <div class="form-group">
              <label for="col">Número de columnas</label>
              <input type="number" class="form-control" id="col" name="col" aria-describedby="numberHelp" placeholder="Introduce un número">
              <small id="numberHelp" class="form-text text-muted">Tiene que ser un número.</small>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
            <button type="button" class="btn btn-warning" onclick="location='./index.html'">Volver atrás</button>
          </form>
          <table border="1">
            <?php
            $err = "<p class=\"text-danger\">Error, los números no puede dejarse en blanco, ni ser negativos ni cero.</p>";
            if (!empty($_GET)) {
              $row =  $_GET['row'];
              $col =  $_GET['col'];
              if ($row > 0 AND $col > 0) {
                for ($i=0; $i < $row; $i++) {
                  echo "<tr>";
                  for ($j=0; $j < $col; $j++) {
                    echo "<td>&nbsp;</td>";
                  }
                  echo "</tr>";
                }
              }
              else {
                echo $err;
              }
            } ?>
        </table>
        </div>
      </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
