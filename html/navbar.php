<?php
  include_once($local_path . "utils/utility.php");

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
  <img id="logo" src="<?php echo $host_path?>/img/logo1.png" alt="<?php tr("Blue Horizon's logo") ?>" aria-hidden="true"/>
  </div>
  <!--<img id="logo" role="banner" src="?= $host_path."img/logo-placeholder.png" ?>" alt="Logo Blue Horizon"> -->
  <div id="menuShowMobile" onclick="toggleMenu()">
    <a class="fa fa-bars"><i></i></a>
  </div>


  <nav id="menu" class="topnav hideMenu">
      <ul>
        <li id="lang"><!-- it -->
        <a class="space-font-small" tabindex="2" accesskey="i" href="<?= $host_path."language/language.php?lang=it" ?>">
          <?php echo "IT"; ?> </a>
        <!-- en --><span class="separator"> |</span>
        <a class="space-font-small" tabindex="2" accesskey="e" href="<?= $host_path."language/language.php?lang=en" ?>">
          <?php echo "EN"; ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $home) ?>" tabindex="2" accesskey="h" href="http://<?= $_SERVER['SERVER_NAME'];?>/BlueHorizon/index.php" > <?php tr("HOME") ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $company) ?>" tabindex="2" accesskey="c" href="html/company.php"> <?php tr("COMPANY") ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $travels) ?>" tabindex="2" accesskey="t" href="<?= $host_path . "html/travels.php" ?>" > <?php tr("TRAVELS") ?> </a></li>
        <li class="menuItem"><a class="<?= setActive($self, $rockets) ?>" tabindex="2" accesskey="r" href="<?= $host_path . "html/rockets.php" ?>" > <?php tr("ROCKETS") ?> </a></li>
        <!-- login o, se loggato, username -->
        <li>  <?php
  if (isAuth()) {
      if (isAdmin()) {
  ?>
        <a class="<?= setActive($self, $admin) ?>" tabindex="2" accesskey="a" href="<?= $host_path . "user/privato.php" ?>"> <?php tr("ADMIN") ?> </a>
      <?php
      } else {
    ?>
        <a class="<?= setActive($self, $user) ?>" tabindex="2" href="<?= $host_path . "user/privato.php" ?>">
        <?php echo strtoupper($username); ?> </a>
    <?php
  } ?>
	</li>
      <!-- logout -->
      <li><a class="space-font" tabindex="2" accesskey="l" href="<?= $host_path."user/logout.php?" ?>"><?php tr("LOGOUT") ?> </a></li>
  <?php
  } else {
  ?>
      <a href="<?= $host_path . "html/login.php" ?>" tabindex="2" accesskey="k" class="<?= setActive($self, $login) ?>"> <?php tr("LOGIN") ?> </a>
        </li>
            <!-- login form -->

        <?php
  }
  ?>
  </ul>
  </nav>
</div>
