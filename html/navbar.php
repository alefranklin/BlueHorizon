<?php
    include_once($local_path."utils/utility.php");
    
    if (isAuth()) {
        $username = $_SESSION['user']['username'];
    }

    $self = $_SERVER['PHP_SELF'];
    // link delle pagine
    $home = "index.php";
    $company = "company.php";
    $rockets = "rockets.php";
    $travels = "travels.php";
    $info    = "infoplanet.php";


ini_set('display_errors', 1);

?>
<div id="skip-main" class="skip">
    <a href="#body-page">Skip to main content</a>
</div>

<div id="header_nav">
<!-- keep role for screen reader -->
<h1 id="title">Blue Horizon</h1>
<!--<img id="logo" role="banner" src="<?= $host_path."img/logo-placeholder.png" ?>" alt="Logo BlueHorizon"> -->
<nav id="menu" class="topnav">
    <ul>
      <li><a class="<?= setActive($self,$home) ?>" href="<?= $host_path."index.php" ?>" > HOME </a></li>
      <li><a class="<?= setActive($self,$company) ?>" href="<?= $host_path."html/company.php" ?>" > COMPANY </a></li>
      <li><a class="<?= setActive($self,$rockets) ?>" href="<?= $host_path."html/rockets.php" ?>" > ROCKETS </a></li>
      <li><a class="<?= setActive($self,$travels) ?>" href="<?= $host_path."html/travels.php" ?>" > TRAVELS </a></li>
      <li><a class="<?= setActive($self,$info) ?>" href="<?= $host_path."html/infoplanet.php" ?>" > INFOS </a></li>
      
      <!-- icona user o, se loggato, username -->
      <li>  <?php if (isAuth()) { ?>
          <a class="user-icon-container space-font" href="<?= $host_path."user/privato.php" ?>">
              <i class="user-icon fas fa-user"></i>
              <span class="hide">Pagina Utente</span><span class="navbar-username"><?= strtoupper($username) ?></span>
          </a>
      <?php } else { ?>
          <a href="javascript:void(0); "class="user-icon-container space-font" onclick="toggleUser(0)">
              <i class="user-icon fas fa-user" aria-label="LOGIN"></i>
              <span class="hide">LOGIN</span>
          </a>
      </li>
    </ul>
          <!-- login form -->
          <?php include($local_path."user/login-form.php"); ?>
      <?php } ?>

      <!-- icona hamburger -->
      <a href="javascript:void(0);" class="icon" onclick="toggleHamburger()">
          <i class="fa fa-bars"></i>
      </a>
</nav>
</div>