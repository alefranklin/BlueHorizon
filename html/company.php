<html lang="it">
<?php
    include_once("../utils/config.php");
    $PageTitle="Company";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<body>
    <div id="header">
        <?php include($local_path."html/navbar.php"); ?>
    </div>
    <div id="body-page" class="">
    <i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>
<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
    </div>
</body>
</html>