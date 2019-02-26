<?php
    session_start();
    include_once("../utils/utility.php");
    $PageTitle="Travels";

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

    <h1 id="travels-title" class="space-font">Our Travels</h1>

    <div id="travel-list">
      <a href="../planets.php/" title="See more infos about our Mars trip">
        <div class="travel-panel" id="mars-banner">
            <h1 class="space-font"> MARTE </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
        <br>
      <a href="../planets.php/" title="See more infos about our Pluton trip">
        <div class="travel-panel" id="pluto-banner">
            <h1 class="space-font"> PLUTONE </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
        <br>
      <a href="../planets.php/" title="See more infos about our Earth trip">
        <div class="travel-panel" id="earth-banner">
            <h1 class="space-font"> TERRA </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
    </div>
</div>
<i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
