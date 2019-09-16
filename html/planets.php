<?php
session_start();
include_once("../utils/utility.php");
set_lang();
$PageTitle = "Destination";
if (isset($_GET['planet'])) {
    $destination = $_GET['planet'];
}
;
function customPageHeader()
{
?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php
}
?>


<!-- head -->
<?php
include($local_path . "html/head.php");
?>

<!-- body -->
<div id="header">
    <?php
include($local_path . "html/navbar.php");
?>
</div>

<div id="body-page">
  <div id="planet-layout">
    <a href="travels.php" id="breadcrumb"><?php
tr("← Return to Travels");
?></a>
    <?php
if (!isset($_POST['pagato'])) {
    if (!isset($_POST['date'])) {
?>
    <form method="post" action="planets.php">
      <input type="hidden" name="planet" value="<?php
        echo $destination;
?>"/>
      <select name="date">
    <?php
        $getplanet     = "SELECT t.departure_date,t.id from travels t, planets p where p.name='$destination' and t.id_planet = p.id AND departure_date > CURRENT_DATE";
        $planet_result = mysqli_query($db, $getplanet);
        while ($dates = $planet_result->fetch_assoc()) {
            echo ("<option value='" . $dates['departure_date'] . "'>" . $dates['departure_date'] . "</option>");
        }
?>
    </select>
    <input type="submit"/>
  </form>
<?php
    }
    if ((isset($_POST['date']) && (!isset($_POST['passengers'])))) {
?>
    <div id="book-date-form-div">
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
        <input type="submit"/>
      </form>
    </div>
<?php
    }

    if (isset($_POST['cabin_type']) && $_POST['passengers'] > 1 && !isset($_POST['name_guest1'])) {
?>
  <form method="post">
    <input type="hidden" name="planet" value="<?php
        echo $_POST['planet'];
?>"/>
    <input type="hidden" name="date" value="<?php
        echo $_POST['date'];
?>"/>
    <input type="hidden" name="passengers" value="<?php
        echo $_POST['passengers'];
?>"/>
    <input type="hidden" name="cabin_type" value="<?php
        echo $_POST['cabin_type'];
?>"/>


  <?php
        for ($i = 1; $i < $_POST['passengers']; $i = $i + 1) {
            echo "<label for=\"name_guest$i\">";
            tr("Nome ospite numero");
            echo " $i </label>";
            tr("(Solo lettere maiuscole o minuscole)");
            echo "<input type=\"text\" pattern =\"([a-z]*[A-Z]*)*\" name=\"name_guest$i\" required/><br>";
            echo "<label for=\"lastname_guest$i\">";
            tr("Cognome ospite numero");
            echo " $i </label>";
            tr("(Solo lettere maiuscole o minuscole)");
            echo "<input type=\"text\" pattern =\"([a-z]*[A-Z]*)*\" name=\"lastname_guest$i\" required/><br>";
        }
?>
  <input type="submit"/>
</form>

  <?php
    }

    if (isset($_POST['name_guest1']) || $_POST['passengers'] == 1) {
        echo "RESOCONTO<br>";
        echo "Numero totale passeggeri:  " . $_POST['passengers'] . "<br>";
        $guests[$_POST['passengers']];
        $guests[0]['name']     = $_SESSION['user']['name'];
        $guests[0]['lastname'] = $_SESSION['user']['lastname'];
        if ($_POST['passengers'] > 1) {
            for ($i = 1; $i < $_POST['passengers']; $i = $i + 1) {
                $guests[$i]['name']     = $_POST['name_guest' . $i];
                $guests[$i]['lastname'] = $_POST['lastname_guest' . $i];
            }
        }

        for ($i = 0; $i < $_POST['passengers']; $i = $i + 1) {
          if($i == 0){
            echo "Nome passeggero prenotante: " . $guests[$i]['name'] . "<br>";
            echo "Cognome passeggero prenotante: " . $guests[$i]['lastname'] . "<br>";
            echo "<br>";
          } else {
            echo "Nome ospite $i: " . $guests[$i]['name'] . "<br>";
            echo "Cognome ospite $i: " . $guests[$i]['lastname'] . "<br>";
            echo "<br>";
          }
        }

        echo "Destinazione: " . $_POST['planet'] . "<br>";
        echo "Data di partenza: " . $_POST['date'] . "<br>";

        $query        = "SELECT class FROM cabins where id = " . $_POST['cabin_type'];
        $cabin_result = mysqli_query($db, $query);
        $cabin        = $cabin_result->fetch_assoc();
        echo "Tipo di cabina: " . $cabin['class'] . "<br>";

        $query           = "SELECT t.duration as duration FROM travels t, planets p WHERE p.name = '" . $_POST['planet'] . "' and t.departure_date = '2019-09-21' AND t.id_planet = p.id";
        $duration_result = mysqli_query($db, $query);
        $duration        = $duration_result->fetch_assoc();

        echo "Durata viaggio: " . $duration['duration'] . "<br>";

        $query            = "SELECT priceCalc(" . $_POST['passengers'] . "," . $_POST['cabin_type'] . "," . $duration['duration'] . ") as price";
        $priceCalc_result = mysqli_query($db, $query);
        $price            = $priceCalc_result->fetch_assoc();
        echo "Prezzo totale: " . $price['price'] . "<br>";
?>
      <form method="post">
        <input type="hidden" name="id_user" value="<?php
        echo $_SESSION['user']['id'];
?>"/>

<?php
      $query = "SELECT t.id from travels t, planets p where p.name = '".$_POST['planet']."' and p.id = t.id_planet and t.departure_date = '".$_POST['date']."'";
      $travel_result = mysqli_query($db, $query);
      $travel = $travel_result->fetch_assoc();
 ?>
         <input type="hidden" name="id_travel" value="<?php
         echo $travel['id'];
        ?>"/>

        <input type="hidden" name="id_cabin" value="<?php
        echo $_POST['cabin_type'];
?>"/>
        <input type="hidden" name="passengers_number" value="<?php
        echo $_POST['passengers'];
?>"/>
        <input type="submit" name="pagato" value="Conferma e paga"/>
        <?php for($i = 1; $i < $_POST['passengers']; $i = $i + 1){
          echo "<input type =\"hidden\" name=\"data_guest$i\" value=\"".$guests[$i]['name']."*".$guests[$i]['lastname']."\"/>";
        }?>
      </form>
<?php
    }
} else {
    echo "PAGATO CON I SOLDI RUBATI<br>";
    $query = "INSERT INTO orders (id,id_user,id_travel,id_cabin,passengers_number) VALUES ";
    $query = $query."(NULL,'".$_POST['id_user']."','".$_POST['id_travel']."','".$_POST['id_cabin']."','".$_POST['passengers_number']."')";
    mysqli_query($db,$query);
    $query = "SELECT id FROM orders WHERE id_travel = ".$_POST['id_travel']." AND id_user = ".$_POST['id_user']." ORDER BY id DESC";
    $id_result = mysqli_query($db,$query);
    $id_order = $id_result->fetch_assoc();

    for($i = 1; $i < $_POST['passengers_number']; $i = $i + 1 ){
      $guest = explode('*',$_POST['data_guest'.$i]);

      $query_guest = "INSERT INTO guests (id,name,lastname) VALUES (NULL,'$guest[0]','$guest[1]')";
      mysqli_query($db,$query_guest);
      $query = "SELECT id FROM guests WHERE name='".$guest[0]."' and lastname='".$guest[1]."'";
      $id_guest_result = mysqli_query($db,$query);
      $id_guest = $id_guest_result->fetch_assoc();
      $query_guest_order = "INSERT INTO guest_order (id_guest,id_order) VALUES (".$id_guest['id'].",".$id_order['id'].")";
      mysqli_query($db,$query_guest_order);


    }



}
?>


  </div>
</div>
