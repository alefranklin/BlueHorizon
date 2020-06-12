<?php
    session_start();
    include_once "../utils/utility.php"; // includo il file di connessione al database
    include_once "model_travel.php";
    include_once "model_user.php";

    if (!isAdmin()) {
        $msg = 4;
        smartRedir($msg);
        die();
    }

    $PageTitle="Pannello Admin";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->
        <link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php }
    $request = $_SERVER["REQUEST_METHOD"];

    // ottengo la sezione del sito da gestire
    // e l'id dell'elemento che sto modificando se sto modificando
    if ( $request == "GET") {
      $section = $db->real_escape_string($_GET['section']);
      $action = $db->real_escape_string($_GET['action']);
      $id = (isset($_GET['id'])) ? $db->real_escape_string($_GET['id']) : null;
    }
    if ($request == "POST") {
      $section = $db->real_escape_string($_POST['section']);
      $action = $db->real_escape_string($_POST['action']);
      $id = $db->real_escape_string($_POST['id']);
    }

    switch ($section) {
      case 'user':
        $model = new User($section, $action, $id);
        break;

      case 'travel':
        $model = new Travel($section, $action, $id);
        break;

      case 'order':
        $model = new Order($section,$action, $id);
        break;

      default:
        // code...
        break;
    }

    //elimina tupla selezionata
    if($_GET['action'] == 'delete'){
      $model->apply();
      smartRedir(5,$host_path."user/privato.php");
    }

    if ($request == "POST") {

        //se non si sono verificati errori procedo con la registrazione dei dati
        if($model->controls()) {
          $model->apply();
          smartRedir(5,$host_path."user/privato.php");
        }
    }
?>


<!-- head -->
<?php include($local_path."../html/head.php"); ?>
<?php include($local_path."../html/navbar.php"); ?>
<section>

  <h2><?= $model->title ?></h2>
  <p><span class="error"><?php tr("* required field");?></span></p>
  <form name="form_manage_data" method="post" action="manage.php">
    <?php $model->form(); ?>

  </form>
</section>

<!-- rimando alla pagina di amministrazione -->
 <a href="<?= $host_path."administration/admin.php" ?>" class="back-admin"><?php tr("Back");?></a>

<!-- footer -->
<?php include($local_path."../html/footer.php"); ?>
