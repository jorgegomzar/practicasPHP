<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tabla periódica</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
  </head>
  <body>
    <h1>¿Sabes la tabla periódica?</h1>
    <p>Tienes que adivinar la abreviatura del elemento. Cuando hagas 3 fallos el juego se acaba.</p>
    <?php
      include "elementos.php";
      // CREO O REANUDO LA SESIÓN
      session_start();
      // FLAG EN CASO DE FALLO
      if (isset($_SESSION["fallo"]))
        $fallo = $_SESSION["fallo"];
      else {
        $fallo = False;
        $_SESSION["fallo"] = $fallo;
      }
      // CREO O RECUPERO EL ELEMENTO
      if (isset($_SESSION["elemento"]))
        $elemento = $_SESSION["elemento"];
      else {
        $randElem = array_rand($elementos);
        $elemento = $elementos[$randElem];
        $_SESSION["elemento"] = $elemento;
      }
      // CREO O RECUPERO ACIERTOS Y FALLOS
      if (isset($_SESSION["naciertos"]))
        $naciertos = $_SESSION["naciertos"];
      else
        $naciertos = 0;

      if (isset($_SESSION["nfallos"]))
        $nfallos = $_SESSION["nfallos"];
      else
        $nfallos = 0;
      // FLAG EN CASO DE MÁS DE 3 FALLOS
      if ($nfallos >= 3){
        $gameover = True;
        $_SESSION["gameover"] = True;
      }
      // RECUPERO LA CLAVE DEL POST
      if (isset($_POST["clave"])) {
        $clave = $_POST["clave"];
        if ($clave == $elemento["clave"])
          $naciertos++;
        elseif ($clave != $elemento["clave"]) {
          $nfallos++;
          $fallo = True;
          $_SESSION["fallo"] = $fallo;
        }
        $randElem = array_rand($elementos);
        $elemento = $elementos[$randElem];
        $_SESSION["elemento"] = $elemento;
        header("location: index.php");
      }

      $_SESSION["naciertos"] = $naciertos;
      $_SESSION["nfallos"] = $nfallos;

      if(!$fallo): ?>
        <h3 id="elemento">Elemento: <?=$elemento["nombre"]?></h3>

     <?php else: ?>
      <h3>¡¡Fallaste!!</h3>
      <?php if ($nfallos>=3): ?>
        <p>Has fallado 3 veces. El juego se reiniciará.</p>
      <?php endif; ?>
     <?php endif;
      if (!$fallo): ?>
       <form class="" action="index.php" method="post">
         <input type="text" name="clave" value="" placeholder="Escriba la clave (2 letras)">
         <button type="submit">Comprobar</button>
       </form>
     <?php else: ?>
        <a href="repetir.php"><button type="button" href="index.php">Seguir jugando</button></a>
     <?php endif; ?>
    <p>Aciertos: <b><?=$naciertos?></b></p>
    <p>Fallos: <b><?=$nfallos?></b></p>
  </body>
</html>
