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
<div id="error">
    <img id="desk" src="../img/tesla-in-space.jpg" alt="<?php tr("tesla-in-space")?>" />
    <img id="mobile" src="../img/bg-minimal.jpg" alt="<?php tr("bg-minimal")?>" />
    <h1>Ooops!! it seems you got lost in navigation:)</h1>
    <h2>Bounce back on track with the menu above!</h2>
</div>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
