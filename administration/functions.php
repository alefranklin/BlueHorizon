<?php
    session_start();

/****************************************************** variabili **************************************************************/
    function pushVar($section) {
        
        switch ($section) {
            $vars = array();
            case "add-user":
                $vars = array('username', 'usernameErr', 'name', 'nameErr', 'lastname', 'lastnameErr',
                              'email', 'emailErr', 'gender', 'genderErr', 'password', 'passwordErr', 'repeat_password');
                break;

            case "add-travel":
                $vars = array('departure', 'departureErr', 'arrival', 'arrivalErr', 'date', 'dateErr', 'description', 'descriptionErr');
                break;

            case "add-rocket":

                break;
        }
        
        foreach($vars as $v) {
            $_SESSION['var'][$section][$v] = ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST[$v])) ? $_POST[$v] : "";
        }
    }

    function destroyVar($section) {
        $_SESSION['var'][$section] = array();
        unset($_SESSION['var'][$section]);
    }

/****************************************************** controlli **************************************************************/
    function Controls($section) {
        $error = false;
    	
        switch ($section) {

            /*******************************CONTROLLI USER ********************************************/
            case "add-user":
                if (empty($_POST["username"])) {
                    $_SESSION[$section]['usernameErr'] = "Username is required";
                    $error = true;
                } else {
                    $_SESSION[$section]['username'] = test_input($_POST["username"]);
                    // guardo se contiene solo lettere o numeri
                    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
                        $_SESSION[$section]['usernameErr'] = "sono ammessi solo lettere e numeri";
                        $error = true;
                    }

                    if(check_username($_SESSION[$section]['username'])) {
                        $_SESSION[$section]['usernameErr'] = "username gia utilizzata";
                        $error = true;
                    }
                }

                if (empty($_POST["name"])) {
                    $_SESSION[$section]['nameErr'] = "Name is required";
                    $error = true;
                } else {
                    $_SESSION[$section]['name'] = test_input($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/", $_SESSION[$section]['name'])) {
                        $_SESSION[$section]['nameErr'] = "Only letters are allowed";
                        $error = true;
                    }
                }

                if (empty($_POST["lastname"])) {
                    $_SESSION[$section]['lastnameErr'] = "Lastname is required";
                    $error = true;
                } else {
                    $_SESSION[$section]['lastname'] = test_input($_POST["lastname"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/", $_SESSION[$section]['lastname'])) {
                        $_SESSION[$section]['lastnameErr'] = "Only letters are allowed"; 
                        $error = true;
                    }
                }

                if (empty($_POST["password"])) {
                    $_SESSION[$section]['passwordErr'] = "password is required";
                    $error = true;
                } else {
                    $_SESSION[$section]['password'] = test_input($_POST["password"]);

                    // regole password
                    $uppercase = preg_match('@[A-Z]@', $_SESSION[$section]['password']);
                    $lowercase = preg_match('@[a-z]@', $_SESSION[$section]['password']);
                    $number    = preg_match('@[0-9]@', $_SESSION[$section]['password']);

                    if(!$uppercase) {
                        $_SESSION[$section]['passwordErr'] = "Must contain at least one uppercase character<br/>";
                        $error = true;
                    }

                    if(!$lowercase) {
                        $_SESSION[$section]['passwordErr'] = $_SESSION[$section]['passwordErr']."Must contain at least one lowercase character<br/>";
                        $error = true;
                    }

                    if(!$number) {
                        $_SESSION[$section]['passwordErr'] = $_SESSION[$section]['passwordErr']."Must contain at least 1 number<br/>";
                        $error = true;
                    }

                    if(strlen($password) < 8) {
                        $_SESSION[$section]['passwordErr'] = $_SESSION[$section]['passwordErr']."Must be a minimum of 8 characters";
                        $error = true;
                    }
                }

                if (empty($_POST["repeat_password"])) {
                    $_SESSION[$section]['passwordErr'] = "reinserisci la password";
                    $error = true;
                } else {
                    $_SESSION[$section]['repeat_password'] = test_input($_POST["repeat_password"]);

                    if($_SESSION[$section]['password'] != $_SESSION[$section]['repeat_password']) {
                        $_SESSION[$section]['passwordErr'] = "le passsword non corrispondono";
                        $error = true;
                    }
                }

                if (empty($_POST["email"])) {
                    $_SESSION[$section]['emailErr'] = "Email is required";
                    $error = true;
                } else {
                    $_SESSION[$section]['email'] = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($_SESSION[$section]['email'], FILTER_VALIDATE_EMAIL)) {
                        $_SESSION[$section]['emailErr'] = "Invalid email format";
                        $error = true;
                    }

                    if(check_email($_SESSION[$section]['email'])) {
                        $_SESSION[$section]['emailErr'] = "email gia utilizzata";
                        $error = true;
                    }
                }

                if (empty($_POST["gender"])) {
                    $_SESSION[$section]['genderErr'] = "Gender is required";
                    $error = true;
                } else {
                    $_SESSION[$section]['gender'] = test_input($_POST["gender"]);
                }
                break;

            /*******************************CONTROLLI TRAVEL ********************************************/
            case "add-travel":
                // partenza
                if (empty($_POST["departure"])) {
                    $_SESSION[$section]['departureErr'] = "La partenza è necessaria";
                    $error = true;
                } else {
                    $_SESSION[$section]['departure'] = test_input($_POST["departure"]);
                    // guardo se contiene solo lettere o numeri
                    if (!preg_match("/^[a-zA-Z]*$/", $_SESSION[$section]['departure'])) {
                        $_SESSION[$section]['departureErr'] = "sono ammesse solo lettere";
                        $error = true;
                    }
                }

                // destinazione
                if (empty($_POST["arrival"])) {
                    $_SESSION[$section]['arrivalErr'] = "La destinazione è necessaria";
                    $error = true;
                } else {
                    $_SESSION[$section]['arrival'] = test_input($_POST["arrival"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/", $_SESSION[$section]['arrival'])) {
                        $_SESSION[$section]['arrivalErr'] = "Only letters are allowed";
                        $error = true;
                    }
                }

                // date di partenza
                if (empty($_POST["date"])) {
                    $_SESSION[$section]['dateErr'] = "La data di partenza è necessaria";
                    $error = true;
                } else {
                    $_SESSION[$section]['date'] = test_input($_POST["date"]);
                    // check if name only contains letters and whitespace
                    if (validateDate($_SESSION[$section]['date'])) {
                        $_SESSION[$section]['dateErr'] = "La data non è valida"; 
                        $error = true;
                    }
                }

                // descrizione
                if (empty($_POST["description"])) {
                    $_SESSION[$section]['descriptionErr'] = "La descrizione è necessaria";
                    $error = true;
                } else {
                    $_SESSION[$section]['description'] = test_input($_POST["description"]);

                    if(strlen($_SESSION[$section]['description']) < 100) {
                        $_SESSION[$section]['descriptionErr'] = $_SESSION[$section]['descriptionErr']."Must be a minimum of 100 characters";
                        $error = true;
                    }

                    if(strlen($_SESSION[$section]['description']) > 65000) {
                        $_SESSION[$section]['descriptionErr'] = $_SESSION[$section]['descriptionErr']."Must be a maximum of 65000 characters";
                        $error = true;
                    }
                }
                break;

            /*******************************CONTROLLI ROCKETS ********************************************/
            case "add-rockets":
                break;
        }
        
        return !$error;
    }

