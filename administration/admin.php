<?php
    session_start();
    include_once "../utils/utility.php"; // includo il file di connessione al database

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
            <h1><?php tr("I tuoi dati sono") ?>:</h1>

            <?php foreach($_SESSION['user'] as $key => $value): ?>
            <?= $key . ' : ' . $value ?><br/>
            <?php endforeach; ?>
        </section>

        <section>
            <h1><?php tr("Lista utenti") ?>:</h1>
            <div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0">
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
            <table cellpadding="0" cellspacing="0" border="0">
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
            <a href="manage.php?action=add&section=user">
              <button class="blue-pill"><?php tr("Aggiungi") ?></button></a>
        </section>

        <section>
          <!--for demo wrap-->
          <h1><?php tr("Lista viaggi") ?>:</h1>
          <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
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
            <table cellpadding="0" cellspacing="0" border="0">
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
          <a href="manage.php?action=add&section=travel">
            <button class="blue-pill"><?php tr("Aggiungi") ?></button></a>
        </section>

        <section>
            <a href="<?= $host_path."user/logout.php" ?>">
              <button class="blue-pill">Logout</button></a>
        </section>
    <?php } ?>
</div>

<!-- footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="js/table.js"></script>

<?php include($local_path."html/footer.php"); ?>
