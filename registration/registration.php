<?php
    session_start();
    include("utils/connessione_db.php"); // connessione al database

    // define variables and set to empty values
    $nameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = "";
    $name = $lastname = $email = $gender = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/",$name)) {
                $nameErr = "Only letters are allowed"; 
            }
        }
        
        if (empty($_POST["lastname"])) {
            $lastnameErr = "Lastname is required";
        } else {
            $lastname = test_input($_POST["lastname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
                $lastnameErr = "Only letters are allowed"; 
            }
        }
        
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
            
            // regole password
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            
            if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                $passwordErr = "The requirements:<br/>
                Must be a minimum of 8 characters<br/>
                Must contain at least 1 number<br/>
                Must contain at least one uppercase character<br/>
                Must contain at least one lowercase character"; 
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
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
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <style>
            .error {color: #FF0000;}
        </style>
        
    </head>
    <body>
        <h2>Registrazione</h2>
        <p><span class="error">* required field</span></p>
        <form name="form_registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <br/>
            <p>
                Name: <input type="text" name="name" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
            </p>
            <br/>
            <p>
                Lastname: <input type="text" name="name" value="<?php echo $lastname;?>">
                <span class="error">* <?php echo $lastnameErr;?></span>
            </p>
            <br/>
            <p>
                E-mail: <input type="text" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
            </p>
            <br/>
            <p>
                Password: <input type="password" name="password" value="<?php echo $password;?>">
                <span class="error">* <?php echo $passwordErr;?></span>
            </p>
            <br/>
            <p>
                Gender:
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
                <span class="error">* <?php echo $genderErr;?></span>
            </p>
            <br/>
            <button>Registrati</button>
        </form>
        <a href="../index.php" id="back">Ritorna al sito</a>
    <body>
</html>