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

  ?>
  <div id="skip-main" class="skip">
      <a href="#body-page"><?php tr("Skip to main content") ?></a>
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
  <img id="logo" src="http://localhost/BlueHorizon/img/logo1.png" alt=<?php tr("BlueHorizon's logo") ?> aria-hidden="true"/>
  </div>
  <!--<img id="logo" role="banner" src="?= $host_path."img/logo-placeholder.png" ?>" alt="Logo BlueHorizon"> -->
  <div id="menuShowMobile" onclick="toggleMenu()">
    <a><i class="fa fa-bars"></i></a>
  </div>

  <!-- it -->
  <a class="space-font" href="<?= $host_path."language/language.php?lang=it" ?>">
    <?php echo strtoupper("it"); ?> </a>
  <!-- en -->
  <a class="space-font" href="<?= $host_path."language/language.php?lang=en" ?>">
    <?php echo strtoupper("en"); ?> </a>


  <nav id="menu" class="topnav" name="menu">
      <ul>
        <li><a class="<?= setActive($self, $home) ?>" href="<?= $host_path . "index.php" ?>" > <?php tr("HOME") ?> </a></li>
        <li><a class="<?= setActive($self, $company) ?>" href="<?= $host_path . "html/company.php" ?>" > <?php tr("COMPANY") ?> </a></li>
        <li><a class="<?= setActive($self, $travels) ?>" href="<?= $host_path . "html/travels.php" ?>" > <?php tr("TRAVELS") ?> </a></li>
        <li><a class="<?= setActive($self, $rockets) ?>" href="<?= $host_path . "html/rockets.php" ?>" > <?php tr("ROCKETS") ?> </a></li>
        <!-- login o, se loggato, username -->
        <li>  <?php
  if (isAuth()) {
      if (isAdmin()) {
  ?>
        <a class="<?= setActive($self, $admin) ?>" href="<?= $host_path . "user/privato.php" ?>"> <?php tr("ADMIN") ?> </a>
      <?php
      } else {
    ?>
        <a class="<?= setActive($self, $user) ?>" href="<?= $host_path . "user/privato.php" ?>">
        <?php echo strtoupper($username); ?> </a>
    <?php
  } ?>

      <!-- logout -->
      <a class="" href="<?= $host_path."user/logout.php?" ?>"><?php tr("LOGOUT") ?> </a>
  <?php
  } else {
  ?>
      <a href="javascript:void(0); "class="space-font topnav-login" onclick="toggleUser(0)"> <?php tr("LOGIN") ?> </a>
        </li>
      </ul>
            <!-- login form -->
            <?php
            if(!isAuth()){
      include($local_path . "user/login-form.php");
    }
  ?>
        <?php
  }
  ?>

  </nav>
</div>
