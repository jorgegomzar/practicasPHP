<?php
  session_start();

  if ($_SESSION["nfallos"] >= 3) {
    $_SESSION["nfallos"]=0;
    $_SESSION["naciertos"]=0;
  }

  $_SESSION["fallo"] = False;
  header('Location: index.php');

 ?>
