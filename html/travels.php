<?php
    include_once("../utils/config.php");
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

    <h1 id="travels-title" class="space-font">TRAVELS</h1>

    <div id="travel-list">
        <div class="travel-panel" id="mars-banner">
            <p class="space-font"> MARTE </p>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
        <br>
        <div class="travel-panel" id="pluto-banner">
            <p class="space-font"> PLUTONE </p>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
        <br>
        <div class="travel-panel" id="earth-banner">
            <p class="space-font"> TERRA </p>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
    </div>
</div>
            <div id="body-page" class="">
        <i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>

            </div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
