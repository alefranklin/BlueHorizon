<?php
    session_start();
include("../utils/connessione_db.php"); // includo il file di connessione al database

    //se non c'è la sessione registrata
    if ($_SESSION['autorizzato'] && $_SESSION['admin']) {
        $auth = 1;
        $title = "Benvenuto nell'area riservata sovrano indiscusso n° ".$_SESSION['user']['id']." del mondo";
        
        $users = get_table('users');
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
    
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        tr {
            font-weight:bold;
            background-color: lightgrey;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>

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
            <h3>Lista utenti:</h3><br/>

            <table>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Sex</th>
                    <th>Email</th>
                </tr>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['lastname']; ?></td>
                    <td><?= $user['sex']; ?></td>
                    <td><?= $user['email']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
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
