<?php
    session_start();
    include_once("../utils/utility.php");
    $PageTitle="Infos";

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
    <div id="info-content">
        <h1>Choose a planet!</h1>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/mercurio-info.png" alt="mercurio" /></a>
            <h1>Mercury</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/venere-info.png" alt="venere" /></a>
            <h1>Venus</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/terra-info.png" alt="terra" /></a>
            <h1>Earth</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/luna-info.png" alt="luna" /></a>
            <h1>Moon</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/marte-info.png" alt="marte" /></a>
            <h1>Mars</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/giove-info.png" alt="giove" /></a>
            <h1>Jupiter</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/io-info.png" alt="io" /></a>
            <h1>Io</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/europa-info.png" alt="europa" /></a>
            <h1>Europa</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/saturno-info.png" alt="saturno" /></a>
            <h1>Saturn</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/nettuno-info.png" alt="nettuno" /></a>
            <h1>Neptune</h1>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/plutone-info.png" alt="plutone" /></a>
            <h1>Pluto</h1>
        </div>

        <div id="info-text">
            <p>prova</p>
        </div>

    </div>
</div>