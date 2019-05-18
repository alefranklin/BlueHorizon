<?php
    session_start();
    include "forms.php";
    include "controls.php";

/****************************************************** funzioni ***************************************************************/

/****************************************************** variabili **************************************************************/
    function pushVar($section, $id=NULL) {

        $vars = array();
        switch ($section) {
            case "add-user":
            case "edit-user":
                $vars = array('username', 'usernameErr', 'name', 'nameErr', 'lastname', 'lastnameErr',
                              'email', 'emailErr', 'gender', 'genderErr', 'password', 'passwordErr', 'repeat_password');
                break;

            case "add-travel":
            case "edit-travel":
                $vars = array('departure', 'departureErr', 'arrival', 'arrivalErr', 'date', 'dateErr', 'description', 'descriptionErr');
                break;

            case "add-rocket":

                break;
        }

        foreach($vars as $v) {
            // carico le variabili nella sessione, se esisteno prendo il valore altrimenti metto vuoto
            $_SESSION['var'][$section][$v] = ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST[$v])) ? $_POST[$v] : "";
        }
    }

    function destroyVar($section) {
        $_SESSION['var'][$section] = array();
        unset($_SESSION['var'][$section]);
    }
