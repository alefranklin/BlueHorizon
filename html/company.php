<?php
    include_once("../utils/config.php");
    //se non c'è la sessione registrata
    if (isset($_SESSION['user'])) {
        $auth = 1;
        $username = $_SESSION['user']['username'];
    } else $auth = 0;

    $PageTitle="Company";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<!-- footer -->
<?php include("footer.php"); 

print_r(get_included_files()); ?>