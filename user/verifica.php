<?php
    session_start(); //inizio la sessione
    include("../utils/connessione_db.php"); //includo i file necessari a collegarmi al db

    //variabili POST con anti sql Injection
    $username=$db->real_escape_string($_POST['username']); 
    $passwd=$db->real_escape_string($_POST['password']);

    if(get_user($username,$passwd)) {
        
        // se è settata redirigo sulla pagina del sito da cui è arrivato l'utente altrimenti ritorno all'homepage
        //if (isset($_SERVER['HTTP_REFERER'])) header("location:".$_SERVER['HTTP_REFERER']);
        //else header("location:../user/privato.php"); // TODO sostitutire con homepage
        
        header("location:../user/privato.php"); // da eliminare dopo merge con html
        
    } else {
        // TODO inviare messaggio di errore
        header("location:../user/privato.php");
    }  
?>
