<?php
    session_start();
    include("../utils/utility.php"); // includo il file di connessione al database

    //se non c'è la sessione registrata
    if (!isAdmin()) {
        $msg = 4;
        smartRedir($msg);
        die();
    }

    $title = "Benvenuto nell'area riservata (pannello del dio admin)";

    $table_users = get_table('users');
    $table_travels = get_table('travels');

    $PageTitle="Pannello Admin";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->
        <!--Pannello di gestione-->
        <link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php } ?>

<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page" class="">
    <h1><?= $title; ?></h1>

    <?php if (isAuth()) { ?>

        <section>
            <h1>I tuoi dati sono:</h1>

            <?php foreach($_SESSION['user'] as $key => $value): ?>
            <?= $key . ' : ' . $value ?><br/>
            <?php endforeach; ?>
        </section>

        <section>
            <h1>Lista utenti:</h1>
            <div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Sex</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
              <tbody>
                <?php while($user = $table_users->fetch_assoc()) { ?>
                <tr>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['sex'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><a href="manage.php?id=<?= $user['id'] ?>&section=edit-user">Edit</a></td>
                    <td><a href="delete.php?id=<?= $user['id'] ?>&table=users">Delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
            <a href="<?= $host_path."user/registration.php" ?>">Aggiungi</a>
        </section>

        <section>
          <!--for demo wrap-->
          <h1>Lista viaggi:</h1>
          <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
              <thead>
                <tr>
                  <th>Partenza</th>
                  <th>Arrivo</th>
                  <th>Data</th>
                  <th>Descrizione</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
              <tbody>

                <?php while($travel = $table_travels->fetch_assoc()) { ?>
                <tr>
                    <td><?= $travel['departure'] ?></td>
                    <td><?= $travel['arrival'] ?></td>
                    <td><?= date("Y-m-d", strtotime($travel['date'])) ?></td>
                    <td><?= $travel['description'] ?></td>
                    <td><a href="manage.php?id='<?= $travel['id'] ?>&section=edit-travel">Edit</a></td>
                    <td><a href="delete-travel.php?id=<?= $travel['id'] ?>&table=travels">Delete</a></td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
          <a href="manage.php?&section=add-travel">Aggiungi</a>
        </section>

        <section>
            Per effettuare il logout clicca <a href="<?= $host_path."user/logout.php" ?>"><font color='blue'>qui</font></a>
        </section>
    <?php } ?>
</div>

<!-- footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="js/table.js"></script>

<?php include($local_path."html/footer.php"); ?>
