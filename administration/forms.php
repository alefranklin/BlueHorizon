<?php

/****************************************************** form *****************************************************************/

  function form($section) {

    switch ($section) {

        case "add-user":
            break;

        case "add-travel":
            $title = "aggiungi viaggio";
            $function = "addtravelform";
            break;

        case "add-rocket":
            break;
    }
?>
  <h2><?= $title ?></h2>
  <p><span class="error">* required field</span></p>
  <form name="form_manage_data" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]."?section=$section") ?>">

    <?php $function($section); ?>

  </form>
<?php
  }

  function addtravelform($section) {
?>
      <div class="group">
          <input type="text" name="departure" value="<?= $_SESSION['var'][$section]['departure'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $_SESSION['var'][$section]['departureErr'] ?></span>
          <label>Departure</label>
      </div>

      <div class="group">
          <input type="text" name="arrival" value="<?= $_SESSION['var'][$section]['arrival'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $_SESSION['var'][$section]['arrivalErr'] ?></span>
          <label>Arrival</label>
      </div>

      <div class="group">
          <textarea rows="10" cols="80" name="description" required><?= $_SESSION['var'][$section]['description'] ?></textarea>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $_SESSION['var'][$section]['descriptionErr'] ?></span>
          <label>Description</label>
      </div>

      <div class="group">
          <input type="date" name="date" value="<?= $_SESSION['var'][$section]['date'] ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <span class="error">* <?= $_SESSION['var'][$section]['dateErr'] ?></span>
          <label>Date</label>
      </div>

      <button>Aggiungi</button>
<?php
  }

?>
