<?php
    /***************************************** connessione al database ****************************************************/
    include("config.php"); 

    // ip locale, login, password e nome database
    $db = new mysqli($host,$db_user,$db_psw, $db_name) or die ('Non riesco a connettermi: errore '.mysql_error());
    
    // rendo globale db per poterlo usare nelle funzioni
    $GLOBALS['db'] = $db;


    /***************************************** funzioni utili *************************************************************/

    function check_username($username) {
        
        $db = $GLOBALS['db'];
        
        $ris = $db->query("SELECT * FROM users WHERE username = '$username'") or die (mysql_error());  
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function check_email($email) {
        
        $db = $GLOBALS['db'];
        
        $ris = $db->query("SELECT * FROM users WHERE email = '$email'") or die (mysql_error());  
        if($ris->fetch_assoc() == NULL) return 0;
        else return 1;
    }

    function exist($username, $passwd) {
        
        $db = $GLOBALS['db'];
        
        // sha256 della password in questo modo corrisponde con quella del database
        $hash_passwd = myhash($passwd);
        
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hash_passwd' ";
        $ris = $db->query($query) or die (mysql_error());
        $data=$ris->fetch_assoc();  
        
        if($data == NULL) return 0;
        else return $data;
    }

    function get_user($username, $passwd) {
        
        $db = $GLOBALS['db'];
        
        if($user = exist($username, $passwd)) {
            
            // salvo i dati dello user in session
            $_SESSION['user'] = $user;

            // registro l'autorizzazione dell'utente ad accedere alle aree riservate
            $_SESSION["autorizzato"] = 1;
            
            // controllo se l'utente è admin
            if($user['id'] == 1 and $user["username"] == "admin" ) $_SESSION['admin'] = 1;
            else $_SESSION['admin'] = 0;
            
            return 1;

        } else {
            
            // nessun accesso al sito
            $_SESSION["autorizzato"] = 0;
            $_SESSION['admin'] = 0;
            return 0;
        }
        
    }
    
    function myhash($str) {
        return hash("sha256", $str."salt");
    }

echo myhash("root");
?>
