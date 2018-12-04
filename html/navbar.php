<?php
    session_start();
    include_once("../utils/config.php");
print_r(get_included_files());

ini_set('display_errors', 1);
?>

<img id="logo" src="<?= $base_url."img/logo-placeholder.png" ?>">
<nav id="menu" class="topnav"> <!-- <-screen reader stuff -->
        <a class="active space-font" href="index.php" onclick="return false;"> HOME </a>
        <a class="space-font" href="html/company.php"> COMPANY </a>
        <a class="space-font" href="html/rockets.php"> ROCKETS </a>
        <a class="space-font" href="html/travels.php"> TRAVELS </a>

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
            <?php include("user/login-form.php"); ?>

        <?php } ?>

        <!-- icona hamburger -->
        <a href="javascript:void(0);" class="icon" onclick="toggleHamburger()">
            <i class="fa fa-bars"></i>
        </a>
</nav>