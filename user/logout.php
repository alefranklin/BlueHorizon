<?php
session_start();

unset($_SESSION['user']);
//creo una varibiale con un messaggio
$_SESSION['snackmsg'] = "log-out effettuato con successo.";

//ritorno a index.php usando GET posso recuperare e stampare a schermo il messaggio di avvenuto logout
header("location: ../index.php");
exit();
?>
