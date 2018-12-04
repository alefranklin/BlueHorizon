<?php
    //se non c'è la sessione registrata
    if (isset($_SESSION['user'])) {
        $auth = 1;
        $username = $_SESSION['user']['username'];
    } else $auth = 0;
    
    // prendo il nome della pagi attiva
    $active = end(split('-',$_SERVER['REQUEST_URI']))
    
    // link delle pagine
    $home = "index.php";
    $company = "company.php";
    $rockets = "rockets.php";
    $travels = "travels.php";


ini_set('display_errors', 1);

?>

<img id="logo" src="<?= $host_path."img/logo-placeholder.png" ?>">
<nav id="menu" class="topnav"> <!-- <-screen reader stuff -->
        <a class="<?= ($active == $home) ? "active" ?> space-font" href="<?= $host_path."index.php" ?>" > HOME </a>
        <a class="space-font" href="<?= $host_path."html/company.php" ?>" > COMPANY </a>
        <a class="space-font" href="<?= $host_path."html/rockets.php" ?>" > ROCKETS </a>
        <a class="space-font" href="<?= $host_path."html/travels.php" ?>" > TRAVELS </a>

        <!-- icona user o, se loggato, username -->
        <?php if ($auth) { ?>

            <a class="user-icon-container space-font" href="user/privato.php">
                <i class="user-icon fas fa-user"></i>
                <?= $username ?>
            </a>

        <?php } else { ?>

            <a href="javascript:void(0); "class="user-icon-container space-font" onclick="toggleUser(0)">
                <i class="user-icon fas fa-user"></i>
            </a>

            <!-- login form -->
            <?php include($local_path."user/login-form.php"); ?>
        <?php } ?>

        <!-- icona hamburger -->
        <a href="javascript:void(0);" class="icon" onclick="toggleHamburger()">
            <i class="fa fa-bars"></i>
        </a>
</nav>