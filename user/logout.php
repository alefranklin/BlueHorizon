<?php
session_start();

//creo una varibiale con un messaggio
$_SESSION['snackmsg'] = "log-out effettuato con successo.";

header("location: ../index.php");
exit();
?>
