<?php
    session_start();
    include("../utils/config.php");

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