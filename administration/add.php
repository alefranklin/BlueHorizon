<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/BlueHorizon/utils/utility.php"; // includo il file di connessione al database
    include 'functions.php';
    displayErrors();

    if (!isAdmin()) {
        $msg = 4;
        smartRedir($msg);
        die();
    }
    
    $PageTitle="Pannello Admin";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->
<?php }

    // definisco le variabili e le inizializzo vuote
    $departureErr = $arrivalErr = $dateErr = $descriptionErr = "";
    $departure = $arrival = $date = $description = "";
    
    $section = $db->real_escape_string($_GET['section']);
    
    pushVar($section);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        pushVar($section);

    	$error = false;
    	
        // partenza
        if (empty($_POST["departure"])) {
            $departureErr = "La partenza è necessaria";
            $error = true;
        } else {
            $departure = test_input($_POST["departure"]);
            // guardo se contiene solo lettere o numeri
            if (!preg_match("/^[a-zA-Z]*$/",$departure)) {
                $departureErr = "sono ammesse solo lettere";
                $error = true;
            }
        }
        
        // destinazione
        if (empty($_POST["arrival"])) {
            $arrivalErr = "La destinazione è necessaria";
            $error = true;
        } else {
            $arrival = test_input($_POST["arrival"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z]*$/",$arrival)) {
                $arrivalErr = "Only letters are allowed";
                $error = true;
            }
        }
        
        // date di partenza
        if (empty($_POST["date"])) {
            $dateErr = "La data di partenza è necessaria";
            $error = true;
        } else {
            $date = test_input($_POST["date"]);
            // check if name only contains letters and whitespace
            if (validateDate($date)) {
                $lastnamErr = "La data non è valida"; 
                $error = true;
            }
        }
        
        // descrizione
        if (empty($_POST["description"])) {
            $descriptionErr = "La descrizione è necessaria";
            $error = true;
        } else {
            $description = test_input($_POST["description"]);
            
            if(strlen($description) < 100) {
                $descriptionErr = $descriptionErr."Must be a minimum of 100 characters";
                $error = true;
            }
            
            if(strlen($description) > 65000) {
                $descriptionErr = $descriptionErr."Must be a maximum of 65000 characters";
                $error = true;
            }
        }
        
        //se non si sono verificati errori procedo con la registrazione dei dati
        if(!$error) {
            
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
            smartRedit($msg);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>
    
<h2>aggiungi viaggio</h2>
<p><span class="error">* required field</span></p>

<form name="form_manage_travels" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

    <div class="group">      
        <input type="text" name="departure" value="<?= $departure ?>" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <span class="error">* <?= $departureErr ?></span>
        <label>Departure</label>
    </div>

    <div class="group">      
        <input type="text" name="arrival" value="<?= $arrival ?>" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <span class="error">* <?= $arrivalErr ?></span>
        <label>Arrival</label>
    </div>

    <div class="group">      
        <textarea rows="10" cols="80" name="description" required><?= $description ?></textarea>
        <span class="highlight"></span>
        <span class="bar"></span>
        <span class="error">* <?= $descriptionErr ?></span>
        <label>Description</label>
    </div>

    <div class="group">      
        <input type="date" name="date" value="<?= $date ?>" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <span class="error">* <?= $dateErr ?></span>
        <label>Date</label>
    </div>

    <button>Aggiungi</button>

</form>

<!-- rimando alla pagina di amministrazione -->
Ritorn alla <a href="<?= $host_path."administration/admin.php" ?>" id="back">Pagina di Amministrazione</a>
        
<!-- footer -->
<?php include($local_path."html/footer.php"); ?>