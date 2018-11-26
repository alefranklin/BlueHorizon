<?php
    session_start(); //inizio la sessione
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include("../utils/connessione_db.php");
    //include("config.php");  

    //variabili POST con anti sql Injection
    $email=$db->real_escape_string($_POST['email']); //faccio l'escape dei caratteri dannosi
    $password=$db->real_escape_string($_POST['password']); // sha1($_POST['password']) sha1 cifra la password anche qui in questo modo corrisponde con quella del db

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
        
        /*Registro l'autorizzazione dell'utente*/
        $_SESSION["autorizzato"] = 1;

        /*Registro il codice dell'utente*/
        $_SESSION['cod'] = $cod;

        error_log("loggato\n", 3, $log_file);

    } else {
        
        $_SESSION["autorizzato"] = 0;
        
        error_log("non loggato\n", 3, $log_file);
    }
    
    /*Redirect alla pagina riservata*/
    echo '<script language=javascript>document.location.href="../user/privato.php"</script>';
?>
