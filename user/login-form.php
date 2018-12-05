<?php
ini_set('display_errors', 1);
    $verifica = $local_path."user/verifica.php";
    $registration = $local_path."user/registration.php";
?>

<div id="user-div" class="initial">
    <div>
        <form id="login" action="<?= $verifica ?>" method="post">
            <label for="username" class="hide">Username o email</label>
                <input id="username" name="username" type="text" placeholder="username" autofocus required value="admin" class="login-text">
            
            <label for="password" class="hide">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" required value="root" class="login-text" label="Password">
            <input type="submit" id="submit-login" value="Login" class="login-button">
        </form>
    </div>
    <span class="registration-link">
        Non hai un account? <a href="<?= $registration ?>"> Registrati qui!</a>
    </span>
</div>