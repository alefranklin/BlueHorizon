<?php
    session_start();
    include("utils/config.php");

    $PageTitle="Blue Horizon";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>

<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<!-- menu -->
<div id="body-page" class="" role="main">
    <div id="presentation">
        <h1 class="space-font"> BLUE <br> HORIZON </h1>
        <h2 class="space-font"> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </h2>
    </div>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
