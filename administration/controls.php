<?php
  function Controls($section) {
      $error = false;

      switch ($section) {

          case "add-user":
              adminUserControls($section, $errore);
              break;

          case "add-travel":
              travelControls($section, $error);
              break;

          case "add-rockets":
              break;
      }

      return !$error;
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

/****************************************************** controlli **************************************************************/

  /***
   * funzione che si occupa di controllare se gli input,
   * del form per l'aggiunta e la modifica degli utenti da parte dell'admin,
   * siano corretti
   */
  function adminUserControls($section, &$error) {

    if (empty($_POST["username"])) {
        $_SESSION['var'][$section]['usernameErr'] = "Username is required";
        $error = true;
    } else {
        $_SESSION['var'][$section]['username'] = test_input($_POST["username"]);
        // guardo se contiene solo lettere o numeri
        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            $_SESSION['var'][$section]['usernameErr'] = "sono ammessi solo lettere e numeri";
            $error = true;
        }

        if(check_username($_SESSION['var'][$section]['username'])) {
            $_SESSION['var'][$section]['usernameErr'] = "username gia utilizzata";
            $error = true;
        }
    }

    if (empty($_POST["name"])) {
        $_SESSION['var'][$section]['nameErr'] = "Name is required";
        $error = true;
    } else {
        $_SESSION['var'][$section]['name'] = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $_SESSION['var'][$section]['name'])) {
            $_SESSION['var'][$section]['nameErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    if (empty($_POST["lastname"])) {
        $_SESSION['var'][$section]['lastnameErr'] = "Lastname is required";
        $error = true;
    } else {
        $_SESSION['var'][$section]['lastname'] = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $_SESSION['var'][$section]['lastname'])) {
            $_SESSION['var'][$section]['lastnameErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    if (empty($_POST["password"])) {
        $_SESSION['var'][$section]['passwordErr'] = "password is required";
        $error = true;
    } else {
        $_SESSION['var'][$section]['password'] = test_input($_POST["password"]);

        // regole password
        $uppercase = preg_match('@[A-Z]@', $_SESSION['var'][$section]['password']);
        $lowercase = preg_match('@[a-z]@', $_SESSION['var'][$section]['password']);
        $number    = preg_match('@[0-9]@', $_SESSION['var'][$section]['password']);

        if(!$uppercase) {
            $_SESSION['var'][$section]['passwordErr'] = "Must contain at least one uppercase character<br/>";
            $error = true;
        }

        if(!$lowercase) {
            $_SESSION['var'][$section]['passwordErr'] = $_SESSION['var'][$section]['passwordErr']."Must contain at least one lowercase character<br/>";
            $error = true;
        }

        if(!$number) {
            $_SESSION['var'][$section]['passwordErr'] = $_SESSION['var'][$section]['passwordErr']."Must contain at least 1 number<br/>";
            $error = true;
        }

        if(strlen($password) < 8) {
            $_SESSION['var'][$section]['passwordErr'] = $_SESSION['var'][$section]['passwordErr']."Must be a minimum of 8 characters";
            $error = true;
        }
    }

    if (empty($_POST["repeat_password"])) {
        $_SESSION['var'][$section]['passwordErr'] = "reinserisci la password";
        $error = true;
    } else {
        $_SESSION['var'][$section]['repeat_password'] = test_input($_POST["repeat_password"]);

        if($_SESSION['var'][$section]['password'] != $_SESSION['var'][$section]['repeat_password']) {
            $_SESSION['var'][$section]['passwordErr'] = "le passsword non corrispondono";
            $error = true;
        }
    }

    if (empty($_POST["email"])) {
        $_SESSION['var'][$section]['emailErr'] = "Email is required";
        $error = true;
    } else {
        $_SESSION['var'][$section]['email'] = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($_SESSION['var'][$section]['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['var'][$section]['emailErr'] = "Invalid email format";
            $error = true;
        }

        if(check_email($_SESSION['var'][$section]['email'])) {
            $_SESSION['var'][$section]['emailErr'] = "email gia utilizzata";
            $error = true;
        }
    }

    if (empty($_POST["gender"])) {
        $_SESSION['var'][$section]['genderErr'] = "Gender is required";
        $error = true;
    } else {
        $_SESSION['var'][$section]['gender'] = test_input($_POST["gender"]);
    }

  }

  /***
   * funzione che si occupa di controllare se gli input,
   * del form per l'aggiunta e la modifica dei viaggi,
   * siano corretti
   */
  function travelControls($section, &$error) {
    // partenza
    if (empty($_POST["departure"])) {
        $_SESSION['var'][$section]['departureErr'] = "La partenza è necessaria";
        $error = true;
    } else {
        $_SESSION['var'][$section]['departure'] = test_input($_POST["departure"]);
        // guardo se contiene solo lettere o numeri
        if (!preg_match("/^[a-zA-Z]*$/", $_SESSION['var'][$section]['departure'])) {
            $_SESSION['var'][$section]['departureErr'] = "sono ammesse solo lettere";
            $error = true;
        }
    }

    // destinazione
    if (empty($_POST["arrival"])) {
        $_SESSION['var'][$section]['arrivalErr'] = "La destinazione è necessaria";
        $error = true;
    } else {
        $_SESSION['var'][$section]['arrival'] = test_input($_POST["arrival"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $_SESSION['var'][$section]['arrival'])) {
            $_SESSION['var'][$section]['arrivalErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    // date di partenza
    if (empty($_POST["date"])) {
        $_SESSION['var'][$section]['dateErr'] = "La data di partenza è necessaria";
        $error = true;
    } else {
        $_SESSION['var'][$section]['date'] = test_input($_POST["date"]);
        // check if name only contains letters and whitespace
        if (validateDate($_SESSION['var'][$section]['date'])) {
            $_SESSION['var'][$section]['dateErr'] = "La data non è valida";
            $error = true;
        }
    }

    // descrizione
    if (empty($_POST["description"])) {
        $_SESSION['var'][$section]['descriptionErr'] = "La descrizione è necessaria";
        $error = true;
    } else {
        $_SESSION['var'][$section]['description'] = test_input($_POST["description"]);

        if(strlen($_SESSION['var'][$section]['description']) < 100) {
            $_SESSION['var'][$section]['descriptionErr'] = $_SESSION['var'][$section]['descriptionErr']."Must be a minimum of 100 characters";
            $error = true;
        }

        if(strlen($_SESSION['var'][$section]['description']) > 65000) {
            $_SESSION['var'][$section]['descriptionErr'] = $_SESSION['var'][$section]['descriptionErr']."Must be a maximum of 65000 characters";
            $error = true;
        }
    }
  }
?>
