<?php
    session_start();

    //se non c'è la sessione registrata
    if (!$_SESSION['autorizzato']) echo "<h1>Area riservata, ACCESS DANIED 'TUUUPIDOOOO.</h1>";
    else echo "<h1>Benvenuto nell'area riservata utente rispettabile n° ".$_SESSION['user']['id']." </h1>";

    echo "<p><h3>I tuoi dati sono:</h3><br/>";
    foreach ($_SESSION['user'] as $key => $value) {
        print $key . ' : ' . $value . "<br/>" . PHP_EOL;
    }
    print 'autorizzato : ' . $_SESSION['autorizzato'] . "<br/>" . PHP_EOL;
    print 'admin : ' . $_SESSION['admin'] . "<br/>" . PHP_EOL;
    echo "</p>";
    echo "Per effettuare il logout clicca <a href='../login/logout.php'><font color='blue'>qui</font></a>";
?>
