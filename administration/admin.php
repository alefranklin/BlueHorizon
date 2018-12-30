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
        <link href="admin.css" rel="stylesheet" type="text/css" />

        <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous" />

        <link
      	rel="stylesheet"
      	href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css"
      	integrity="sha256-Eff0vTAskMNGMXDva8NMruf8ex6k9EuZ4QXf09lxwaQ="
      	crossorigin="anonymous" />

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" />

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

    <div class="container-table100">
			<div class="wrap-table100">

        <div class="table100 ver5 m-b-110">
          <div class="table100-head">
            <table>
              <thead>
                <tr class="row100 head">
                  <th class="cell100 column1">Class name</th>
                  <th class="cell100 column2">Type</th>
                  <th class="cell100 column3">Hours</th>
                  <th class="cell100 column4">Trainer</th>
                  <th class="cell100 column5">Spots</th>
                </tr>
              </thead>
            </table>
          </div>

          <div class="table100-body js-pscroll">
            <table>
              <tbody>
                <tr class="row100 body">
                  <td class="cell100 column1">Like a butterfly</td>
                  <td class="cell100 column2">Boxing</td>
                  <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                  <td class="cell100 column4">Aaron Chapman</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Mind & Body</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Adam Stewart</td>
                  <td class="cell100 column5">15</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Crit Cardio</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">9:00 AM - 10:00 AM</td>
                  <td class="cell100 column4">Aaron Chapman</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Wheel Pose Full Posture</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">7:00 AM - 8:30 AM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">15</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Playful Dancer's Flow</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Zumba Dance</td>
                  <td class="cell100 column2">Dance</td>
                  <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">20</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Cardio Blast</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Pilates Reformer</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Supple Spine and Shoulders</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">6:30 AM - 8:00 AM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">15</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Yoga for Divas</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">20</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Virtual Cycle</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">20</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Like a butterfly</td>
                  <td class="cell100 column2">Boxing</td>
                  <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                  <td class="cell100 column4">Aaron Chapman</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Mind & Body</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Adam Stewart</td>
                  <td class="cell100 column5">15</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Crit Cardio</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">9:00 AM - 10:00 AM</td>
                  <td class="cell100 column4">Aaron Chapman</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Wheel Pose Full Posture</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">7:00 AM - 8:30 AM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">15</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Playful Dancer's Flow</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Zumba Dance</td>
                  <td class="cell100 column2">Dance</td>
                  <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">20</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Cardio Blast</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Pilates Reformer</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">10</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Supple Spine and Shoulders</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">6:30 AM - 8:00 AM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">15</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Yoga for Divas</td>
                  <td class="cell100 column2">Yoga</td>
                  <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                  <td class="cell100 column4">Donna Wilson</td>
                  <td class="cell100 column5">20</td>
                </tr>

                <tr class="row100 body">
                  <td class="cell100 column1">Virtual Cycle</td>
                  <td class="cell100 column2">Gym</td>
                  <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                  <td class="cell100 column4">Randy Porter</td>
                  <td class="cell100 column5">20</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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

<!--===============================================================================================-->
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<!--===============================================================================================-->
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"
integrity="sha256-pOydVY7re8c1n+fEgg3uoslR/di9NMsOFXJ0Esf2xjQ="
crossorigin="anonymous"></script>

<script>
  $('.js-pscroll').each(function(){
    var ps = new PerfectScrollbar(this);

    $(window).on('resize', function(){
      ps.update();
    })
  });
</script>

<script src="js/main.js"></script>
<!--===============================================================================================-->

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
