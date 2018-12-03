<?php
    session_start();
    include("../utils/config.php");
    
    $_SESSION = array();
    session_destroy(); //distruggo tutte le sessioni
    
    $msg = urlencode("Arrivederci!"); // invio il messaggio via get

    //ritorno a index.php usando GET posso recuperare e stampare a schermo il messaggio di avvenuto logout
    header("location:".$base_url."?msg=$msg");
    exit();
?>
