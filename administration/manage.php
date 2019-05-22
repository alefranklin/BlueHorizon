<?php
    session_start();
    include_once "../utils/utility.php"; // includo il file di connessione al database
    include 'functions.php';
    include "forms.php";

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

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

      // ottengo la sezione del sito da gestire
      // e l'id dell'elemento che sto modificando se sto modificando
      $section = $db->real_escape_string($_GET['section']);
      $id = (isset($_GET['id'])) ? $db->real_escape_string($_GET['id']) : null;

      print_r($_SERVER["REQUEST_METHOD"]); //// DEBUG:

      // definisco le variabili richieste per la specifica sezione e le inizializzo vuote
      $vars = pushVar($section, $id);

      print_r($vars);

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $section = $db->real_escape_string($_POST['section']);
        $id = $db->real_escape_string($_POST['id']);

        // aggiorno le variabili di sezione
        $vars = pushVar($section, $id);

        //se non si sono verificati errori procedo con la registrazione dei dati
        if(Controls($section, $vars)) { /*



            // scrivo sul DB
            $query = "INSERT INTO travels (departure, arrival, date, description)
            VALUES ('$departure','$arrival','$date','$description')";

            $ris_reg = $db->query($query) or die(mysqli_error($db)); // se la query fallisce

echo "sono qua ";

            //se la registrazione è andata a buon fine
            if(isset($ris_reg)) {

                //TODO genera un messaggio sandwich

            }

            // rimando alla pagina di amministrazione
            header("location:".$host_path."administration/admin.php");

            deleteVar($section);
            $msg = 5;
            smartRedit($msg); */
        }
        print_r($vars);
    }
?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<?php //print_r($_SESSION["var"][$section]); ?>

<?php form($section, $vars); ?>

<!-- rimando alla pagina di amministrazione -->
Ritorn alla <a href="<?= $host_path."administration/admin.php" ?>" id="back">Pagina di Amministrazione</a>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
