<?php
    session_start();
    include_once("../utils/utility.php");
    $PageTitle="Company";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page">
  <div id="planet-layout">
    <h1> Planet Name </h1>
    <img src="../img/planet_ph.png" id="pianeta" alt="pianeta" />
    <p> description description description description description description description
    description description description description description description description
    description description description description description description description
    description description description description description description description
    description description description description description description description
    description description description description description description description
  </p>
  </div>
</div>
