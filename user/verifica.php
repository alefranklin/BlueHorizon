<?php
    session_start(); //inizio la sessione
    include_once("../utils/connessione_db.php"); //includo i file necessari a collegarmi al db
ini_set('display_errors', 1);

    //variabili POST con anti sql Injection
    $username=$db->real_escape_string($_POST['username']);
    $passwd=$db->real_escape_string($_POST['password']);

    if(get_user($username,$passwd)) {

        $msg = 1;

        // se è settata redirigo sulla pagina del sito da cui è arrivato l'utente altrimenti ritorno all'homepage
        if (isset($_SERVER['HTTP_REFERER'])) header("location:".$_SERVER['HTTP_REFERER']."?snackmsg=".$msg);
        else header("location:".$local_path."?snackmsg=".$msg); // homepage

    } else {
        // errore
        $msg = 3;

        // se è settata redirigo sulla pagina del sito da cui è arrivato l'utente altrimenti ritorno all'homepage
        if (isset($_SERVER['HTTP_REFERER'])) header("location:".$_SERVER['HTTP_REFERER']."?snackmsg=".$msg);
        else header("location:".$local_path."?snackmsg=".$msg); // homepage
    }
?>
3
