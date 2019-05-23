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
          case 'edit':
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

    protected function get_table() {
      return "SELECT id, description, departure, arrival, id_rocket, date
              FROM `travels`, rocket_travel as rt
              WHERE `id` = rt.id_travel and `id` = $this->id";
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

    public function _form() {
      ?>
            <div class="group">
                <input type="text" name="departure" value="<?= $this->vars['departure'] ?>" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['departureErr'] ?></span>
                <label>Departure</label>
            </div>

            <div class="group">
                <input type="text" name="arrival" value="<?= $this->vars['arrival'] ?>" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['arrivalErr'] ?></span>
                <label>Arrival</label>
            </div>

            <div class="group">
                <textarea rows="10" cols="80" name="description" required><?= $this->vars['description'] ?></textarea>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['descriptionErr'] ?></span>
                <label>Description</label>
            </div>

            <div class="group">
                <input type="date" name="date" value="<?= $this->vars['date'] ?>" required>
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
      if (empty($_POST["departure"])) {
          $this->vars['departureErr'] = "La partenza è necessaria";
          $error = true;
      } else {
          $this->vars['departure'] = test_input($_POST["departure"]);
          // guardo se contiene solo lettere o numeri
          if (!preg_match("/^[a-zA-Z]*$/", $this->vars['departure'])) {
              $this->vars['departureErr'] = "sono ammesse solo lettere";
              $error = true;
          }
      }

      // destinazione
      if (empty($_POST["arrival"])) {
          $this->vars['arrivalErr'] = "La destinazione è necessaria";
          $error = true;
      } else {
          $this->vars['arrival'] = test_input($_POST["arrival"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z]*$/", $this->vars['arrival'])) {
              $this->vars['arrivalErr'] = "Only letters are allowed";
              $error = true;
          }
      }

      // date di partenza
      if (empty($_POST["date"])) {
          $this->vars['dateErr'] = "La data di partenza è necessaria";
          $error = true;
      } else {
          $this->vars['date'] = test_input($_POST["date"]);
          // check if name only contains letters and whitespace
          if (validateDate($this->vars['date'])) {
              $this->vars['dateErr'] = "La data non è valida";
              $error = true;
          }
      }

      // descrizione
      if (empty($_POST["description"])) {
          $this->vars['descriptionErr'] = "La descrizione è necessaria";
          $error = true;
      } else {
          $this->vars['description'] = test_input($_POST["description"]);

          if(strlen($this->vars['description']) < 100) {
              $this->vars['descriptionErr'] = $this->vars['descriptionErr']."Must be a minimum of 100 characters";
              $error = true;
          }

          if(strlen($this->vars['description']) > 65000) {
              $this->vars['descriptionErr'] = $this->vars['descriptionErr']."Must be a maximum of 65000 characters";
              $error = true;
          }
      }

      return !$error;
    }
  }
?>
