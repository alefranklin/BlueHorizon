<?php
    session_start();
    include_once("utils/utility.php");
    set_lang();
    $PageTitle="Travels";

    function customPageHeader() { ?>

      <meta name="keywords" content="travels, interplanetary, planets, book, buy"/>

<?php } ?>


<!-- head -->
<?php include("html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include("html/navbar.php"); ?>
</div>

<div id="body-page" class="">
  <div id="travel-content">
    <h1 id="travels-title" class="space-font"><?php tr("Our Travels") ?></h1>

    <div id="travel-list">

      <a id="Mercurio" href="planets.php?planet=Mercurio" title="See more infos about our Mercury trip" aria-describedby="mercury-info">
        <div class="travel-panel" id="mercury-banner">
            <h1 class="space-font"> <?php tr("MERCURY") ?> </h1>
            <p aria-hidden="true" id="mercury-info">
              <?php tr("Mercurio non è in generale il pianeta più caldo del Sistema Solare, ma quello con la maggiore escursione termica, a causa della quasi totale assenza di atmosfera. La faccia esposta al Sole può manifestare fino a 527 gradi centigradi, ma quella buia ne registra anche -83.") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Venere" href="planets.php?planet=Venere" title="See more infos about our Venus trip" aria-describedby="venus-info">
        <div class="travel-panel" id="venus-banner">
            <h1 class="space-font"> <?php tr("VENUS") ?> </h1>
            <p aria-hidden="true" id="venus-info">
              <?php tr("Un giorno venusiano dura 243 giorni terrestri, mentre un anno è più breve visto che si articola in soli 224,7 giorni terrestri.") ?>
            </p>
            </div>
      </a>
      <br>
      <a id="Luna" href="planets.php?planet=Luna" title="See more infos about our Moon trip" aria-describedby="moon-info">
        <div class="travel-panel" id="moon-banner">
            <h1 class="space-font"> <?php tr("MOON") ?></h1>
            <p aria-hidden="true" id="moon-info">
              <?php tr("La Luna non è per nulla alla medesima distanza dalla Terra dal momento della sua formazione: secondo le stime, il satellite si allontana da noi di 3,78 centimetri ogni anno.") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Marte" href="planets.php?planet=Marte" title="See more infos about our Mars trip" aria-describedby="mars-info">
        <div class="travel-panel" id="mars-banner">
            <h1 class="space-font"> <?php tr("MARS") ?> </h1>
            <p aria-hidden="true" id="mars-info">
              <?php tr("Come la Terra, anche Marte manifesta 4 stagioni, a causa del suo asse inclinato rispetto al Sole, con un angolo molto simile a quello della Terra (25 gradi contro 23.5 gradi terrestri). Tuttavia, poiché l’anno di Marte è circa il doppio del nostro, anche le stagioni durano di più. A causa poi della traiettoria spiccatamente ellittica, alcune stagioni durano più di altre (nell’emisfero nord l’estate e la primavera durano di più, così come nel sud l’autunno e l’inverno).") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Giove" href="planets.php?planet=Giove" title="See more infos about our Jupiter trip" aria-describedby="jupiter-info">
        <div class="travel-panel" id="jupiter-banner">
            <h1 class="space-font"> <?php tr("JUPITER") ?> </h1>
            <p aria-hidden="true" id="jupiter-info">
              <?php tr("Pianeta enorme e circondato di Lune: ben 63 infatti sono gli attuali satelliti naturali accertati che orbitano attorno al gigante del Sistema Solare. Quattro di questi furono scoperti nel 1610 da Galileo Galilei, ovvero Io, Europa, Callisto e Ganimede, quest’ultimo più grande in volume del pianeta Mercurio, ma dotato di una massa pari alla metà." ) ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Io" href="planets.php?planet=Io" title="See more infos about our Io trip" aria-describedby="io-info">
        <div class="travel-panel" id="io-banner">
            <h1 class="space-font"> <?php tr("IO") ?> </h1>
            <p aria-hidden="true" id="io-info">
              <?php tr("La gravità di Giove è così grande, che ha l’effetto di allungare e schiacciare  Io. Tutta l’energia che proviene dal campo gravitazionale di Giove alimenta i vulcani di Io i cui pennacchi possono raggiungere i 500 km sopra la superficie della luna.") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Europa" href="planets.php?planet=Europa" title="See more infos about our Europa trip" aria-describedby="europa-info">
        <div class="travel-panel" id="europa-banner">
            <h1 class="space-font"> <?php tr("EUROPA") ?> </h1>
            <p aria-hidden="true" id="europa-info">
              <?php tr("Si pensa che sotto la superficie di Europa ci sia uno strato di acqua liquida mantenuta tale dal calore generato dalle \"maree\" causate dall'interazione gravitazionale con Giove. La temperatura sulla superficie di Europa è di circa 110 (-163 °C) all'equatore e di solo 50 K (-223 °C) ai poli, cosicché il ghiaccio superficiale è permanentemente congelato.") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Saturno" href="planets.php?planet=Saturno" title="See more infos about our Saturn trip" aria-describedby="saturn-info">
        <div class="travel-panel" id="saturn-banner">
            <h1 class="space-font"> <?php tr("SATURN") ?> </h1>
            <p aria-hidden="true" id="saturn-info">
              <?php tr("Saturno è il pianeta con la densità più bassa del sistema solare: solo 0,69 mg/mL, un valore inferiore anche a quello dell’acqua (circa 2/3). Se si disponesse dunque di un mare abbastanza grande per ospitare l’intero corpo celeste lo vedremmo galleggiare come un enorme iceberg.") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Urano" href="planets.php?planet=Urano" title="See more infos about our Uranus trip" aria-describedby="uranus-info">
        <div class="travel-panel" id="uranus-banner">
            <h1 class="space-font"> <?php tr("URANUS") ?> </h1>
            <p aria-hidden="true" id="uranus-info">
              <?php tr("A Urano non piace proprio la posizione verticale: il pianeta, che è inclinato di 98 gradi rispetto al suo piano orbitale intorno al Sole, caratteristica unica nel Sistema Solare, è il settimo in ordine di distanza dal Sole, il terzo per diametro e il quarto per massa.") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Nettuno" href="planets.php?planet=Nettuno" title="See more infos about our Neptune trip" aria-describedby="neptune-info">
        <div class="travel-panel" id="neptune-banner">
            <h1 class="space-font"> <?php tr("NEPTUNE") ?> </h1>
            <p aria-hidden="true" id="neptune-info">
              <?php tr("Su Nettuno (e su Urano) non c’è acqua (almeno non in quantità significativa) ma piove. E data l’altissima concentrazione di carbonio è probabile che le gocce abbiano la stessa composizione dei diamanti.") ?>
            </p>
        </div>
      </a>
      <br>
      <a id="Plutone" href="planets.php?planet=Plutone" title="See more infos about our Pluton trip" aria-describedby="pluto-info">
        <div class="travel-panel" id="pluto-banner">
            <h1 class="space-font"> <?php tr("PLUTO") ?> </h1>
            <p aria-hidden="true" id="pluto-info">
              <?php tr("Così lontano e piccolo da generare dubbi sulla sua consistenza di pianeta, eppure dotato di atmosfera. Molto sottile e tossica per gli esseri umani, è pur sempre un’atmosfera. Ma quello che è più singolare è la sua consistenza. Quando il pianeta infatti è in perielio (distanza minima dal Sole) l’atmosfera è gassosa, in afelio (distanza massima dal Sole) questa congela e cade sul pianeta come neve.") ?>
            </p>
        </div>
      </a>
    </div>
  </div>
</div>


<!-- footer -->
<?php include("html/footer.php"); ?>
