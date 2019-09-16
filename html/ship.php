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

<div id="body-page" class="ship-page">
<a href="rockets.php">← Return to rockets section</a>
<h1>Ship Name</h1>
<p>ship things</p>

</div>