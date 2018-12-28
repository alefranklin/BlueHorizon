<?php
    session_start();
    include("../utils/utility.php"); // includo il file di connessione al database

    if (!isAdmin()) {
        $msg = 4;
        smartRedir($msg);
        die();
    }

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
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;

            case "rockets":
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;

            case "planets":
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;

            case "cabin":
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;

            case "rocket_cabin":
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;

            case "rocket_travel":
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;

            case "images":
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;

            case "orders":
                $query = "DELETE FROM $table WHERE id = $id";
                $result = $db->query($query) or die(mysqli_error());
                $msg = 5;
                break;
        }

    } else {

        $msg = 6;

    }

    smartRedir($msg);
?>
