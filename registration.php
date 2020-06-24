<?php
    session_start();
    include_once "administration/model_user.php";

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
                smartRedir(5,"privato.php");
            } else {
              smartRedir(6);
            }
        }
    }
?>

<!-- head -->
<?php include("html/head.php") ?>

<!-- body -->
<div id="header">
    <?php include("html/navbar.php"); ?>
</div>

<div id="body-page">
  <section>
    <h2><?= tr($model->title); ?></h2>
    <form name="form_registration" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

      <span class="error"><?php tr("* required field") ?></span>
      <?php $model->form(); ?>

    </form>
    <?php tr("Ritorna alla") ?> <a href="index.php" id="back">Home</a>
  </section>
</div>

<!-- footer -->
<?php include("html/footer.php"); ?>