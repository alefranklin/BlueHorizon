<?php
    session_start();

    include("connessione_db.php"); // includo il file di connessione al database

    if($_POST["username_reg"] != "" && $_POST["password_reg"]!= "" && $_POST["email_reg"] != "") {  // controllo parametri
        
        // scrivo sul DB
        $query = "INSERT INTO users (username,password,email)
                  VALUES ('".$_POST["username_reg"]."','".$_POST["password_reg"]."','".$_POST["email_reg"]."')";
        $ris_reg = $db->query($query) or die (mysql_error()); // se la query fallisce
        
    } else {

        // se le condizioni non sono rispettate
        header('location:registration.php?action=registration&errore=Non hai compilato tutti i campi obbligatori');
    }

    if(isset($ris_reg)) { //se la reg è andata a buon fine

        /*Registro l'autorizzazione dell'utente*/
        $_SESSION["autorizzato"] = 1;
        
    } else {

        error_log("non ti sei registrato con successo\n", 3, log.txt); // log fallimento
    }

    header("location:privato.php");
?>
