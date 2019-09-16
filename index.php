<?php
    session_start();
    include_once("utils/utility.php");

    $PageTitle="Blue Horizon";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>
<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<!-- menu -->
<div id="body-page" class="" role="main">
  <div>
    <h1> <?php tr("Benvenuto in BlueHorizon!")?> </h1>
    <?php tr("Questo è un sito di prenotazione di viaggi interplanetari!") ?>
    <br>
    <?php tr("Se vuoi viaggiare, scegli un pianeta di destinazione e prenota ") ?><a href="<?= $host_path . "html/travels.php" ?>" > <?php tr("Qui") ?> </a>  <?php tr("!") ?>

  </div>
<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
