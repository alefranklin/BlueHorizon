<?php
    $verifica = $base_url."/user/verifica.php";
    $registration = $base_url."/user/registration.php";
?>

<div id="user-div" class="initial">
    <div>
        <form id="login" action="<?= $verifica ?>" method="post">

                <label for="username"> <p hidden> Username or email </p> <input id="username" name="username" type="text" placeholder="username" autofocus required value="admin" class="login-text"> </label>
                <label for="password"> <p hidden> Password </p> <input id="password" name="password" type="password" placeholder="Password" required value="root" class="login-text"> </label>
                <input type="submit" id="submit-login" value="Login" class="login-button">
        </form>
    </div>
    <span class="registration-link">
        Non hai un account? <a href="<?= $registration ?>"> Registrati qui!</a>
    </span>
</div>
