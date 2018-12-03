<?php 
    //$verifica = $_SERVER['DOCUMENT_ROOT']."/user/verifica.php"; 
    $verifica = "user/verifica.php";
    $registration = "user/registration.php"
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

<!-- Vecchio form di login per backup
<div>
<form id="login" action="verifica.php" method="post">
    <input id="username" name="email" type="email" placeholder="Email" required class="login-text">
    <input id="password" name="password" type="password" placeholder="Password" required class="login-text">
    <input type="submit" id="submit-login" value="Login" class="login-button">
</form>
<span class="registration-link">
    Non hai un account? <a href="html/registrazione.php"> Registrati qui!</a>
</span>
</div>
-->