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
    <a href="ship.php?ship=Millennium-Balcon" title="See more infos about Millennium-Balcon">
        <div class="rocket-panel" id="millennium-banner">
            <h2 class="space-font"> <?php tr("MILLENNIUM BALCON") ?> </h1>
        </div>
      </a>
      <br>
      <a href="ship.php?ship=StarBooster" title="See more infos about StarBooster">
        <div class="rocket-panel" id="starbooster-banner">
            <h2 class="space-font"> <?php tr("STARBOOSTER") ?> </h1>
            </div>
      </a>
      <br>
      <a href="ship.php?planet=Terra" title="See more infos about Arcasia">
        <div class="rocket-panel" id="arcasia-banner">
            <h2 class="space-font"> <?php tr("ARCASIA") ?> </h1>
            </div>
      </a>
      <br>
    </div>  
</div>

<!--
    <div id="rockets">

        <dl>
            <dt><//?php tr("Name 1") ?></dt>
            <dd>
                <img class="space-ship" src="../img/hyperion-shuttle.jpg" alt=<?php tr("BluHorizon's spacecrafts-1") ?>/>
                <p> <//?php tr("qui ci va la descrizione del razzo") ?>
                </p>
            </dd>

            <dt><//?php tr("Name 2") ?></dt>
            <dd>
                <img class="space-ship" src="../img/ship2.jpg" alt=<?php "BluHorizon's spacecrafts-2" ?>/>
                <p><//?php tr("qui ci va la descrizione del razzo") ?>
                </p>
            </dd>

            <dt><//?php tr("Name 3") ?></dt>
            <dd>
                <img class="space-ship" src="../img/ship3.jpeg" alt=<?php "BluHorizon's spacecrafts-3" ?>/>
                <p><//?php tr("qui ci va la descrizione del razzo") ?>
                </p>
            </dd>
        </dl>
    </div>

 -->

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
