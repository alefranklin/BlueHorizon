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

    $section = $_SESSION['var'][$section];

    if (empty($_POST["username"])) {
        $section['usernameErr'] = "Username is required";
        $error = true;
    } else {
        $section['username'] = test_input($_POST["username"]);
        // guardo se contiene solo lettere o numeri
        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            $section['usernameErr'] = "sono ammessi solo lettere e numeri";
            $error = true;
        }

        if(check_username($section['username'])) {
            $section['usernameErr'] = "username gia utilizzata";
            $error = true;
        }
    }

    if (empty($_POST["name"])) {
        $section['nameErr'] = "Name is required";
        $error = true;
    } else {
        $section['name'] = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $section['name'])) {
            $section['nameErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    if (empty($_POST["lastname"])) {
        $section['lastnameErr'] = "Lastname is required";
        $error = true;
    } else {
        $section['lastname'] = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $section['lastname'])) {
            $section['lastnameErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    if (empty($_POST["password"])) {
        $section['passwordErr'] = "password is required";
        $error = true;
    } else {
        $section['password'] = test_input($_POST["password"]);

        // regole password
        $uppercase = preg_match('@[A-Z]@', $section['password']);
        $lowercase = preg_match('@[a-z]@', $section['password']);
        $number    = preg_match('@[0-9]@', $section['password']);

        if(!$uppercase) {
            $section['passwordErr'] = "Must contain at least one uppercase character<br/>";
            $error = true;
        }

        if(!$lowercase) {
            $section['passwordErr'] = $section['passwordErr']."Must contain at least one lowercase character<br/>";
            $error = true;
        }

        if(!$number) {
            $section['passwordErr'] = $section['passwordErr']."Must contain at least 1 number<br/>";
            $error = true;
        }

        if(strlen($password) < 8) {
            $section['passwordErr'] = $section['passwordErr']."Must be a minimum of 8 characters";
            $error = true;
        }
    }

    if (empty($_POST["repeat_password"])) {
        $section['passwordErr'] = "reinserisci la password";
        $error = true;
    } else {
        $section['repeat_password'] = test_input($_POST["repeat_password"]);

        if($section['password'] != $section['repeat_password']) {
            $section['passwordErr'] = "le passsword non corrispondono";
            $error = true;
        }
    }

    if (empty($_POST["email"])) {
        $section['emailErr'] = "Email is required";
        $error = true;
    } else {
        $section['email'] = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($section['email'], FILTER_VALIDATE_EMAIL)) {
            $section['emailErr'] = "Invalid email format";
            $error = true;
        }

        if(check_email($section['email'])) {
            $section['emailErr'] = "email gia utilizzata";
            $error = true;
        }
    }

    if (empty($_POST["gender"])) {
        $section['genderErr'] = "Gender is required";
        $error = true;
    } else {
        $section['gender'] = test_input($_POST["gender"]);
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
        $section['departureErr'] = "La partenza è necessaria";
        $error = true;
    } else {
        $section['departure'] = test_input($_POST["departure"]);
        // guardo se contiene solo lettere o numeri
        if (!preg_match("/^[a-zA-Z]*$/", $section['departure'])) {
            $section['departureErr'] = "sono ammesse solo lettere";
            $error = true;
        }
    }

    // destinazione
    if (empty($_POST["arrival"])) {
        $section['arrivalErr'] = "La destinazione è necessaria";
        $error = true;
    } else {
        $section['arrival'] = test_input($_POST["arrival"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $section['arrival'])) {
            $section['arrivalErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    // date di partenza
    if (empty($_POST["date"])) {
        $section['dateErr'] = "La data di partenza è necessaria";
        $error = true;
    } else {
        $section['date'] = test_input($_POST["date"]);
        // check if name only contains letters and whitespace
        if (validateDate($section['date'])) {
            $section['dateErr'] = "La data non è valida";
            $error = true;
        }
    }

    // descrizione
    if (empty($_POST["description"])) {
        $section['descriptionErr'] = "La descrizione è necessaria";
        $error = true;
    } else {
        $section['description'] = test_input($_POST["description"]);

        if(strlen($section['description']) < 100) {
            $section['descriptionErr'] = $section['descriptionErr']."Must be a minimum of 100 characters";
            $error = true;
        }

        if(strlen($section['description']) > 65000) {
            $section['descriptionErr'] = $section['descriptionErr']."Must be a maximum of 65000 characters";
            $error = true;
        }
    }
  }
?>
