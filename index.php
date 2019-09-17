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
  <div id="home-title">
    <h1> <?php tr("Benvenuto in BlueHorizon!")?> </h1>
    <?php tr("Questo è un sito di prenotazione di viaggi interplanetari!") ?>
    <br>
    <?php tr("Se vuoi viaggiare, scegli un pianeta di destinazione e prenota ") ?><a href="<?= $host_path . "html/travels.php" ?>" > <?php tr("Qui") ?> </a>  <?php tr("!") ?>
  </div>

  <div id="images">

    <figure>
    <img src="img/Slideshow_1.jpg" alt="<?php tr("Astronauta sdraiato")?>" />
    <figcaption><a href="javascript:void(0);" onclick="toggleUser(0)">Unisciti alla nostra comunità di viaggiatori! ↗</a></figcaption>
    </figure>

    <figure>
    <img src="img/Slideshow_2.jpg" alt="<?php tr("Millennium Balcon")?>" />
    <figcaption><a href="html/rockets.php">Dai un'occhiata alle nostre navicelle! ↗</a></figcaption>
    </figure>

    <figure>
    <img src="img/Slideshow_3.jpg" alt="<?php tr("Riunione Aziendale")?>" />
    <figcaption><a href="html/company.php">Leggi qualche curiosità su di noi! ↗</a></figcaption>
    </figure>

    <figure>
    <img src="img/Slideshow_4.jpg" alt="<?php tr("Plancia di comando")?>" />
    <figcaption><a href="html/travel.php">Prenota il volo dei tuoi sogni tra le nostre numerose opzioni di viaggio! ↗</a></figcaption>
    </figure>

  </div>
<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
