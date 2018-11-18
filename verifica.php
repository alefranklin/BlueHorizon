<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
include("connessione_db.php");
//include("config.php");  

//variabili POST con anti sql Injection
$email=$db->real_escape_string($_POST['email']); //faccio l'escape dei caratteri dannosi
$password=$db->real_escape_string(sha1($_POST['password'])); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db

 $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
 $ris = $db->query($query) or die (mysql_error());
 $riga=$ris->fetch_assoc();  

/*Prelevo l'identificativo dell'utente */
$cod=$riga['id'];

/* Effettuo il controllo */
if ($cod == NULL) $trovato = 0 ;
else $trovato = 1;  

/* email e password corrette */
if($trovato === 1) {

 /*Registro la sessione*/
  session_register('autorizzato');

  $_SESSION["autorizzato"] = 1;

  /*Registro il codice dell'utente*/
  $_SESSION['cod'] = $cod;

 /*Redirect alla pagina riservata*/
   echo '<script language=javascript>document.location.href="privato.php"</script>'; 

} else {

/*email e password errati, redirect alla pagina di login*/
 echo '<script language=javascript>document.location.href="index.php"</script>';

}
?>