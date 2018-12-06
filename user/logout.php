<?php
    session_start();
    include_once("../utils/config.php");
    
    //creo una varibiale con un messaggio
    $_SESSION['snackmsg'] = "log-out effettuato con successo.";

    header("location:".$host_path);
    exit();
?>
