<?php
  /* questo è il modello che gestisce le azioni di
     aggiunta, modifica ed eliminazione degli utenti

     è bastao sul modello standard per queste operazioni e tiene conto
     anche del caso della registrazione

     è necessario che il nome del campo password nel database si chiami in modo diverso da 'password' per non confonere il modello
   */
  include_once "model.php";

  class User extends Model {

    public function __construct($section, $action, $id=null) {
        parent::__construct($section, $action, $id);

        switch ($this->action) {
          case 'edit':
            $this->title = "Modifica dati utente";
            $this->msg_form_button = "Modifica";
            break;
          case 'add':
            $this->title = "Aggiungi utente";
            $this->msg_form_button = "Aggiungi";
            break;
          case 'reg':
            $this->title = "Benvenuto, qui puoi registrarti!";
            $this->msg_form_button = "Registrati";
            break;
          default:
            break;
        }

        $this->var_name = array('username',
                                'usernameErr',
                                'name',
                                'nameErr',
                                'lastname',
                                'lastnameErr',
                                'email',
                                'emailErr',
                                'gender',
                                'genderErr',
                                'pwhash',
                                'password',
                                'passwordErr',
                                'repeat_password',
                                'isAdmin');
        $this->loadvar();
    }

    protected function get_tupla() {
      return "SELECT * FROM users WHERE id = $this->id";
    }

    protected function add() {
      $passwd_hash = myhash($this->vars['password']);
      if(empty($this->vars['isAdmin']))  $admin = 0;
      else                               $admin = 1;
      return "INSERT INTO users (id, username, name, lastname, sex, email, pwhash, isAdmin)
              VALUES (NULL,'{$this->vars['username']}','{$this->vars['name']}',
                      '{$this->vars['lastname']}','{$this->vars['gender']}',
                      '{$this->vars['email']}','$passwd_hash',
                      '$admin')";
    }

    protected function edit() {
      $passwd_change_query = "";
      if(!empty($this->vars['password'])) {
        // la password è stata modificata
        $passwd_hash = myhash($this->vars['password']);
        $passwd_change_query = ", pwhash = '".$passwd_hash."' ";
      }
      if(empty($this->vars['isAdmin']))  $admin = 0;
      else                               $admin = 1;
      return "UPDATE users ".
              "SET username = '".$this->vars['username']."', ".
                  "name = '".$this->vars['name']."', ".
                  "lastname = '".$this->vars['lastname']."', ".
                  "sex = '".$this->vars['gender']."', ".
                  "email = '".$this->vars['email']."', ".
                  "isAdmin = ".$admin." ".$passwd_change_query.
                  "WHERE id = ".$this->id;

      // altrimenti la password è stata modificata
    }

    protected function delete() {
      return "DELETE FROM users WHERE id = $this->id";
    }

    protected function default() {
      // azione 'reg'
      $passwd_hash = myhash($this->vars['password']);
      /* la query crea un utente normale */
      return "INSERT INTO users (id,username,name,lastname,sex,email,pwhash,isAdmin)
              VALUES (NULL,'{$this->vars['username']}','{$this->vars['name']}',
                      '{$this->vars['lastname']}','{$this->vars['gender']}',
                      '{$this->vars['email']}','$passwd_hash',0)";
    }

    public function _form() {
      ?>
        <div class="group">
          <input type="text" name="username" value="<?= $this->vars['username'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $this->vars['usernameErr'] ?></span>
          <label>Username</label>
        </div>

        <div class="group">
          <input type="text" name="name" value="<?= $this->vars['name'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $this->vars['nameErr'] ?></span>
          <label>Name</label>
        </div>

        <div class="group">
          <input type="text" name="lastname" value="<?= $this->vars['lastname'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $this->vars['lastnameErr'] ?></span>
          <label>Lastname</label>
        </div>

        <div class="group">
          <input type="text" name="email" value="<?= $this->vars['email'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $this->vars['emailErr'] ?></span>
          <label>Email</label>
        </div>

        <?php if($this->action == 'edit') { $edit = 1; ?>
          <label> lascia il campo password vuoto se non vuoi modificarlo </label>
        <?php } ?>

        <div class="group">
          <input type="password" name="password" value="<?= $this->vars['password'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $this->vars['passwordErr'] ?></span>
          <label>Password</label>
        </div>

        <div class="group">
          <input type="password" name="repeat_password" value="" <?= (isset($edit)) ? "" : 'required'?>>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Ripeti Password</label>
        </div>

        <div class="group">

          <?php if(isset($this->vars['sex'])) { $this->vars['gender'] = $this->vars['sex']; } ?>

          Gender:
          <input type="radio" name="gender" <?= ($this->vars['gender']=="F") ? "checked" : "" ?> value="F">Female
          <input type="radio" name="gender" <?= ($this->vars['gender']=="M") ? "checked" : "" ?> value="M">Male
          <input type="radio" name="gender" <?= ($this->vars['gender']=="N.D.") ? "checked" : "" ?> value="N.D.">Other
          <span class="error">* <?= $this->vars['genderErr'] ?></span>
        </div>

        <?php if(isAdmin()) {
          ?>
            <div class="group">
              Admin privileges:
              <input type="checkbox" name="isAdmin" value="1" <?= ($this->vars['isAdmin']) ? "checked" : "" ?> >
            </div>
          <?php
        }?>

        <button class="blue-pill"><?= tr("$this->msg_form_button") ?></button>
      <?php
    }

    /*
     * funzione che si occupa di controllare se gli input,
     * del form per l'aggiunta e la modifica degli utenti da parte dell'admin,
     * siano corretti
     */
    public function controls() {
      $error = false;

      if($this->modified('username')) {
        if (empty($this->vars['username'])) {
            $this->vars['usernameErr'] = "Username is required";
            $error = true;
        } else {
            // guardo se contiene solo lettere o numeri
            if (!preg_match("/^[a-zA-Z0-9]*$/",$this->vars['username'])) {
                $this->vars['usernameErr'] = "sono ammessi solo lettere e numeri";
                $error = true;
            }

            if(check_username($this->vars['username'])) {
                $this->vars['usernameErr'] = "username gia utilizzata";
                $error = true;
            }
        }
      }

      if($this->modified('name')) {
        if (empty($this->vars['name'])) {
            $this->vars['nameErr'] = "Name is required";
            $error = true;
        } else {
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/", $this->vars['name'])) {
                $this->vars['nameErr'] = "Only letters are allowed";
                $error = true;
            }
        }
      }

      if($this->modified('lastname')) {
        if (empty($this->vars['lastname'])) {
            $this->vars['lastnameErr'] = "Lastname is required";
            $error = true;
        } else {
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/", $this->vars['lastname'])) {
                $this->vars['lastnameErr'] = "Only letters are allowed";
                $error = true;
            }
        }
      }

      //  controllando l'hash della password con la passord in chiaro
      //  c'è la remota possibilita che queste siano identiche
      //  risultando non modificata
      //  ma si risolve ponendo una lunghezza massima della password inferiore a quella dell'hash
      if($this->modified('pwhash', 'password')) {
        if (empty($this->vars['password'])) {
            $this->vars['passwordErr'] = "password is required";
            $error = true;
        } else {
            // regole password
            $uppercase = preg_match('@[A-Z]@', $this->vars['password']);
            $lowercase = preg_match('@[a-z]@', $this->vars['password']);
            $number    = preg_match('@[0-9]@', $this->vars['password']);

            if(!$uppercase) {
                $this->vars['passwordErr'] = "Must contain at least one uppercase character<br/>";
                $error = true;
            }

            if(!$lowercase) {
                $this->vars['passwordErr'] = $this->vars['passwordErr']."Must contain at least one lowercase character<br/>";
                $error = true;
            }

            if(!$number) {
                $this->vars['passwordErr'] = $this->vars['passwordErr']."Must contain at least 1 number<br/>";
                $error = true;
            }

            if(strlen($this->vars['password']) < 8 || strlen($this->vars['password']) > 20) {
                $this->vars['passwordErr'] = $this->vars['passwordErr']."Must be a minimum of 8 characters";
                $error = true;
            }
        }

        if (empty($this->vars['repeat_password'])) {
            $this->vars['passwordErr'] = "reinserisci la password";
            $error = true;
        } else {
            if($this->vars['password'] != $this->vars['repeat_password']) {
                $this->vars['passwordErr'] = "le passsword non corrispondono";
                $error = true;
            }
        }
      }

      if($this->modified('email')) {
        if (empty($this->vars['email'])) {
            $this->vars['emailErr'] = "Email is required";
            $error = true;
        } else {
            // check if e-mail address is well-formed
            if (!filter_var($this->vars['email'], FILTER_VALIDATE_EMAIL)) {
                $this->vars['emailErr'] = "Invalid email format";
                $error = true;
            }

            if(check_email($this->vars['email'])) {
                $this->vars['emailErr'] = "email gia utilizzata";
                $error = true;
            }
        }
      }


      // caso in cui il nome dei campi non coincida
      if($this->modified('sex','gender')) {
        if (empty($this->vars['gender'])) {
            $this->vars['genderErr'] = "Gender is required";
            $error = true;
        }
      }


      return !$error;
    }
  }
?>
