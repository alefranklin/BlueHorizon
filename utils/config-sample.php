<?php
  //generali
  $sito_internet = "BlueHorizon";
	$data =(date("d-m-y"));
	$vers = "alpha";

  //URL PER HTACCESS
	$local_path = $_SERVER['HTTP_REFERER']."/BlueHorizon/"; //usato per gli include
  $host_path = $_SERVER['HTTP_REFERER']."/BlueHorizon/"; //usato per le cose di stile(css, immagini)

  //connessione DB
	$host = "localhost";
	$db_user = "root"; //<--- cambiate con il vostro utente del database
	$db_psw = "";  //<--- mette la vostra password del database
	$db_name = "new_blueh_db";
?>
