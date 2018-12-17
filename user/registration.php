<?php
   session_start();
   include_once("../utils/utility.php"); // includo il file di connessione al database

   $browser = get_browser(null, true);
   //print_r($browser);

   // definisco le variabili e le inizializzo vuote
   $usernameErr = $nameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = $passwordRepeatErr = "";
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
           $passwordRepeatErr = "reinserisci la password";
           $error = true;
       } else {
           $repeat_password = test_input($_POST["repeat_password"]);

           if($password != $repeat_password) {
               $passwordRepeatErr = "le passsword non corrispondono";
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
           echo $gender;
       }

       //se non si sono verificati errori procedo con la registrazione dei dati
       if(!$error) {

           // scrivo sul DB
           $passwd_hash = myhash($_POST["password"]);
           $query = "INSERT INTO users (username, name,lastname,sex,email,password)
           VALUES ('$username','$name','$lastname','$gender','$email','$passwd_hash')";
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
   include($local_path."html/head.php");?>
<!-- body -->
<div id="header">
   <?php include($local_path."html/navbar.php"); ?>
</div>
<div id="body-page">
  <h2 class="space-font">REGISTRAZIONE</h2>
  <div id="registration-div">
    <p><span id="required-fields">* required fields</span></p>
    <div id="form-div">
      <form name="form_registration" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
         <div class="text-group">
            <input type="text" class="input-text" name="username" value="<?= $username ?>" required placeholder="Username">
            <span class="highlight">*</span>
            <span class="bar"/>
            <span class="error"><?= $usernameErr ?></span>
            <label class="hide">Username</label>
         </div>
         <div class="text-group">
            <input type="text" class="input-text" name="name" value="<?= $name ?>" required placeholder="Name">
            <span class="highlight">*</span>
            <span class="bar"/>
            <span class="error"> <?= $nameErr ?></span>
            <label class="hide">Name</label>
         </div>
         <div class="text-group">
            <input type="text" class="input-text" name="lastname" value="<?= $lastname ?>" required placeholder="Last Name">
            <span class="highlight">*</span>
            <span class="bar"/>
            <span class="error"> <?= $lastnameErr ?></span>
            <label class="hide">Lastname</label>
         </div>
         <div class="text-group">
            <input type="text" class="input-text" name="email" value="<?= $email ?>" required placeholder="Email">
            <span class="highlight">*</span>
            <span class="bar"/>
            <span class="error"> <?= $emailErr ?></span>
            <label class="hide">Email</label>
         </div>
         <div class="text-group">
            <input type="password" class="input-text" name="password" value="<?= $password ?>" required placeholder="Password">
            <span class="highlight">*</span>
            <span class="bar"/>
            <span class="error"> <?= $passwordErr ?></span>
            <label class="hide">Password</label>
         </div>
         <div class="text-group">
            <input type="password" id="repeat_password" class="input-text" name="repeat_password" value="" required placeholder="Conferma Password">
            <span class="highlight">*</span>
            <span class="bar"/>
            <span class="error"> <?= $passwordRepeatErr ?></span>
            <label for="repeat_password" class="hide">Ripeti Password</label>
         </div>
         <div class="text-group">
           <label for="gender-select" class="hide"> Gender </label>
            <select id="gender-select" name="gender" required>
                <option class="select-placeholder" value="" disabled selected hidden>Gender</option>
                <option value="M" <?= (isset($gender) && $gender=="M") ? 'selected' : "" ?>>Male</option>
                <option value="F" <?= (isset($gender) && $gender=="F") ? 'selected' : "" ?>>Female</option>
                <option value="N.D." <?= (isset($gender) && $gender=="N.D.") ? 'selected' : "" ?>>Other</option>
            </select>
         </div>
         <input type="submit" name="registration" value="Register" class="input-submit"></input>
      </form>
    </div>
  </div>
</div>


</body>
