<?php
    include_once("../utils/config.php");
ini_set('display_errors', 1);
    $verifica = $base_url."/user/verifica.php";
    $registration = $base_url."/user/registration.php";
?>

<div id="user-div" class="initial">
    <div>
        <form id="login" action="<?= $verifica ?>" method="post">
                <input id="username" name="username" type="text" placeholder="username" autofocus required value="admin" class="login-text">
                <input id="password" name="password" type="password" placeholder="Password" required value="root" class="login-text">
                <input type="submit" id="submit-login" value="Login" class="login-button">
        </form>
    </div>
    <span class="registration-link">
        Non hai un account? <a href="<?= $registration ?>"> Registrati qui!</a>
    </span>
</div>