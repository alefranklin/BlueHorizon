<?php
    session_start();
    include "../utils/utility.php"; // includo il file di connessione al database
    include 'functions.php';

    if (!isAdmin()) {
        $msg = 4;
        smartRedir($msg);
        die();
    }



    $PageTitle="Pannello Admin";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->
        <style type="text/css">
            body {
                color: white;
            }
        </style>
<?php }

    // definisco le variabili e le inizializzo vuote
    $departureErr = $arrivalErr = $dateErr = $descriptionErr = "";
    $departure = $arrival = $date = $description = "";

    $section = $db->real_escape_string($_GET['section']);

    pushVar($section);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        pushVar($section);

        //se non si sono verificati errori procedo con la registrazione dei dati
        if(Controls($section)) { /*



            // scrivo sul DB
            $query = "INSERT INTO travels (departure, arrival, date, description)
            VALUES ('$departure','$arrival','$date','$description')";

            $ris_reg = $db->query($query) or die(mysqli_error()); // se la query fallisce

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
    }
?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<?php //print_r($_SESSION["var"][$section]); ?>

<?php form($section); ?>

<!-- rimando alla pagina di amministrazione -->
Ritorn alla <a href="<?= $host_path."administration/admin.php" ?>" id="back">Pagina di Amministrazione</a>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
