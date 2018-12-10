<?php
    session_start();
    include_once("../utils/connessione_db.php"); // includo il file di connessione al database
    
    $browser = get_browser(null, true);
    //print_r($browser);

    // definisco le variabili e le inizializzo vuote
    $usernameErr = $nameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = "";
    $username = $name = $lastname = $email = $gender = $password = $repeat_password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	
    	$error = false;
    	
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
            $error = true;
        } else {
            $username = test_input($_POST["username"]);
            // guardo se contiene solo lettere o numeri
            if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
                $usernameErr = "sono ammessi solo lettere e numeri";
                $error = true;
            }
            
            if(check_username($username)) {
                $emailErr = "username gia utilizzata";
                $error = true;
            }
        }
        
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $error = true;
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/",$name)) {
                $nameErr = "Only letters are allowed";
                $error = true;
            }
        }
        
        if (empty($_POST["lastname"])) {
            $lastnameErr = "Lastname is required";
            $error = true;
        } else {
            $lastname = test_input($_POST["lastname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
                $lastnameErr = "Only letters are allowed"; 
                $error = true;
            }
        }
        
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
            $error = true;
        } else {
            $password = test_input($_POST["password"]);
            
            // regole password
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
	    
            if(!$uppercase) {
                $passwordErr = "Must contain at least one uppercase character<br/>";
                $error = true;
            }

            if(!$lowercase) {
                $passwordErr = $passwordErr."Must contain at least one lowercase character<br/>";
                $error = true;
            }

            if(!$number) {
                $passwordErr = $passwordErr."Must contain at least 1 number<br/>";
                $error = true;
            }
            
            if(strlen($password) < 8) {
                $passwordErr = $passwordErr."Must be a minimum of 8 characters";
                $error = true;
            }
        }
        
        if (empty($_POST["repeat_password"])) {
            $passwordErr = "reinserisci la password";
            $error = true;
        } else {
            $repeat_password = test_input($_POST["repeat_password"]);
            
            if($password != $repeat_password) {
                $passwordErr = "le passsword non corrispondono";
                $error = true;
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $error = true;
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $error = true;
            }
            
            if(check_email($email)) {
                $emailErr = "email gia utilizzata";
                $error = true;
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            $error = true;
        } else {
            $gender = test_input($_POST["gender"]);
        }
        
        //se non si sono verificati errori procedo con la registrazione dei dati
        if(!$error) {
            
            // scrivo sul DB
            $passwd_hash = myhash($_POST["password"]);
            $query = "INSERT INTO users (username, name,lastname,sex,email,password)
            VALUES ('".$_POST["username"]."','".$_POST["name"]."','".$_POST["lastname"]."','".$_POST["gender"]."','".$_POST["email"]."','".$passwd_hash."')";
            
            try {

                $ris_reg = $db->query($query) or die (mysqli_error()); // se la query fallisce
            
            } catch (Exception $e) {
                print_r($e);
            }
            
            //se la registrazione è andata a buon fine
            if(isset($ris_reg)) {

                get_user($_POST["username"],$_POST["password"]);

            }
            
            // TODO rimandare a index
            header("location:".$host_path."user/privato.php");
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE HTML> 
<html>  
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?= $local_path."../style/registration.css" ?>">
        
        <style>
            .error {color: #FF0000;}
        </style>
        
    </head>
    <body>
        <h2>Registrazione</h2>
        <p><span class="error">* required field</span></p>
        <form name="form_registration" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

            <div class="group">      
				<input type="text" name="username" value="<?= $username ?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?= $usernameErr ?></span>
				<label>Username</label>
			</div>
            
			<div class="group">      
				<input type="text" name="name" value="<?= $name ?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?= $nameErr ?></span>
				<label>Name</label>
			</div>

			<div class="group">      
				<input type="text" name="lastname" value="<?= $lastname ?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?= $lastnameErr ?></span>
				<label>Lastname</label>
			</div>

			<div class="group">      
				<input type="text" name="email" value="<?= $email ?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?= $emailErr ?></span>
				<label>Email</label>
			</div>

			<div class="group">      
				<input type="password" name="password" value="<?= $password ?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?= $passwordErr ?></span>
				<label>Password</label>
			</div>
            
            <div class="group">      
				<input type="password" name="repeat_password" value="" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Ripeti Password</label>
			</div>

            <div class="group">
                Gender:
                <input type="radio" name="gender" <?= (isset($gender) && $gender=="F") ? "checked" ?> value="F">Female
                <input type="radio" name="gender" <?= (isset($gender) && $gender=="M") ? "checked" ?> value="M">Male
                <input type="radio" name="gender" <?= (isset($gender) && $gender=="N.D.") ? "checked" ?> value="N.D.">Other  
                <span class="error">* <?= $genderErr ?></span>
            </div>

            <button>Registrati</button>

        </form>
        
        Ritorn alla <a href="<?= $local_path ?>" id="back">Home</a>
        
    </body>
</html>
