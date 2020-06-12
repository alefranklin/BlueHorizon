<?php
    session_start();
    include_once("../utils/utility.php");
    set_lang();
    $PageTitle="Rockets";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page" class="">
    <div id="rockets">
    <h1><?php tr("Our spacecrafts") ?></h1>
    <a href="ship.php?ship=Millennium%20Balcon" title="<?php tr("See more infos about Millenium Balcon") ?>">
        <div class="rocket-panel" id="millennium-banner">
            <h2 class="space-font"> <?php tr("MILLENNIUM BALCON") ?> </h2>
        </div>
      </a>
      <br>
      <a href="ship.php?ship=Star%20Booster" title="<?php tr("See more infos about Star Booster") ?>">
        <div class="rocket-panel" id="starbooster-banner">
            <h2 class="space-font"> <?php tr("STARBOOSTER") ?> </h2>
            </div>
      </a>
      <br>
      <a href="ship.php?ship=Arcasia" title="<?php tr("See more infos about Arcasia") ?>">
        <div class="rocket-panel" id="arcasia-banner">
            <h2 class="space-font"> <?php tr("ARCASIA") ?> </h2>
            </div>
      </a>
      <br>
    </div>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
