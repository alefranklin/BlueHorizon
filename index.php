<?php
    session_start();
    include_once("utils/utility.php");
    echo "local_path: ".$local_path."<br>";

    $test = $_SERVER['PHP_SELF'];
    $test = explode('/',$test);
    echo $test[1];
    echo "PROVA: ".$_SERVER['PHP_SELF'];
    
    $PageTitle="Blue Horizon";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>
<!-- head -->
<?php include("html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include("html/navbar.php");?>
</div>

<!-- menu -->
<div id="body-page" class="" role="main">
  <div id="home-title">
    <h1> <?php tr("Benvenuto in Blue Horizon!")?> </h1>
    <?php tr("Questo è un sito di prenotazione di viaggi interplanetari!") ?>
    <br>
    <?php tr("Se vuoi viaggiare, scegli un pianeta di destinazione e prenota") ?><a href="<?= $host_path . "html/travels.php" ?>" > <?php tr("Qui") ?> </a>!
  </div>
  <img id="home-bg" src="img/HOME_BG_2.jpg" alt="<?php tr("Sfondo")?>" />
  <img id="home-bg-m" src="img/HOME_BG_M.png" alt="<?php tr("Sfondo Mobile")?>" />
</div>
<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
