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
  <div id="travel-content">
    <h1 id="travels-title" class="space-font">Our Travels</h1>

    <div id="travel-list">

      <a href="planets.php?planet=Mercurio" title="See more infos about our Mercury trip">
        <div class="travel-panel" id="mercury-banner">
            <h1 class="space-font"> MERCURY </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Venere" title="See more infos about our Venus trip">
        <div class="travel-panel" id="venus-banner">
            <h1 class="space-font"> VENUS </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Terra" title="See more infos about our Earth trip">
        <div class="travel-panel" id="earth-banner">
            <h1 class="space-font"> EARTH </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Luna" title="See more infos about our Moon trip">
        <div class="travel-panel" id="moon-banner">
            <h1 class="space-font"> MOON </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Marte" title="See more infos about our Mars trip">
        <div class="travel-panel" id="mars-banner">
            <h1 class="space-font"> MARS </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Giove" title="See more infos about our Jupiter trip">
        <div class="travel-panel" id="jupiter-banner">
            <h1 class="space-font"> JUPITER </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Io" title="See more infos about our Io trip">
        <div class="travel-panel" id="io-banner">
            <h1 class="space-font"> IO </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Europa" title="See more infos about our Europa trip">
        <div class="travel-panel" id="europa-banner">
            <h1 class="space-font"> EUROPA </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Saturno" title="See more infos about our Saturn trip">
        <div class="travel-panel" id="saturn-banner">
            <h1 class="space-font"> SATURN </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Urano" title="See more infos about our Uranus trip">
        <div class="travel-panel" id="uranus-banner">
            <h1 class="space-font"> URANUS </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Nettuno" title="See more infos about our Neptune trip">
        <div class="travel-panel" id="neptune-banner">
            <h1 class="space-font"> NEPTUNE </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
      <br>
      <a href="planets.php?planet=Plutone" title="See more infos about our Pluton trip">
        <div class="travel-panel" id="pluto-banner">
            <h1 class="space-font"> PLUTON </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. </p>
        </div>
      </a>
    </div>
  </div>
</div>
<i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
