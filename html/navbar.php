<?php
    include_once($local_path."utils/utility.php");
    if (isset($_SESSION['user'])) {
        $auth = 1;
        $username = $_SESSION['user']['username'];
    } else $auth = 0;
    
    
    $self = $_SERVER['PHP_SELF'];
    // link delle pagine
    $home = "index.php";
    $company = "company.php";
    $rockets = "rockets.php";
    $travels = "travels.php";


ini_set('display_errors', 1);

?>
<div id="skip">
    <a href="#body-page">Skip to main content</a>
</div>
<img id="logo" src="<?= $host_path."img/logo-placeholder.png" ?>" alt="Logo Blue Horizon">
<nav id="menu" class="topnav">
    
        <a class="<?= setActive($self,$home) ?>" href="<?= $host_path."index.php" ?>" > HOME </a>
        <a class="<?= setActive($self,$company) ?>" href="<?= $host_path."html/company.php" ?>" > COMPANY </a>
        <a class="<?= setActive($self,$rockets) ?>" href="<?= $host_path."html/rockets.php" ?>" > ROCKETS </a>
        <a class="<?= setActive($self,$travels) ?>" href="<?= $host_path."html/travels.php" ?>" > TRAVELS </a>

        <!-- icona user o, se loggato, username -->
        <?php if ($auth) { ?>

            <a class="user-icon-container space-font" href="<?= $host_path."user/privato.php" ?>">
                <i class="user-icon fas fa-user"></i>
                <span class="hide">Pagina Utente</span><?= $username ?>
            </a>

        <?php } else { ?>

            <a href="javascript:void(0); "class="user-icon-container space-font" onclick="toggleUser(0)">
                <i class="user-icon fas fa-user"></i><span class="hide">Login</span>
            </a>

            <!-- login form -->
            <?php include($local_path."user/login-form.php"); ?>
        <?php } ?>

        <!-- icona hamburger -->
        <a href="javascript:void(0);" class="icon" onclick="toggleHamburger()">
            <i class="fa fa-bars"></i><span class="hide">Menu</span>
        </a>
</nav>