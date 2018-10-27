<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Práctica 03</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <header class="jumbotron text-center" style="width: 100%;">
      <h1 class="display-3">COMPROBACIÓN NUMÉRICA</h1>
    </header>
    <main class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-xs-12">
          <form  class="form" style="width: 100%;"  action="comprobacion.php" method="get">
            <div class="form-group">
              <label for="number">Escribe un número</label>
              <input type="number" class="form-control" name="number" placeholder="Número..." step="0.000001">
            </div>
            <button type="submit" style="width: 100%;" class="btn btn-primary btn-block btn-lg">CALCULAR</button>
          </form>
        </div>
        </div>
    </main>
    <button type="button" class="btn btn-warning" onclick="location='./index.html'">Volver atrás</button>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
