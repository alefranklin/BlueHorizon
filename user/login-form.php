<?php
  $verifica = $host_path."user/verifica.php";
  $registration = $host_path."user/registration.php";
?>

<div>
    <h2><?php tr("Accedi") ?></h2>
    <div>
        <form id="login" action="<?= $verifica ?>" method="post">
            <label for="username" class="hide">Username o email</label>
                <input id="username" name="username" type="text" placeholder="Username" autofocus class="login-text">

            <label for="password" class="hide">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" class="login-text">
            <input type="submit" id="submit-login" value="Login" class="login-button">
        </form>
    </div>
    <span class="registration-link">
        <?php tr("Non hai un account?") ?> <a href="<?= $registration ?>"><?php tr("Registrati qui!") ?></a>
    </span>
</div>
