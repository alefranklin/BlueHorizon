<?php

/****************************************************** form *****************************************************************/
  $title = NULL;
  $button = NULL;

  function form($section) {

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
    <form name="form_manage_data" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]."?section=$section") ?>">

      <?php $function($section); ?>

    </form>
  </section>
<?php
  }

  function travelform($section) {

    global $title;
    global $button;

    $section = $_SESSION['var'][$section];

?>
      <div class="group">
          <input type="text" name="departure" value="<?= $section['departure'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $section['departureErr'] ?></span>
          <label>Departure</label>
      </div>

      <div class="group">
          <input type="text" name="arrival" value="<?= $section['arrival'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $section['arrivalErr'] ?></span>
          <label>Arrival</label>
      </div>

      <div class="group">
          <textarea rows="10" cols="80" name="description" required><?= $section['description'] ?></textarea>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $section['descriptionErr'] ?></span>
          <label>Description</label>
      </div>

      <div class="group">
          <input type="date" name="date" value="<?= $section['date'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $section['dateErr'] ?></span>
          <label>Date</label>
      </div>

      <button class="blue-pill"><?= $button ?></button>
<?php
  }

?>
