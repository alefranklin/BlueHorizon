<?php
  function Controls($section, &$vars) {
      $error = false;

      switch ($section) {

          case "add-user":
          case "edit-user":
              adminUserControls($vars, $errore);
              break;

          case "add-travel":
          case "edit-travel":
              travelControls($vars, $error);
              break;

          case "add-rockets":
          case "edit-rockets":
              break;
      }

      return $error;
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
  function adminUserControls(&$vars, &$error) {

    if (empty($_POST["username"])) {
        $vars['usernameErr'] = "Username is required";
        $error = true;
    } else {
        $vars['username'] = test_input($_POST["username"]);
        // guardo se contiene solo lettere o numeri
        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            $vars['usernameErr'] = "sono ammessi solo lettere e numeri";
            $error = true;
        }

        if(check_username($vars['username'])) {
            $vars['usernameErr'] = "username gia utilizzata";
            $error = true;
        }
    }

    if (empty($_POST["name"])) {
        $vars['nameErr'] = "Name is required";
        $error = true;
    } else {
        $vars['name'] = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $vars['name'])) {
            $vars['nameErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    if (empty($_POST["lastname"])) {
        $vars['lastnameErr'] = "Lastname is required";
        $error = true;
    } else {
        $vars['lastname'] = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $vars['lastname'])) {
            $vars['lastnameErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    if (empty($_POST["password"])) {
        $vars['passwordErr'] = "password is required";
        $error = true;
    } else {
        $vars['password'] = test_input($_POST["password"]);

        // regole password
        $uppercase = preg_match('@[A-Z]@', $vars['password']);
        $lowercase = preg_match('@[a-z]@', $vars['password']);
        $number    = preg_match('@[0-9]@', $vars['password']);

        if(!$uppercase) {
            $vars['passwordErr'] = "Must contain at least one uppercase character<br/>";
            $error = true;
        }

        if(!$lowercase) {
            $vars['passwordErr'] = $vars['passwordErr']."Must contain at least one lowercase character<br/>";
            $error = true;
        }

        if(!$number) {
            $vars['passwordErr'] = $vars['passwordErr']."Must contain at least 1 number<br/>";
            $error = true;
        }

        if(strlen($password) < 8) {
            $vars['passwordErr'] = $vars['passwordErr']."Must be a minimum of 8 characters";
            $error = true;
        }
    }

    if (empty($_POST["repeat_password"])) {
        $vars['passwordErr'] = "reinserisci la password";
        $error = true;
    } else {
        $vars['repeat_password'] = test_input($_POST["repeat_password"]);

        if($vars['password'] != $vars['repeat_password']) {
            $vars['passwordErr'] = "le passsword non corrispondono";
            $error = true;
        }
    }

    if (empty($_POST["email"])) {
        $vars['emailErr'] = "Email is required";
        $error = true;
    } else {
        $vars['email'] = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($vars['email'], FILTER_VALIDATE_EMAIL)) {
            $vars['emailErr'] = "Invalid email format";
            $error = true;
        }

        if(check_email($vars['email'])) {
            $vars['emailErr'] = "email gia utilizzata";
            $error = true;
        }
    }

    if (empty($_POST["gender"])) {
        $vars['genderErr'] = "Gender is required";
        $error = true;
    } else {
        $vars['gender'] = test_input($_POST["gender"]);
    }

  }

  /***
   * funzione che si occupa di controllare se gli input,
   * del form per l'aggiunta e la modifica dei viaggi,
   * siano corretti
   */
  function travelControls(&$vars, &$error) {
    // partenza
    if (empty($_POST["departure"])) {
        $vars['departureErr'] = "La partenza è necessaria";
        $error = true;
    } else {
        $vars['departure'] = test_input($_POST["departure"]);
        // guardo se contiene solo lettere o numeri
        if (!preg_match("/^[a-zA-Z]*$/", $vars['departure'])) {
            $vars['departureErr'] = "sono ammesse solo lettere";
            $error = true;
        }
    }

    // destinazione
    if (empty($_POST["arrival"])) {
        $vars['arrivalErr'] = "La destinazione è necessaria";
        $error = true;
    } else {
        $vars['arrival'] = test_input($_POST["arrival"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $vars['arrival'])) {
            $vars['arrivalErr'] = "Only letters are allowed";
            $error = true;
        }
    }

    // date di partenza
    if (empty($_POST["date"])) {
        $vars['dateErr'] = "La data di partenza è necessaria";
        $error = true;
    } else {
        $vars['date'] = test_input($_POST["date"]);
        // check if name only contains letters and whitespace
        if (validateDate($vars['date'])) {
            $vars['dateErr'] = "La data non è valida";
            $error = true;
        }
    }

    // descrizione
    if (empty($_POST["description"])) {
        $vars['descriptionErr'] = "La descrizione è necessaria";
        $error = true;
    } else {
        $vars['description'] = test_input($_POST["description"]);

        if(strlen($vars['description']) < 100) {
            $vars['descriptionErr'] = $vars['descriptionErr']."Must be a minimum of 100 characters";
            $error = true;
        }

        if(strlen($vars['description']) > 65000) {
            $vars['descriptionErr'] = $vars['descriptionErr']."Must be a maximum of 65000 characters";
            $error = true;
        }
    }
  }
?>
