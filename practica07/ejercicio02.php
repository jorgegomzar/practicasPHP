
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejercicio02</title>
    <?php
    if (!empty($_POST)) {
      echo("<style> form{display: none;} </style>");
    }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
     <header class="jumbotron text-center">
       <h1 class="display-3">Cálculo de salario</h1>
     </header>
     <?php
     if (!empty($_POST)) {
       if($_POST["nombre"]!="" AND $_POST["apellidos"]!="" AND $_POST["salario"]!="" AND $_POST["edad"]!="") {
         $name = $_POST["nombre"];
         $surname = $_POST["apellidos"];
         $money = $_POST["salario"];
         $age = $_POST["edad"];
         if ($money > 1000 AND $money < 2000) {
           if ($age > 45) {
             $money = $money + $money*0.03;
           }
           else {
             $money = $money + $money*0.1;
           }
         } elseif ($money < 1000) {
           if ($age < 30) {
             $money = 1100;
           }
           else if ($age <= 45) {
             $money = $money + $money*0.03;
           }
           else {
             $money = $money + $money*0.15;
           }
         }
         echo "<h3 id=\"ok\">$name $surname, tu sueldo es de $money €</h3>";
       } else {
         echo "<h3 id=\"error\">Falta\\n de rellenar algún\\os dato\\s</h3>";
       }
     }
     ?>
     <main class="container">
       <div class="row justify-content-center">
         <div class="col-6 col-xs-12">
           <form class="form" action="ejercicio02.php" method="post">
             <div class="form-group">
               <label for="nombre">Nombre: </label><br>
               <input class="form-control" type="text" name="nombre"><br>
               <label for="apellidos">Apellidos: </label><br>
               <input class="form-control" type="text" name="apellidos"><br>
               <label for="salario">Salario (en euros): </label><br>
               <input class="form-control" type="text" name="salario"><br>
               <label for="edad">Edad: </label><br>
               <input class="form-control" type="number" name="edad" min="18"><br>
               <button class="btn btn-primary" type="submit">Calcular</button>
             </div>
           </form>
         </div>
       </div>
     </main>
     <button type="button" class="btn btn-warning" onclick="location='./index.html'">Volver atrás</button>
     <footer>Crédito a <a href="http://jorgesanchez.net/practicas/iaw/practica07/ejercicio02/">Jorge Sánchez</a>.</footer>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
