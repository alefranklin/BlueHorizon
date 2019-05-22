<?php
  include_once "../utils/utility.php"; // includo il file di connessione al database

/****************************************************** form *****************************************************************/
  $title = null;
  $button = null;

  function form($section, $vars) {

    global $title;
    global $button;

    switch ($section) {

        case "add-user":
            break;

        case "edit-travel":
            $title = "modifica viaggio";
            $button = "Modifica";
            $function = "travelform";
            break;
        case "add-travel":
            $title = "aggiungi viaggio";
            $button = "Aggiungi";
            $function = "travelform";
            break;

        case "add-rocket":
            break;
    }
?>
  <section>
    <h2><?= $title ?></h2>
    <p><span class="error">* required field</span></p>
    <form name="form_manage_data" method="post" action="manage.php">

      <input type="hidden" name="id" value="<?= (isset($vars['id'])) ? $vars['id'] : null ?>">
      <input type="hidden" name="section" value="<?= $vars['section'] ?>">

      <?php $function($vars); ?>

    </form>
  </section>
<?php
  }

  function travelform($vars) {

    global $title;
    global $button;

?>
      <div class="group">
          <input type="text" name="departure" value="<?= $vars['departure'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $vars['departureErr'] ?></span>
          <label>Departure</label>
      </div>

      <div class="group">
          <input type="text" name="arrival" value="<?= $vars['arrival'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $vars['arrivalErr'] ?></span>
          <label>Arrival</label>
      </div>

      <div class="group">
          <textarea rows="10" cols="80" name="description" required><?= $vars['description'] ?></textarea>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $vars['descriptionErr'] ?></span>
          <label>Description</label>
      </div>

      <div class="group">
          <input type="date" name="date" value="<?= $vars['date'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $vars['dateErr'] ?></span>
          <label>Date</label>
      </div>

      <button class="blue-pill"><?= $button ?></button>
<?php
  }

?>
