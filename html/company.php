<?php
<<<<<<< HEAD
    include_once("../utils/config.php");
    //se non c'è la sessione registrata
    if (isset($_SESSION['user'])) {
        $auth = 1;
        $username = $_SESSION['user']['username'];
    } else $auth = 0;
=======
    session_start();
    include("../utils/config.php");
>>>>>>> f1c3e2467c61c81e66e3d0b73292a75221f0ab2d

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