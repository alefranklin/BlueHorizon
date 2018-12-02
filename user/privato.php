<?php
    session_start();

    //se non c'è la sessione registrata
    if ($_SESSION['autorizzato']) {
        $auth = 1;
        $title = "Benvenuto nell'area riservata utente rispettabile n° ".$_SESSION['user']['id'];
    }
    else {
        $auth = 0;
        $title = "Area riservata, ACCESS DANIED 'TUUUPIDOOOO";
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
    
    <?php if ($auth) { ?>
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
    <?php } else { ?>
        <p>
            Torna alla <a href='../index.php'><font color='blue'>Home</font></a>
        </p>
    <?php } ?>

</body>
</html>
