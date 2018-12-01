<?php
    session_start(); //inizio la sessione
    include("../utils/connessione_db.php"); //includo i file necessari a collegarmi al db

    //variabili POST con anti sql Injection
    $username=$db->real_escape_string($_POST['username']); 
    $passwd=$db->real_escape_string($_POST['password']);

    if(get_user($username,$passwd)) {
        
        // redirect alla pagina riservata
        header("location:../user/privato.php");
    } else {
        // TODO inviare messaggio di errore
        header("location:../user/privato.php");
    }  
?>
