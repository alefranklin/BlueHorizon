<?php
    session_start();
    include_once "../administration/model_user.php";
    include_once("../utils/utility.php"); //includo i file necessari a collegarmi al db

    //se non c'è la sessione registrata
    if (isAuth()) {

        if(isAdmin()) {
            $snackstring = "";
            if(isset($_GET['snackmsg']))  $snackstring = "?snackmsg=".$_GET['snackmsg'];
            header("location:".$host_path."administration/admin.php".$snackstring);
            die;
        }
        $title = "Benvenuto nella tua area riservata ".$_SESSION['user']['username'];
        $PageTitle="Pagina utente - ".$_SESSION['user']['username'];
    }
    else {
        $title = "Area riservata agli utenti";
    }

    $request = $_SERVER["REQUEST_METHOD"];
    $model = new User('user', 'edit', $_SESSION["user"]["id"]);

    if ($request == "POST") {
        //se non si sono verificati errori procedo con la modifica dei dati
        if($model->controls()) {
          $model->apply();

          $vars = $model->get_vars();
          $username = $vars["username"];
          $oldpass = $_SESSION["user"]["pwhash"];
          $passwd = (empty($vars["password"])) ? $oldpass : myhash($vars["password"]);
          get_user($username,$passwd, 1);

          smartRedir(5);
        }
    }


    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

        <!--Pannello di gestione-->
        <link href="<?= $host_path."user/test.css" ?>" rel="stylesheet" type="text/css" />

<?php } ?>

<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page" class="">

    <?php
      if ($request == "POST" or ($request == "GET" and isset($_GET["edit"])) ) { ?>

        <!-- se la pagina viene chiamata tramite post allora sono in modalita modifica -->
        <section>
          <h2><?= $model->title ?></h2>
          <p><span class="error"><?php tr("* required field") ?></span></p>
          <form name="form_user_modification" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

            <?php $model->form(); ?>

          </form>

          <?php tr("Ritorna alla") ?> <a href="<?= $host_path."user/privato.php" ?>" id="back"><?php tr("pagina privata") ?></a>
        </section>

      <?php } else { ?>

        <h1><?= $title; ?></h1>

        <?php if (isAuth()) { ?>
            <p>
                <h3>I tuoi dati sono:</h3><br/>
                <?php
                echo tr("Username").": ".$_SESSION['user']['username'];
                echo "<br>";
                echo tr("Name").": ".$_SESSION['user']['name'];
                echo "<br>";
                echo tr("Lastname").": ".$_SESSION['user']['lastname'];
                echo "<br>";
                echo tr("Sex").": ".$_SESSION['user']['sex'];
                echo "<br>";
                echo "Email: ".$_SESSION['user']['email'];
                echo "<br>";

                ?>
            </p>

            <section>
              <a href="<?= $host_path."user/privato.php?edit=1" ?>">
                <button class="blue-pill"><?php tr("Modifica Info") ?></button></a>
            </section>

            <?php $orders_query = "SELECT o.id, p.name as planet, r.name as rocket, c.class, o.passengers_number
                                   FROM orders o, planets p, rockets r, travels t, cabins c
                                   WHERE o.id_user = ".$_SESSION['user']['id'].
                                   " AND p.id = t.id_planet
                                   AND r.id = t.id_rocket
                                   AND t.id = o.id_travel
                                   AND o.id_cabin = c.id";

                  $orders_list = get_query($orders_query); ?>


            <section>
                <h1><?php tr("Lista viaggi:") ?></h1>
                <div class="tbl-header">
                  <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Destination</th>
                        <th>Rocket</th>
                        <th>Cabin Class</th>
                        <th>Number of passengers</th>

                    </tr>
                  </thead>
                </table>
              </div>
              <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                    <?php while($order = $orders_list->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['planet'] ?></td>
                        <td><?= $order['rocket'] ?></td>
                        <td><?= $order['class'] ?></td>
                        <td><?= $order['passengers_number'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </section>

            <br>
            <!--FINE PAGINA-->
            <section>
                <a href="<?= $host_path."user/logout.php" ?>">
                  <button class="blue-pill">Logout</button></a>
            </section>
        <?php } else { ?>
          <section>
              <a href="<?= $host_path?>">
                <button class="blue-pill">Home</button></a>
          </section>
        <?php } ?>

      <?php }
    ?>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
