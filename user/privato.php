<?php
    session_start();

    //se non c'è la sessione registrata
    if ($_SESSION['autorizzato']) {
        $title = "Benvenuto nell'area riservata utente rispettabile n° ".$_SESSION['user']['id'];
    }
    else {
        $title = "Area riservata, ACCESS DANIED 'TUUUPIDOOOO";
        die;
    }
?>

<!DOCTYPE html>
<html>
<head>

    <title>Pannello Admin</title>

    <!--Pannello di gestione-->
    <link href="test.css" rel="stylesheet" type="text/css" />

</head>
<body>

    <h1><?= $title; ?></h1>
    
    <p>
        <h3>I tuoi dati sono:</h3><br/>

        <?php foreach($_SESSION['user'] as $key => $value): ?>
        <?= $key . ' : ' . $value ?><br/>
        <?php endforeach; ?>
        autorizzato : <?= $_SESSION['autorizzato']; ?><br/>
        admin : <?= $_SESSION['admin']; ?><br/>
    </p>
    
    <p>
        Per effettuare il logout clicca <a href='../login/logout.php'><font color='blue'>qui</font></a>
    </p>

</body>
</html>
