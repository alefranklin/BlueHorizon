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
          case 'delete':
            $this->title = "Elimina il Viaggio";
            $this->msg_form_button = "Elimina";
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
      return "UPDATE travels
              SET id_planet = {$planet['id']}, departure_date = {$this->vars['departure_date']}
              WHERE id = $this->id";
              /*UPDATE travels
                   SET description = $travel_desc, departure = $departure_planet, arrival = $arrival_planet
                   WHERE id = $this->id"*/
    }

    protected function delete() {
      return "DELETE FROM travels WHERE id = $this->id";
    }

    protected function default() {}

    public function _form() {
      global $db;
      ?>
            <!--
            <div class="group">
                <input type="text" name="departure" value="<?= $this->vars['departure'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['departureErr'] ?></span>
                <label>Departure</label>
            </div>
          -->
            <?php

            //TODO: per elimina viaggio mostrare solo dati attuali -> chiedere conferma prima di eliminare il viaggio

            //mostra dati attuali del viaggio da modificare/eliminare
            /*if(isset($edit)){

              echo "Travel ID: ".$this->vars['id'];
              echo "<br>";
              echo "Destination: ".$this->vars['id_planet'];
              echo "<br>";
            }*/


            ?>
            <div align="center">
              <div class="group">

                <h1> ID Viaggio: <?php echo $this->vars["id"] ?> </h1>
                <!--  <input type="text" name="arrival" value="<?= $this->vars['arrival'] ?>" <?= (isset($edit)) ? "" : 'required'?>>  -->
                  <select name="arrival" <?= (isset($edit)) ? "" : 'required'?>>


                    <?php

                      $getArrival="SELECT name, id from  planets;";
                      $arrival_result=mysqli_query($db, $getArrival);

                      while($planet = $arrival_result->fetch_assoc()){

                        echo "<option value='".$planet['id']."'>".$planet['name']."</option>";
                        /*
                        ?>
                        <option value='<?php $planet['id'] ?>'> <?php $planet['name'] ?> </option>
                        <?php*/
                      }
                    ?>
                  </select>

                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <span class="error">* <?= $this->vars['arrivalErr'] ?></span>
                  <label>Arrival</label>
              </div>

              <!--
              <div class="group">
                  <textarea rows="10" cols="80" name="description" <?= (isset($edit)) ? "" : 'required'?>><?= $this->vars['description'] ?></textarea>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <span class="error">* <?= $this->vars['descriptionErr'] ?></span>
                  <label>Description</label>
              </div>
              -->

              <div class="group">
                <!--  <input type="text" name="arrival" value="<?= $this->vars['arrival'] ?>" <?= (isset($edit)) ? "" : 'required'?>>  -->
                  <select name="rocket" <?= (isset($edit)) ? "" : 'required'?>>


                    <?php

                      $getRocket="SELECT name, id from  rockets;";
                      $rocket_result=mysqli_query($db, $getRocket);

                      while($rocket = $rocket_result->fetch_assoc()){

                        echo "<option value='".$rocket['id']."'>".$rocket['name']."</option>";
                        /*
                        ?>
                        <option value='<?php $planet['id'] ?>'> <?php $planet['name'] ?> </option>
                        <?php*/
                      }
                    ?>
                  </select>

                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <span class="error">* <?= $this->vars['arrivalErr'] ?></span>
                  <label>Rocket</label>
              </div>

              <div class="group">
                  <input type="date" name="date" value="<?= $this->vars['departure_date'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <span class="error">* <?= $this->vars['dateErr'] ?></span>
                  <label>Date</label>
              </div>

              <div class="group">
                <input type="number" min="1" name="duration" value="<?= $this->vars['duration'] ?>" <?= (isset($edit)) ? "" : 'required'?>>
                <span class="highlight"></span>
                <span class="bar"></span>
                <span class="error">* <?= $this->vars['dateErr'] ?></span>
                <label>Duration</label>
              </div>

              <br>
              <button class="blue-pill"><?= $this->msg_form_button ?></button>
            </div>
      <?php
    }

    /***
     * funzione che si occupa di controllare se gli input,
     * del form per l'aggiunta e la modifica dei viaggi,
     * siano corretti
     */
    public function controls() {
      $error = false;
      /*
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
      */

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