/*
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
*/

/****************************************************** form *****************************************************************/

    function form($section) {
        
        switch ($section) {

            case "add-user":
?>
                
<?php           
                break;

            case "add-travel":
?>                
                <h2>aggiungi viaggio</h2>
                <p><span class="error">* required field</span></p>
                <form name="form_manage_travels" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]."?section=$section") ?>">

                    <div class="group">      
                        <input type="text" name="departure" value="<?= $_SESSION[$section]['departure'] ?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <span class="error">* <?= $_SESSION[$section]['departureErr'] ?></span>
                        <label>Departure</label>
                    </div>

                    <div class="group">      
                        <input type="text" name="arrival" value="<?= $_SESSION[$section]['arrival'] ?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <span class="error">* <?= $_SESSION[$section]['arrivalErr'] ?></span>
                        <label>Arrival</label>
                    </div>

                    <div class="group">      
                        <textarea rows="10" cols="80" name="description" required><?= $_SESSION[$section]['description'] ?></textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <span class="error">* <?= $_SESSION[$section]['descriptionErr'] ?></span>
                        <label>Description</label>
                    </div>

                    <div class="group">      
                        <input type="date" name="date" value="<?= $_SESSION[$section]['date'] ?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <span class="error">* <?= $_SESSION[$section]['dateErr'] ?></span>
                        <label>Date</label>
                    </div>

                    <button>Aggiungi</button>

                </form>
<?php
                break;

            case "add-rocket":
?>
                
<?php
                break;
        }
    }

?>