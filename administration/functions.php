<?php
    session_start();
    include "controls.php";
    include_once "../utils/utility.php"; // includo il file di connessione al database

/****************************************************** funzioni ***************************************************************/

/**
 * solo per debug
 */
 function display_session() {
   ?>
   <pre>
  <?php
   print_r($_SESSION);
  ?>
   </pre>
  <?php
 }
/****************************************************** variabili **************************************************************/
    function pushVar($section, $id=null) {

        $name = array();
        switch ($section) {
            case "add-user":
            case "edit-user":
                $name = array('username', 'usernameErr', 'name', 'nameErr', 'lastname', 'lastnameErr',
                              'email', 'emailErr', 'gender', 'genderErr', 'password', 'passwordErr', 'repeat_password');
                break;

            case "add-travel":
            case "edit-travel":
                $sql  = "SELECT id, description, departure, arrival, id_rocket, date  FROM `travels`, rocket_travel as rt WHERE `id` = rt.id_travel and `id` = $id";
                $name = array('departure', 'departureErr', 'arrival', 'arrivalErr', 'date', 'dateErr', 'description', 'descriptionErr', 'rocket', 'rocketErr');
                break;

            case "add-rocket":

                break;
        }

        $vars = array();
        /* se la richiesta è get sono appena arrivato nella sezione manage e
           devo settare le variabili da usare */
        if($_SERVER["REQUEST_METHOD"] == "GET") {
          if (isset($id)) {
            $vars = get_query($sql)->fetch_assoc();
          }
          foreach ($name as $v) {
            if(!isset($vars[$v])) {
              $vars[$v] = "";
            }
          }

        }

        /* se la richiesta è post devo solo ricaricare le variabili gia impostate */
        if($_SERVER["REQUEST_METHOD"] == "POST") {
          //carico le variabili settate nel form
          foreach ($_POST as $key => $value) {
            $vars[$key] = $value;
          }
          // setto anche le variabili vuote per evitare errori
          foreach ($name as $v) {
            if (!isset($vars[$v])) {
              $vars[$v] = "";
            }
          }
        }

        $vars['section'] = $section;

        /*
        $vars = array();
        foreach($name as $v) {
            if(isset($id)) {
              if($_SERVER["REQUEST_METHOD"] == "GET") {
                $_SESSION['var'][$section][$id][$v] = get_query_assoc($sql);
              }
              else {
                $_SESSION['var'][$section][$id][$v] = ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST[$v])) ? $_POST[$v] : "";
              }
            }
            else {
              // carico le variabili nella sessione, se esisteno prendo il valore altrimenti metto vuoto
              $_SESSION['var'][$section][$v] = ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST[$v])) ? $_POST[$v] : "";
            }
        } */
        return $vars;
    }

    function destroyVar($section) {
        $_SESSION['var'][$section] = array();
        unset($_SESSION['var'][$section]);
    }
?>
