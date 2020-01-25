<?php
session_start();
include_once ("../utils/utility.php");
set_lang();
$PageTitle = "Destination";
if (isset($_GET['planet'])) {
    $destination = $_GET['planet'];
};
function customPageHeader() {
?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php
}

$book = $local_path."html/book.php";
?>


<!-- head -->
<?php
include ($local_path . "html/head.php");
?>

<!-- body -->
<div id="header">
    <?php
include ($local_path . "html/navbar.php");
?>
</div>

<div id="body-page">
  <div id="planet-layout">
    <a href=<?= "travels.php?#".$destination ?> id="breadcrumb"><?php
tr("← Return to Travels");
?></a>
    <?php
if (!isset($_POST['pagato'])) {
    if (!isset($_POST['date'])) {
      if(!isset($_GET['planet'])){
        header("location:".$host_path."html/travels.php");
      }
?>



    <div id="book-date-form-div">
      <h2><?php tr("Prenota subito!");?></h2>
    <?php  $getplanet = "SELECT t.departure_date,t.id from travels t, planets p where p.name='$destination' and t.id_planet = p.id AND departure_date > CURRENT_DATE";
      $planet_result = mysqli_query($db, $getplanet);
      $dates = $planet_result->fetch_assoc();
      if(!$dates){
        tr("Nessuna data disponibile per questa destinazione");
      } else {
?>
    <form method="post" action="planets.php">
      <input type="hidden" name="planet" value="<?php
        echo $destination;?>"/>
      <?php

?>
    <label for="date"><?php tr("Date disponibili: ");?></label>
      <select name="date">
    <?php
        do{
            echo ("<option value='" . $dates['departure_date'] . "'>" . $dates['departure_date'] . "</option>");
        }while ($dates = $planet_result->fetch_assoc());
?>
    </select>
    <input type="submit" value="<?php tr("Invia");?>"/>
  </form>
<?php } ?>
  </div>
  <div id="planet-info">
    <?php
    global $db;
    $name_planet = (string)$_GET['planet'];
    $query = "SELECT * FROM planets WHERE name = '$name_planet'";

    $query_result = get_query($query);
    $planet= $query_result->fetch_assoc();

    echo tr("Nome").": ";
    tr($planet['name']);
    echo "<br>";
    echo tr("Informazioni").": ";
    tr($planet['info']);
    echo "<br>";
    echo "<br>";
    echo tr("Massa").": ".$planet['mass']."*10<sup>23</sup>Kg";
    echo "<br>";
    echo "<br>";
    echo tr("Temperatura").": ".$planet['temperature']."&degC";
    echo "<br>";
    echo "<br>";

    ?>
  </div>
<?php
    }
    if (isAuth() && isset($_POST['date'])) {
        if ((isset($_POST['date']) && (!isset($_POST['passengers'])))) {
?>
    <div id="passengers-cabin-book-div">
      <form method="post" action="planets.php">
        <input type="hidden" name="planet" value="<?php
            echo $_POST['planet'];
?>"/>
        <input type="hidden" name="date" value="<?php
            echo $_POST['date'];
?>"/>
        <div id="passengers-div">
          <label for="passengers"><?php
            tr("Number of passengers: ");
?></label>
          <input type="number" max="6" min="1" value="1" name="passengers"/><br><br>
        </div>
        <div id="cabin-div">
        <label for="cabin_type"><?php tr("Tipo di cabina: ");?></label>
          <select name="cabin_type">
            <option value="1"><?php
            tr("Standard");
?></option>
            <option value="2"><?php
            tr("Deluxe");
?></option>
            <option value="3"><?php
            tr("Space Club");
?></option>
          </select>
        </div>
        <input type="submit" value="<?php tr("Invia");?>"/>
      </form>
    </div>

<?php
        }
    }
    if (!isAuth() && isset($_POST['date'])) { ?>
      <div id="login-needed-div">
    <?php
          tr("Devi essere loggato per poter prenotare un viaggio");
          echo "<br>";
          tr("Effettua il login in alto a destra oppure ");
     ?> <a href="<?=$registration ?>"><?php tr("Registrati qui!") ?></a>
   </div>
<?php
    }
    if (isset($_POST['cabin_type']) && $_POST['passengers'] > 1 && !isset($_POST['name_guest1'])) {
?>
  <form method="post">
    <input type="hidden" name="planet" value="<?= $_POST['planet']; ?>"/>
    <input type="hidden" name="date" value="<?= $_POST['date']; ?>"/>
    <input type="hidden" name="passengers" value="<?= $_POST['passengers']; ?>"/>
    <input type="hidden" name="cabin_type" value="<?= $_POST['cabin_type']; ?>"/>


  <?php
        for ($i = 1;$i < $_POST['passengers'];$i = $i + 1) {
            echo "<div class=\"guests-div\">";
            echo "<label for=\"name_guest$i\">";
            tr("Nome ospite numero");
            echo " $i <br></label>";
            tr("(Solo lettere maiuscole o minuscole)");
            echo "<input type=\"text\" pattern =\"([a-z]*[A-Z]*)*\" name=\"name_guest$i\" required/><br><br>";

            echo "<label for=\"lastname_guest$i\">";
            tr("Cognome ospite numero");
            echo " $i <br></label>";
            tr("(Solo lettere maiuscole o minuscole)");
            echo "<input type=\"text\" pattern =\"([a-z]*[A-Z]*)*\" name=\"lastname_guest$i\" required/><br>";
            echo "</div>";
        }
?>
  <input type="submit" value="<?php tr("Invia");?>"/>
</form>

  <?php
    }
    if (isset($_POST['passengers'])) {
        if (isset($_POST['name_guest1']) || $_POST['passengers'] == 1) {
            echo "<h1>";
            tr("Resoconto");
            echo "</h1><br>";
            echo "<div id=\"checkout-div\">";
            tr("Numero totale passeggeri");
            echo ": ".$_POST['passengers'] . "<br>";
            $guests[0]['name'] = $_SESSION['user']['name'];
            $guests[0]['lastname'] = $_SESSION['user']['lastname'];
            if ($_POST['passengers'] > 1) {
                for ($i = 1;$i < $_POST['passengers'];$i = $i + 1) {
                    $guests[$i]['name'] = $_POST['name_guest' . $i];
                    $guests[$i]['lastname'] = $_POST['lastname_guest' . $i];
                }
            }
            for ($i = 0;$i < $_POST['passengers'];$i = $i + 1) {
                if ($i == 0) {
                    tr("Nome passeggero prenotante");
                    echo ": ".$guests[$i]['name'] . "<br>";
                    tr("Cognome passeggero prenotante");
                    echo ": ".$guests[$i]['lastname'] . "<br>";
                    echo "<br>";
                } else {
                    tr("Nome ospite");
                    echo " $i: ".$guests[$i]['name'] . "<br>";
                    tr("Cognome ospite");
                    echo " $i: ".$guests[$i]['lastname'] . "<br>";
                    echo "<br>";
                }
            }
            tr("Destinazione");
            echo ": ".$_POST['planet'] . "<br>";
            tr("Data di partenza");
            echo ": ".$_POST['date'] . "<br>";
            $query = "SELECT class FROM cabins where id = " . $_POST['cabin_type'];
            $cabin_result = mysqli_query($db, $query);
            $cabin = $cabin_result->fetch_assoc();
            tr("Tipo di cabina");
            echo ": ". $cabin['class'] . "<br>";
            $query = "SELECT t.duration as duration FROM travels t, planets p WHERE p.name = '" . $_POST['planet'] . "' and t.departure_date = '".$_POST['date']."' AND t.id_planet = p.id";
            $duration_result = mysqli_query($db, $query);
            $duration = $duration_result->fetch_assoc();
            tr("Durata viaggio");
            echo ": ".$duration['duration'].   " ";
            $query = "SELECT priceCalc(" . $_POST['passengers'] . "," . $_POST['cabin_type'] . "," . $duration['duration'] . ") as price";
            $priceCalc_result = mysqli_query($db, $query);
            $price = $priceCalc_result->fetch_assoc();
            echo " " tr("giorni");
            tr("Prezzo totale");
            echo ": ". $price['price'] . "<br>";
?>
      <form method="post" action="<?= $book;?>">
        <input type="hidden" name="id_user" value="<?php
            echo $_SESSION['user']['id'];
?>"/>

<?php
            $query = "SELECT t.id from travels t, planets p where p.name = '" . $_POST['planet'] . "' and p.id = t.id_planet and t.departure_date = '" . $_POST['date'] . "'";
            $travel_result = mysqli_query($db, $query);
            $travel = $travel_result->fetch_assoc();
?>
         <input type="hidden" name="id_travel" value="<?= $travel['id']; ?>"/>
        <input type="hidden" name="id_cabin" value="<?= $_POST['cabin_type']; ?>"/>
        <input type="hidden" name="passengers_number" value="<?= $_POST['passengers']; ?>"/>
<br><br>
        <div id="payment-alert"><?php tr("Attenzione! Una volta confermata questa prenotazione non sará annullabile o rimborsabile");?></div>
        <input type="submit" name="pagato" value="<?php tr("Conferma e paga");?>"/>
        <?php for ($i = 1;$i < $_POST['passengers'];$i = $i + 1) {
                echo "<input type =\"hidden\" name=\"data_guest$i\" value=\"" . $guests[$i]['name'] . "*" . $guests[$i]['lastname'] . "\"/>";
            } ?>
      </form>
<?php
      echo "</div>";
        }
    }
}
?>


  </div>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
