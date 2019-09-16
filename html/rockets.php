<?php
    session_start();
    include_once("../utils/utility.php");
    set_lang();
    $PageTitle=tr("Rockets");

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
        <dl>
            <dt><?php tr("Name 1") ?></dt>
            <dd>
                <img class="space-ship" src="../img/hyperion-shuttle.jpg" alt=<?php tr("spacecrafts-1") ?>/>
                <p> <?php tr("qui ci va la descrizione del razzo") ?>
                </p>
            </dd>

            <dt><?php tr("Name 2") ?></dt>
            <dd>
                <img class="space-ship" src="../img/ship2.jpg" alt="spacecrafts-2"/>
                <p><?php tr("qui ci va la descrizione del razzo") ?>
                </p>
            </dd>

            <dt><?php tr("Name 3") ?></dt>
            <dd>
                <img class="space-ship" src="../img/ship3.jpeg" alt="spacecrafts-3"/>
                <p><?php tr("qui ci va la descrizione del razzo") ?>
                </p>
            </dd>
        </dl>
    </div>

</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
