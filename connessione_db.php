<?php
    //connessione al database
    include("config.php"); 

    $db= new mysqli($host,$db_user,$db_psw, $db_name);  // ip locale, login, password e nome database
    if(!$db){
        $msg='Non riesco a connettermi: errore '.mysql_error(); // questo apparirà solo se ci sarà un errore
        die ($msg);
        error_log($msg, 3, $log_file);
    }
    
/*
    $db=mysql_select_db($db_name,$db); // seleziono il database su cui lavorare
    if(!$db){
        $msg='Errore nella selezione del database: errore '.mysql_error(); // apparirà se la connessione non andrà a buon fine
        die ($msg);
        error_log($msg, 3, $log_file);
    }
*/
    error_log('database connesso con successo', 3, $log_file);
?>