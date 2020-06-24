<?php
    session_start();
    include_once("utils/utility.php");
    set_lang();
    $PageTitle="Rockets";

    function customPageHeader() { ?>

      <meta name="keywords" content="ship, sell, voyage, book, buy"/>

<?php } ?>


<!-- head -->
<?php include("html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include("html/navbar.php"); ?>
</div>

<div id="body-page" class="space-ship">
  <a href="rockets.php">← <?php tr("Return to rockets section") ?></a>
  <h1 id="rockets"> <?php tr("Ship information") ?> </h1>
  <div id="ship-panel">
    <?php
    global $db;
    $name_ship = (string)$_GET['ship'];
    $query = "SELECT * FROM rockets WHERE name = '$name_ship'";

    $query_result = get_query($query);
    $ship = $query_result->fetch_assoc();

    echo tr("Name").": ".$ship['name'];
    echo "<br>";
    echo tr("Weight").": ".$ship['weight']." Kg";
    echo "<br>";
    echo tr("Height").": ".$ship['height']." m";
    echo "<br>";
    echo tr("Length").": ".$ship['length']." m";
    echo "<br>";
    echo tr("Nationality").": ".$ship['nationality'];
    echo "<br>";
    echo "<br>";

    ?>
  </div>


</div>

<?php include("html/footer.php"); ?>