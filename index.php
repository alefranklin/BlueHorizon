<?php
    session_start();
    include("utils/config.php");
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

    $PageTitle="Blue Horizon";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include("html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($base_url."/html/navbar.php"); ?>
</div>



<div id="body-page" class="">
    <i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>

    <div id="presentation">
        <h1 class="space-font"> BLUE <br> HORIZON </h1>
        <h2 class="space-font"> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </h2>
    </div>
</div>

<!-- footer -->
<?php include($base_url."/html/footer.php"); 
print_r(get_included_files()); ?>