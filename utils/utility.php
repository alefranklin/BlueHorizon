<?php
    /*********************************************** config ***************************************************************/

    include_once("config.php");

    // flag di debug mode (1 or 0)
    $DEBUG = 1;
    displayErrors($DEBUG);
    /***************************************** connessione al database ****************************************************/

    // ip locale, login, password e nome database
    $db = new mysqli($host,$db_user,$db_psw, $db_name) or die ('Non riesco a connettermi: errore '.mysqli_error($db));

    /***************************************** funzioni utili *************************************************************/

    function check_username($username) {

        global $db;

        $ris = $db->query("SELECT * FROM users WHERE username = '$username'") or die (mysqli_error($db));
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function check_email($email) {

        global $db;

        $ris = $db->query("SELECT * FROM users WHERE email = '$email'") or die (mysqli_error($db));
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function exist($username, $passwd) {

        global $db;

        // sha256 della password in questo modo corrisponde con quella del database
        $hash_passwd = myhash($passwd);

        $query = "SELECT * FROM users WHERE username = '$username' AND pwhash = '$hash_passwd' ";
        $ris = $db->query($query) or die (mysqli_error($db));
        $data=$ris->fetch_assoc();

        if($data == NULL) return 0;
        else return $data;
    }

    function get_user($username, $passwd) {

        global $db;

        if($user = exist($username, $passwd)) {

            // salvo i dati dello user in session
            $_SESSION['user'] = $user;
            return 1;

        } else {
            // nessun accesso alle aree riservate del sito
            return 0;
        }

    }

    function myhash($str) {
        return hash("sha256", $str."salt");
    }

    function setActive($self, $actual){
        $self = explode('/',$self);
        $self = end($self);
        return ($self == $actual) ? "space-font active" : "space-font";
    }

    function isAuth() {
        if (isset($_SESSION['user'])) {
            return 1;
        } else return 0;
    }

    function smartRedir($msg,$link = ""){
        global $host_path;

        if($link != ""){
          header("location:$link"."?snackmsg=$msg");
        } else {
          if (isset($_SERVER['HTTP_REFERER'])){
              // elimino eventuali variabili get precedenti
              $prev_page = current(explode('?', $_SERVER['HTTP_REFERER']));
              header("location:$prev_page"."?snackmsg=$msg");

          } else {
              header("location:$host_path"."?snackmsg=$msg"); // homepage
          }
        }
    }


    function displayErrors($DEBUG) {
        ini_set('display_errors', $DEBUG);
    }

    function isAdmin() {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user']['isAdmin'];
        } else return 0;
    }

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

    function get_query($sql) {
      global $db;
      $ris = $db->query($sql) or die (mysqli_error($db));

      return $ris;
    }

    function get_query_assoc($sql) {

      global $db;
      $result = $db->query($sql) or die(mysqli_error($db));

      if (!$result) {
        return 0;
      }
      else {
        return $result->fetch_all(MYSQLI_ASSOC);
      }
    }

    function get_table($table) {

        global $db;

        $query = "SELECT * FROM $table";
        $ris = $db->query($query) or die (mysqli_error($db));

        return $ris;
    }

    /**
     * ritorna i dati della tabella in formato json
     * in caso di errore ritorna 0
     */
    function get_table_json($table) {

      global $db;

      $query = "select * from $table";

      $result = $db->query($query) or die(mysqli_error($db));

      if (!$result) {
        return 0;
      }
      else {
        // creo la lista json da ritornare
        $arr = $result->fetch_all(MYSQLI_ASSOC);
        return json_encode($arr);
      }
    }

    /**
     * ritorna i dati della tabella in formato array associativo
     * in caso di errore ritorna 0
     */
    function get_table_assoc($table) {

      global $db;

      $query = "select * from $table";

      $result = $db->query($query) or die(mysqli_error($db));

      if (!$result) {
        return 0;
      }
      else {
        return $result->fetch_all(MYSQLI_ASSOC);
      }
    }

    function ErrorHandle($str=null) {
      if ($DEBUG == 1 && isset($str)) {
        print_r($str);
      }
      header("location:$host_path"."/html/errore.php"); // homepage
    }
?>
