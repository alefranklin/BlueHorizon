<?php
    session_start();
    include_once "utils/utility.php"; // includo il file di connessione al database

    //se non c'è la sessione registrata
    if (!isAdmin()) {
        $msg = 4;
        smartRedir($msg);
        die();
    }

    $title = "Administration panel";

    $table_users = get_table('users');

    $travels_sql  = 'SELECT t.id as id, p.name as planet, r.name as rocket, t.departure_date as date, t.duration FROM planets p, rockets r, travels t WHERE t.id_rocket = r.id AND t.id_planet = p.id';
    $table_travels = get_query($travels_sql);

    $PageTitle="Administration panel";

    function customPageHeader() { ?>
        <!--Pannello di gestione-->
        <link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php } ?>

<!-- head -->
<?php include("html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include("html/navbar.php"); ?>
</div>

<div id="body-page" class="">
    <h1><?= $title; ?></h1>

    <?php if (isAuth()) { ?>

        <section>
            <h2><?php tr("I tuoi dati sono") ?>:</h2>

            <?php foreach($_SESSION['user'] as $key => $value): ?>
            <?= $key . ' : ' . $value ?><br/>
            <?php endforeach; ?>
        </section>

        <section>
            <h2><?php tr("Lista utenti") ?>:</h2>
            <div class="tbl-header">
              <table class="table-travel">
                <thead>
                <tr>
                    <th><?php tr("Username") ?></th>
                    <th><?php tr("Name") ?></th>
                    <th><?php tr("Lastname") ?></th>
                    <th><?php tr("Sex") ?></th>
                    <th><?php tr("Email") ?></th>
                    <th>Admin</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tbl-content">
            <table class="table-travel">
              <tbody>
                <?php while($user = $table_users->fetch_assoc()) { ?>
                <tr>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['sex'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['isAdmin'] ?></td>
                    <td><a href="manage.php?id=<?= $user['id'] ?>&action=edit&section=user">Edit</a></td>
                    <td><a href="manage.php?id=<?= $user['id'] ?>&action=delete&section=user">Delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <br>
            <a class="blue-pill" href="manage.php?action=add&section=user"><?php tr("Aggiungi") ?></a>
        </section>

        <section>
          <!--for demo wrap-->
          <h2><?php tr("Lista viaggi") ?>:</h2>
          <div class="tbl-header">
            <table class="table-travel">
              <thead>
                <tr>
                  <th>ID</th>
                  <th><?php tr("Destination") ?></th>
                  <th><?php tr("Rocket") ?></th>
                  <th><?php tr("Date") ?></th>
                  <th><?php tr("Duration") ?>(GG)</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tbl-content">
            <table class="table-travel">
              <tbody>

                <?php while($travel = $table_travels->fetch_assoc()) { ?>
                <tr>
                    <td><?= $travel['id'] ?></td>
                    <td><?= $travel['planet'] ?></td>
                    <td><?= $travel['rocket'] ?></td>
                    <td><?= date("Y-m-d", strtotime($travel['date'])) ?></td>
                    <td><?= $travel['duration'] ?></td>
                    <td><a href="manage.php?id=<?= $travel['id'] ?>&action=edit&section=travel">Edit</a></td>
                    <td><a href="manage.php?id=<?= $travel['id'] ?>&action=delete&section=travel">Delete</a></td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
          <br>
          <a class="blue-pill" href="manage.php?action=add&section=travel"><?php tr("Aggiungi") ?></a>
        </section>
          <br>
          <a class="blue-pill" href="user/logout.php">Logout</a>

    <?php } ?>
</div>

<!-- footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="js/table.js"></script>

<?php include("html/footer.php"); ?>
