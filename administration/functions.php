<?php
    session_start();
/****************************************************** variabili **************************************************************/
    function pushTravelVar() {
        vars = array('departure', 'departureErr', 'arrival', 'arrivalErr', 'date', 'dateErr', 'description', 'descriptionErr')
        
        foreach (vars as v):
            $_SESSION['var']['travel'][v] = ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST[v] : "";
        endforeach;
        
        /*
        $_SESSION['var']['travel']['departureErr'] = 
            $_SESSION['var']['travel']['arrivalErr'] = 
            $_SESSION['var']['travel']['dateErr'] = 
            $_SESSION['var']['travel']['descriptionErr'] = "";
        
        $_SESSION['var']['travel']['departure'] = 
            $_SESSION['var']['travel']['arrival'] = 
            $_SESSION['var']['travel']['date'] = 
            $_SESSION['var']['travel']['description'] = "";
        */
    }

    function destroyTravelVar() {
        $_SESSION['var']['travel'] = array();
        unset($_SESSION['var']['travel']);
    }

/****************************************************** controlli **************************************************************/
    function addTravelControls() {
        $error = false;
    	
        // partenza
        if (empty($_POST["departure"])) {
            $departureErr = "La partenza è necessaria";
            $error = true;
        } else {
            $departure = test_input($_POST["departure"]);
            // guardo se contiene solo lettere o numeri
            if (!preg_match("/^[a-zA-Z]*$/",$departure)) {
                $departureErr = "sono ammesse solo lettere";
                $error = true;
            }
        }
        
        // destinazione
        if (empty($_POST["arrival"])) {
            $arrivalErr = "La destinazione è necessaria";
            $error = true;
        } else {
            $arrival = test_input($_POST["arrival"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/",$arrival)) {
                $arrivalErr = "Only letters are allowed";
                $error = true;
            }
        }
        
        // date di partenza
        if (empty($_POST["date"])) {
            $dateErr = "La data di partenza è necessaria";
            $error = true;
        } else {
            $date = test_input($_POST["date"]);
            // check if name only contains letters and whitespace
            if (validateDate($date)) {
                $lastnamErr = "La data non è valida"; 
                $error = true;
            }
        }
        
        // descrizione
        if (empty($_POST["description"])) {
            $descriptionErr = "La descrizione è necessaria";
            $error = true;
        } else {
            $description = test_input($_POST["description"]);
            
            if(strlen($description) < 100) {
                $descriptionErr = $descriptionErr."Must be a minimum of 100 characters";
                $error = true;
            }
            
            if(strlen($description) > 65000) {
                $descriptionErr = $descriptionErr."Must be a maximum of 65000 characters";
                $error = true;
            }
        }
        
        return !$error;
    }

/*
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
*/

?>