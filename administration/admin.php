<?php
    session_start();
    include("../utils/connessione_db.php"); // includo il file di connessione al database
    include_once("../utils/config.php");

    //se non c'è la sessione registrata
    if ($_SESSION['autorizzato'] && isAdmin()) {
        $auth = 1;
        $title = "Benvenuto nell'area riservata sovrano indiscusso n° ".$_SESSION['user']['id']." del mondo";

        $table_users = get_table('users');
        $table_travels = get_table('travels');
    }
    else {
        $auth = 0;
        $title = "Area riservata - ACCESS DENIED";
    }
    
    $PageTitle="Pannello Admin";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->
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

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page" class="">
    <h1><?= $title; ?></h1>

    <?php if ($auth) { ?>

        <p>
            <h3>I tuoi dati sono:</h3><br/>

            <?php foreach($_SESSION['user'] as $key => $value): ?>
            <?= $key . ' : ' . $value ?><br/>
            <?php endforeach; ?>
            <?= 'auth : ' . $auth ?><br/>
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
                <?php while($user = $table_users->fetch_assoc()) { ?>
                <tr>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['sex'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><a href="edit-user.php?id='<?= $user['id'] ?>">Edit</a></td>
                    <td><a href="delete-user.php?id=<?= $user['id'] ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
            <a href="<?= $host_path."user/registration.php" ?>">Aggiungi</a>
        </p>

        <p>
            <h3>Lista viaggi:</h3><br/>

            <table>
                <tr>
                    <th>Partenza</th>
                    <th>Arrivo</th>
                    <th>Data</th>
                    <th>Descrizione</th>
                </tr>
                <?php foreach($table_travels as $travel): ?>
                <tr>
                    <td><?= $travel['departure'] ?></td>
                    <td><?= $travel['arrival'] ?></td>
                    <td><?= date("Y-m-d", strtotime($travel['date'])) ?></td>
                    <td><?= $travel['description'] ?></td>
                    <td><a href="edit-travel.php?id='<?= $travel['id'] ?>">Edit</a></td>
                    <td><a href="delete-travel.php?id=<?= $travel['id'] ?>">Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <a href="add-travel.php">Aggiungi</a>
        </p>

        <p>
            Per effettuare il logout clicca <a href="<?= $host_path."user/logout.php" ?>"><font color='blue'>qui</font></a>
        </p>
    <?php } ?>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>