<?php
    session_start();
    include("utils/connessione_db.php"); // connessione al database
    
    $browser = get_browser(null, true);
    //print_r($browser);

    // define variables and set to empty values
    $nameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = "";
    $name = $lastname = $email = $gender = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	
    	$error = false;
    	
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
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            $error = true;
        } else {
            $gender = test_input($_POST["gender"]);
        }
        
        //se non si sono verificati errori procedo con la registrazione dei dati
        if(!$error) {
        
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
        <link rel="stylesheet" type="text/css" href="registration.css">
        
        <style>
            .error {color: #FF0000;}
        </style>
        
    </head>
    <body>
        <h2>Registrazione</h2>
        <p><span class="error">* required field</span></p>
        <form name="form_registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

			<div class="group">      
				<input type="text" name="name" value="<?php echo $name;?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?php echo $nameErr;?></span>
				<label>Name</label>
			</div>

			<div class="group">      
				<input type="text" name="lastname" value="<?php echo $lastname;?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?php echo $lastnameErr;?></span>
				<label>Lastname</label>
			</div>

			<div class="group">      
				<input type="text" name="email" value="<?php echo $email;?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?php echo $emailErr;?></span>
				<label>Email</label>
			</div>

			<div class="group">      
				<input type="password" name="password" value="<?php echo $password;?>" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<span class="error">* <?php echo $passwordErr;?></span>
				<label>Password</label>
			</div>

            <div class="group">
                Gender:
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
                <span class="error">* <?php echo $genderErr;?></span>
            </div>

            <button>Registrati</button>

        </form>
        
        <a href="../index.php" id="back">Ritorna al sito</a>
        
    <body>
</html>
