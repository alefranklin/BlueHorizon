<?php
  include_once("../utils/utility.php");

  if (isAuth()) {
      $username = $_SESSION['user']['username'];
  }

  $self    = $_SERVER['PHP_SELF'];
  // link delle pagine
  $home    = "index.php";
  $company = "company.php";
  $rockets = "rockets.php";
  $travels = "travels.php";
  $book    = "book.php";
  $admin   = "admin.php";
  $user    = "privato.php";
  $login   = "login.php";

  ?>
  <div id="skip-main" class="accessibility-hide">
      <a href="#body-page" onfocus="toggleAccessibilityTop()" onblur="toggleAccessibilityTop()" tabindex="2" accesskey="s"><?php tr("Skip to main content") ?></a>
  </div>

  <div id="header_nav">
  <!-- keep role for screen reader -->
  <div id="title">
  <p>
  Blue
  </p>
  <p>
  Horizon
  </p>
  <!-- <img id="logo" src="img/logo1.png" alt="<?php tr("Blue Horizon's logo") ?>" aria-hidden="true"/> -->
  </div>
  <!--<img id="logo" role="banner" src="?= $host_path."img/logo-placeholder.png" ?>" alt="Logo Blue Horizon"> -->
  <div id="menuShowMobile" onclick="toggleMenu()">
    <a class="fa fa-bars"><i></i></a>
  </div>


  <nav id="menu" class="topnav hideMenu">
      <ul>
        <li id="lang" class="menuItem"><!-- it -->
        <a class="space-font-small" tabindex="2" accesskey="i" href="language/language.php?lang=it">
          <?php echo "IT"; ?> </a>
        <!-- en --><span class="separator"> |</span>
        <a class="space-font-small" tabindex="2" accesskey="u" href="language/language.php?lang=en">
          <?php echo "EN"; ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $home) ?>" tabindex="2" accesskey="h" href="index.php" > <?php tr("HOME") ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $company) ?>" tabindex="2" accesskey="p" href="company.php" > <?php tr("COMPANY") ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $travels) ?>" tabindex="2" accesskey="t" href="travels.php" > <?php tr("TRAVELS") ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $rockets) ?>" tabindex="2" accesskey="n" href="rockets.php" > <?php tr("ROCKETS") ?> </a></li>
        <!-- login o, se loggato, username -->
        <li>  <?php
  if (isAuth()) {
      if (isAdmin()) {
  ?>
        <a class="<?= setActive($self, $admin) ?>" tabindex="2" accesskey="a" href="privato.php"> <?php tr("ADMIN") ?> </a>
      <?php
      } else {
    ?>
        <a class="<?= setActive($self, $user) ?>" tabindex="2" href="privato.php">
        <?php echo strtoupper($username); ?> </a>
    <?php
  } ?>
	</li>
      <!-- logout -->
      <li><a class="space-font" tabindex="2" accesskey="l" href="user/logout.php"><?php tr("LOGOUT") ?> </a></li>
  <?php
  } else {
  ?>
      <a href="login.php" tabindex="2" accesskey="l" class="<?= setActive($self, $login) ?>"> <?php tr("LOGIN") ?> </a>
        </li>
            <!-- login form -->

        <?php
  }
  ?>
  </ul>
  </nav>
</div>
