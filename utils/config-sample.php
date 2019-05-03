<?php
  //generali
  $sito_internet = "BlueHorizon";
	$data =(date("d-m-y"));
	$vers = "alpha";

  //URL PER HTACCESS
	$local_path = $_SERVER['DOCUMENT_ROOT']."/BlueHorizon/"; //usato per gli include
  $host_path = "http://localhost/BlueHorizon/"; //usato per le cose di stile(css, immagini)

  //connessione DB
	$host = "localhost";
	$db_user = "root"; //<--- cambiate con il vostro utente del database
	$db_psw = "";  //<--- mette la vostra password del database
	$db_name = "blueh_db";
?>
