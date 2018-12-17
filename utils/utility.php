<?php
    /*********************************************** config ***************************************************************/

    include_once("config.php");
    
    // flag di debug mode (1 or 0)
    $DEBUG = 1;
    displayErrors($DEBUG);
    /***************************************** connessione al database ****************************************************/

    // ip locale, login, password e nome database
    $db = new mysqli($host,$db_user,$db_psw, $db_name) or die ('Non riesco a connettermi: errore '.mysqli_error());

    /***************************************** funzioni utili *************************************************************/

    function check_username($username) {
        
        $db = $GLOBALS['db'];
        
        $ris = $db->query("SELECT * FROM users WHERE username = '$username'") or die (mysqli_error());  
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function check_email($email) {
        
        global $db;
        
        $ris = $db->query("SELECT * FROM users WHERE email = '$email'") or die (mysqli_error());  
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function exist($username, $passwd) {
        
        global $db;
        
        // sha256 della password in questo modo corrisponde con quella del database
        $hash_passwd = myhash($passwd);
        
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hash_passwd' ";
        $ris = $db->query($query) or die (mysqli_error());
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
        return ($self == $actual) ? "active space-font" : "space-font";
    }

    function isAuth() {
        if (isset($_SESSION['user'])) {
            return 1;
        } else return 0;
    }

    function smartRedir($msg) {
        global $local_path;
        
        if (isset($_SERVER['HTTP_REFERER'])){

            $prev_page = current(explode('?', $_SERVER['HTTP_REFERER']));
            return $prev_page;
            //header("location:$prev_pag"."?snackmsg=$msg");
            
        } else {
            
            //header("location:$local_path"."?snackmsg=$msg"); // homepage
        }
    }

    function displayErrors($DEBUG) {
        ini_set('display_errors', $DEBUG);
    }

    /***************************************** funzioni admin *************************************************************/
    
    function isAdmin() {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user']['isAdmin'];
        } else return 0;
    }

    function get_table($table) {
        
        global $db;
        
        $query = "SELECT * FROM ".$table;
        $ris = $db->query($query) or die (mysqli_error());
        
        return $ris;
    } 
?>
