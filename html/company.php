<?php
    session_start();
    include("../utils/config.php");
ini_set('display_errors', 1);

echo "1".$_SERVER['SCRIPT_FILENAME']."</br>";
echo "2".$_SERVER['REQUEST_URI']."</br>";
echo "3".$_SERVER['PHP_SELF']."</br>";
echo "4".$_SERVER['QUERY_STRING']."</br>";

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
<?php include("head.php"); ?>

<!-- body -->
<div id="header">
    <?php include("navbar.php"); ?>
</div>

<!-- footer -->
<?php include("footer.php"); 

print_r(get_included_files()); ?>