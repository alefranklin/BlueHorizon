<?php
session_start();
//se non c'è la sessione registrata
if (!$_SESSION['autorizzato']) {
  echo "<h1>Area riservata, ACCESS DANIED 'TUUUPIDOOOO.</h1>";
  echo "Per effettuare il login clicca <a href='login.php'><font color='blue'>qui</font></a>";
  die;
}

//Altrimenti Prelevo il codice identificatico dell'utente loggato
session_start();
$cod = $_SESSION['cod']; //id cod recuperato nel file di verifica
echo "<h1>Benvenuto nell'area riservata utente rispettabile n° $cod </h1>";
  echo "Per effettuare il logout clicca <a href='logout.php'><font color='blue'>qui</font></a>";
?>
