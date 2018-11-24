<?php
    //connessione al database
    include("config.php"); 

    $db= new mysqli($host,$db_user,$db_psw, $db_name);  // ip locale, login, password e nome database
    if(!$db){
        $msg='Non riesco a connettermi: errore '.mysql_error(); // questo apparirà solo se ci sarà un errore
        die ($msg);
        error_log("'$msg'\n", 3, $log_file);
    }

    error_log("database connesso con successo\n", 3, $log_file);
?>
