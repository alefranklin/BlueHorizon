<?php
    session_start();
    include("../utils/utility.php"); // includo il file di connessione al database

    //se non è admin
    if (!isAdmin()) {
        $msg = 4;
        smartRedir($msg);
        die();
    }

    $title = "Benvenuto nell'area riservata sovrano indiscusso n° ".$_SESSION['user']['id']." del mondo";

    // TODO modificare get_table in modo da poter chiedere tutti o alcuni parametri

    $tables['users'] = get_table('users');
    $tables['travels'] = get_table('travels');
    $tables['planets'] = get_table('planets');

    $PageTitle="Pannello Admin";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->
        <!--Pannello di gestione-->
        <link href="test.css" rel="stylesheet" type="text/css" />

        <style type="text/css">
            body {
                color: black;
                background-color: white;
            }
            table {
                border-collapse: collapse;
            }

            tr {
                font-weight:bold;
                background-color: #efefef;
            }

            .glowing-border {
                border: 3px solid white;
                /*border-radius: 7px;*/
            }

            .glowing-border:hover {
                outline: none;
                border-color: #87c9ff;
                box-shadow: 0 0 10px #9ecaed;
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

    <div id="personali">
        <h3>I tuoi dati sono:</h3><br/>

        <?php foreach($_SESSION['user'] as $key => $value): ?>
        <?= $key . ' : ' . $value ?><br/>
        <?php endforeach; ?>

        <?php foreach($_SESSION['var']["travel"] as $key => $value): ?>
        <?= $key . ' : ' . $value ?><br/>
        <?php endforeach; ?>

    </div>

    <div id="users">
        <h3>Lista utenti:</h3><br/>

        <table>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Sex</th>
                <th>Email</th>
                <th>Admin</th>
            </tr>
            <?php while($row = $tables['users']->fetch_assoc()) { ?>
            <tr class="glowing-border">
                <td><?= $row['username'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['lastname'] ?></td>
                <td><?= $row['sex'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['isAdmin'] ?></td>
                <td><a href="manage.php?id='<?= $row['id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $row['id'] ?>&table=users">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="manage.php?section=add-user">Aggiungi</a>
    </div>

    <div id="travels">
        <h3>Lista viaggi:</h3><br/>

        <table>
            <tr>
                <th>Partenza</th>
                <th>Arrivo</th>
                <th>Data</th>
                <th>Descrizione</th>
            </tr>
            <?php while($row = $tables['travels']->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['departure'] ?></td>
                <td><?= $row['arrival'] ?></td>
                <td><?= date("Y-m-d", strtotime($row['date'])) ?></td>
                <td><?= $row['description'] ?></td>
                <td><a href="manage.php?id='<?= $row['id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $row['id'] ?>&table=travels">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="manage.php?section=add-travel">Aggiungi</a>
    </div>

    <div id="planets">
        <h3>Lista viaggi:</h3><br/>

        <table>
            <tr>
                <th>Nome</th>
                <th>Massa</th>
                <th>Temperatura</th>
                <th>Descrizine</th>
            </tr>
            <?php while($row = $tables['planets']->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['mass'] ?></td>
                <td><?= $row['temperature'] ?></td>
                <td><?= $row['info'] ?></td>
                <td><a href="manage.php?id='<?= $row['id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $row['id'] ?>&table=planets">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="manage.php?section=add-planet">Aggiungi</a>
    </div>

    <p>
        Per effettuare il logout clicca <a href="<?= $host_path."user/logout.php" ?>"><font color='blue'>qui</font></a>
    </p>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
