<html>
<?php
    session_start();
    include("utils/config.php");
    $PageTitle="Blue Horizon";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<<<<<<< HEAD
<?php include($local_path."html/head.php"); ?>
=======
<?php include("html/head.php"); echo $_SERVER["DOCUMENT_ROOT"];?>
>>>>>>> f1c3e2467c61c81e66e3d0b73292a75221f0ab2d

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>


<body>
<div id="body-page" class="">
    <i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>

    <div id="presentation">
        <h1 class="space-font"> BLUE <br> HORIZON </h1>
        <h2 class="space-font"> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </h2>
    </div>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
    
</body>
</html>
    