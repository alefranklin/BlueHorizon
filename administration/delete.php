<?php
    session_start();
    include("../utils/utility.php"); // includo il file di connessione al database

    displayErrors();

    if (isAdmin()) {
        
        // controllo se le variabili get sono valide
        if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['table'])) {

            $id = $db->real_escape_string($_GET['id']);
            $table = $db->real_escape_string($_GET['table']);
            
            switch ($table) {
                    
                case "users":
                    $query = "DELETE FROM $table WHERE id=$id";
                    $result = $db->query($query) or die(mysqli_error());
                    $msg = 5;
                    break;
                    
                case "travels":
                    // TODO aggiungere query per eliminare da questa tabella
                    $query = "";
                    $result = $db->query($query) or die(mysqli_error());
                    $msg = 5;
                    break;
                    
                case "rockets":
                    // TODO aggiungere query per eliminare da questa tabella
                    $query = "";
                    $result = $db->query($query) or die(mysqli_error());
                    $msg = 5;
                    break;
            }
            
            smartRedir($msg);

        } else {

            echo "ERRORE";

        }
        
    } else {
        $msg = 4;
        smartRedir($msg);
    }

?>
