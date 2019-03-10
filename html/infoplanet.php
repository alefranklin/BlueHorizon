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


    </div>
</div>