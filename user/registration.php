<?php
    session_start();
    include_once "../administration/model_user.php";

    $PageTitle="Pagina registrazione";

    function customPageHeader() { ?>
        <!-- aggiungere tag specifici per questa pagina -->
    <?php }

    $request = $_SERVER["REQUEST_METHOD"];
    $model = new User('user', 'reg');

    if ($request == "POST") {

        //se non si sono verificati errori procedo con la registrazione dei dati
        if($model->controls()) {

            $ris_reg = "";
            $model->apply($ris_reg);

            //se la registrazione è andata a buon fine
            if(isset($ris_reg)) {
                $vars = $model->get_vars();
                get_user($vars["username"],$vars["password"]);
                smartRedir(6);
            }
        }
    }
?>

<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page">
  <section>
    <h2><?= $model->title ?></h2>
    <p><span class="error">* required field</span></p>
    <form name="form_registration" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

      <?php $model->form(); ?>

    </form>

    Ritorn alla <a href="<?= $host_path ?>" id="back">Home</a>
  </section>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
