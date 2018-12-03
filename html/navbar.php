<img id="logo" src="img/logo-placeholder.png">
<nav id="menu" class="topnav"> <!-- <-screen reader stuff -->
        <a class="active space-font" href="index.php" onclick="return false;"> HOME </a>
        <a class="space-font" href="html/company.html"> COMPANY </a>
        <a class="space-font" href="html/rockets.html"> ROCKETS </a>
        <a class="space-font" href="html/travels.html"> TRAVELS </a>

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
            <?php include_once("user/login-form.php"); ?>

        <?php } ?>

        <!-- icona hamburger -->
        <a href="javascript:void(0);" class="icon" onclick="toggleHamburger()">
            <i class="fa fa-bars"></i>
        </a>
</nav>