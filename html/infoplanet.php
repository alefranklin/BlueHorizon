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
            <a href="#info-text"><img src="../img/mercurio-info.png" alt="mercurio" />
            <h1>Mercury</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/venere-info.png" alt="venere" />
            <h1>Venus</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/terra-info.png" alt="terra" />
            <h1>Earth</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/luna-info.png" alt="luna" />
            <h1>Moon</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/marte-info.png" alt="marte" />
            <h1>Mars</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/giove-info.png" alt="giove" />
            <h1>Jupiter</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/io-info.png" alt="io" />
            <h1>Io</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/europa-info.png" alt="europa" />
            <h1>Europa</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/saturno-info.png" alt="saturno" />
            <h1>Saturn</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/uranus-info.png" alt="urano" />
            <h1>Uranus</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/nettuno-info.png" alt="nettuno" />
            <h1>Neptune</h1>
            </a>
        </div>
        <div class="info-tile">
            <a href="#info-text"><img src="../img/plutone-info.png" alt="plutone" />
            <h1>Pluto</h1>
            </a>
        </div>

        <div id="info-text">
            <h1>Planet Name</h1>
            <a href="infoplanet.php">X</a>
            <p>texttexttexttexttexttexttexttexttexttext</p>
        </div>

    </div>
</div>
