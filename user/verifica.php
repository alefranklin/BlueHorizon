<?php
    session_start(); //inizio la sessione
    include_once("../utils/utility.php"); //includo i file necessari a collegarmi al db

    //variabili POST con anti sql Injection
    $username=$db->real_escape_string($_POST['username']);
    $passwd=$db->real_escape_string($_POST['password']);

    if(get_user($username,$passwd)) {
        $msg = 1;
    } else {
        // errore
        $msg = 3;
    }
    smartRedir($msg);
?>
