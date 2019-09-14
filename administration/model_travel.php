<?php
  include_once "model.php";

  class Travel extends Model {

    public function __construct($section, $action, $id=null) {
        parent::__construct($section, $action, $id);

        switch ($this->action) {
          case 'edit':
            $this->title = "Modifica il Viaggio";
            $this->msg_form_button = "Modifica";
            break;
          case 'add':
            $this->title = "Aggiungi un Viaggio";
            $this->msg_form_button = "Aggiungi";
            break;
          default:
            break;
        }

        $this->var_name = array('departure',
                                'departureErr',
                                'arrival',
                                'arrivalErr',
                                'date',
                                'dateErr',
                                'description',
                                'descriptionErr',
                                'rocket',
                                'rocketErr');
        $this->loadvar();

    }

    protected function get_tupla() {
      return "SELECT id, id_planet, id_rocket, departure_date, duration
              FROM `travels`
              WHERE `id` = $this->id";
    }

    protected function add() {
      return ""; /*"INSERT INTO travels (description, departure, arrival)
                    VALUES ($travel_desc, $departure_planet, $arrival_planet)"; */
    }

    protected function edit() {
      return ""; /*UPDATE travels
                   SET description = $travel_desc, departure = $departure_planet, arrival = $arrival_planet
                   WHERE id = $this->id"*/
    }

    protected function delete() {
      return "DELETE FROM travels WHERE id = $this->id";
    }

    protected function default() {}

    public function _form() {
      ?>
            <div class="group">
                <input type="text" name="departure" value="<?= $this->vars['departure'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['departureErr'] ?></span>
                <label>Departure</label>
            </div>

            <div class="group">
                <input type="text" name="arrival" value="<?= $this->vars['arrival'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['arrivalErr'] ?></span>
                <label>Arrival</label>
            </div>

            <div class="group">
                <textarea rows="10" cols="80" name="description" <?= (isset($edit)) ? "" : 'required'?>><?= $this->vars['description'] ?></textarea>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['descriptionErr'] ?></span>
                <label>Description</label>
            </div>

            <div class="group">
                <input type="date" name="date" value="<?= $this->vars['date'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['dateErr'] ?></span>
                <label>Date</label>
            </div>

            <button class="blue-pill"><?= $this->msg_form_button ?></button>
      <?php
    }

    /***
     * funzione che si occupa di controllare se gli input,
     * del form per l'aggiunta e la modifica dei viaggi,
     * siano corretti
     */
    public function controls() {
      $error = false;

      // partenza
      if($this->modified('departure')) {
        if (empty($this->vars['departure'])) {
            $this->vars['departureErr'] = "La partenza è necessaria";
            $error = true;
        } else {
            // guardo se contiene solo lettere
            if (!preg_match("/^[a-zA-Z]*$/", $this->vars['departure'])) {
                $this->vars['departureErr'] = "sono ammesse solo lettere";
                $error = true;
            }
        }
      }


      // destinazione
      if($this->modified('Arrival')) {
        if (empty($this->vars['arrival'])) {
            $this->vars['arrivalErr'] = "La destinazione è necessaria";
            $error = true;
        } else {
            // controlla se contiene lettere
            if (!preg_match("/^[a-zA-Z]*$/", $this->vars['arrival'])) {
                $this->vars['arrivalErr'] = "Only letters are allowed";
                $error = true;
            }
        }
      }


      // date di partenza
      if($this->modified('date')) {
        if (empty($this->vars['date'])) {
            $this->vars['dateErr'] = "La data di partenza è necessaria";
            $error = true;
        } else {
            if (validateDate($this->vars['date'])) {
                $this->vars['dateErr'] = "La data non è valida";
                $error = true;
            }
        }
      }


      // descrizione
      if($this->modified('description')) {
        if (empty($this->vars['description'])) {
            $this->vars['descriptionErr'] = "La descrizione è necessaria";
            $error = true;
        } else {
            if(strlen($this->vars['description']) < 100) {
                $this->vars['descriptionErr'] = $this->vars['descriptionErr']."Must be a minimum of 100 characters";
                $error = true;
            }

            if(strlen($this->vars['description']) > 65000) {
                $this->vars['descriptionErr'] = $this->vars['descriptionErr']."Must be a maximum of 65000 characters";
                $error = true;
            }
        }
      }

      return !$error;
    }
  }
?>