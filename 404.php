<?php
    session_start();
    include_once("utils/utility.php");
    set_lang();
    $PageTitle="Error 404";

//head
include("html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include("html/navbar.php"); ?>
</div>

<div id="body-page" class="">
<div id="error">
    <img id="desk" src="img/tesla-in-space.jpg" alt="<?php tr("tesla-in-space")?>" />
    <img id="mobile" src="img/bg-minimal.jpg" alt="<?php tr("")?>" />
    <h1>Error 404: <?php tr("Page not found");?>!</h1>
    <h2>Ooops!! <?php tr("It seems you got lost in navigation");?></h2>
</div>
</div>

<!-- footer -->
<?php include("html/footer.php"); ?>
