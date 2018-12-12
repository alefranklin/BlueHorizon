<?php
    /*********************************************** config ***************************************************************/

    include_once("config.php"); 

    /***************************************** connessione al database ****************************************************/

    // ip locale, login, password e nome database
    $db = new mysqli($host,$db_user,$db_psw, $db_name) or die ('Non riesco a connettermi: errore '.mysqli_error());
    
    // rendo globale db per poterlo usare nelle funzioni
    $GLOBALS['db'] = $db;


    /***************************************** funzioni utili *************************************************************/

    function check_username($username) {
        
        $db = $GLOBALS['db'];
        
        $ris = $db->query("SELECT * FROM users WHERE username = '$username'") or die (mysqli_error());  
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function check_email($email) {
        
        $db = $GLOBALS['db'];
        
        $ris = $db->query("SELECT * FROM users WHERE email = '$email'") or die (mysqli_error());  
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function exist($username, $passwd) {
        
        $db = $GLOBALS['db'];
        
        // sha256 della password in questo modo corrisponde con quella del database
        $hash_passwd = myhash($passwd);
        
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hash_passwd' ";
        $ris = $db->query($query) or die (mysqli_error());
        $data=$ris->fetch_assoc();  
        
        if($data == NULL) return 0;
        else return $data;
    }

    function get_user($username, $passwd) {
        
        $db = $GLOBALS['db'];
        
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

    /***************************************** funzioni admin *************************************************************/
    
    function isAdmin() {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user']['isAdmin'];
        } else return 0;
    }

    function get_table($table) {
        
        $db = $GLOBALS['db'];
        
        $query = "SELECT * FROM ".$table;
        $ris = $db->query($query) or die (mysqli_error());
        
        $data= array();
        
        while($row = $ris->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } 
?>
