<?php
    session_start(); //inizio la sessione
    include_once("../utils/utility.php"); //includo i file necessari a collegarmi al db
ini_set('display_errors', 1);

    //variabili POST con anti sql Injection
    $username=$db->real_escape_string($_POST['username']); 
    $passwd=$db->real_escape_string($_POST['password']);

    if(get_user($username,$passwd)) {
        
        $msg = urlencode ("Benvenuto ".$_SESSION['user']['username']);
        
        // se è settata redirigo sulla pagina del sito da cui è arrivato l'utente altrimenti ritorno all'homepage
        if (isset($_SERVER['HTTP_REFERER'])) header("location:".$_SERVER['HTTP_REFERER']."?msg=".$msg);
        else header("location:".$local_path."?msg=".$msg); // homepage
        
    } else {
        // errore
        $msg = urlencode ("username o password non validi");
        
        // se è settata redirigo sulla pagina del sito da cui è arrivato l'utente altrimenti ritorno all'homepage
        if (isset($_SERVER['HTTP_REFERER'])) header("location:".$_SERVER['HTTP_REFERER']."?msg=".$msg);
        else header("location:".$local_path."?msg=".$msg); // homepage
    }  
?>
