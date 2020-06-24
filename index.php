<?php
    session_start();
    include_once("utils/utility.php");
    
    $PageTitle="Blue Horizon";

//head
include("html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include("html/navbar.php");?>
</div>

<!-- menu -->
<div id="body-page" class="index-bg" role="main">
  <div id="home-title">
    <h1> <?php tr("Benvenuto in Blue Horizon!")?> </h1>
    <?php tr("Questo è un sito di prenotazione di viaggi interplanetari!") ?>
    <br>
    <?php tr("Se vuoi viaggiare, scegli un pianeta di destinazione e prenota") ?><a href="travels.php"> <?php tr("Qui") ?> </a>!
  </div>
</div>
<!-- footer -->
<?php include("html/footer.php"); ?>
