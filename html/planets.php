<?php
    session_start();
    include_once("../utils/utility.php");
    $PageTitle="Destination";
    if (isset($_GET['planet']))
    {
      $destination= $_GET['planet'];
    };
    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page">
  <div id="planet-layout">
    <a href="travels.php" id="breadcrumb">← Return to Travels</a>
    <?php
      $passengers_error = false;
      if(isset($_POST['adults']) && isset($_POST['children'])){
        if(($_POST['adults'] + $_POST['children']) > 6 || $_POST['adults'] == 0){
          $passengers_error = true;
        }
      }
      if(!isset($_POST['date'])){
    ?>
    <form method="post" action="planets.php">
      <input type="hidden" name="planet" value="<?php echo $destination;?>"/>
      <select name="date">
    <?php
      $getplanet="SELECT t.departure_date from travels t, planets p where p.name='$destination' and t.id_planet = p.id;";
      $planet_result=mysqli_query($db, $getplanet);
      while($dates = $planet_result->fetch_assoc()){
        echo("<option value='".$dates['departure_date']."'>".$dates['departure_date']."</option>");
      }
    ?>
    </select>
    <input type="submit"/>
  </form>
<?php }
    if((isset($_POST['date']) && (!isset($_POST['adults']))) || (isset($_POST['adults']) && $passengers_error == true)) {
      if($passengers_error == true){
        echo "errore passeggeri";
      }?>
    <div id="book-date-form-div">
      <form method="post" action="planets.php">
        <input type="hidden" name="planet" value="<?php echo $_POST['planet'];?>"/>
        <input type="hidden" name="date" value="<?php echo $_POST['date']?>"/>
        <div id="passegers-div">
          <label for="adults">Number of adults: </label>
          <input type="number" max="6" min="1" value="1" name="adults"/><br><br>
          <label for="children">Number of children: </label>
          <input type="number" max="5" min="0" value="0" name="children"/>
        </div>
        <div id="cabin-div">
          <select name="cabin_type">
            <option value="1">Standard</option>
            <option value="2">Deluxe</option>
            <option value="3">Space Club</option>
          </select>
        </div>
        <input type="submit"/>
      </form>
    </div>
<?php }

    if(isset($_POST['cabin_type']) && $passengers_error == false){

      $total_passengers = $_POST['adults'] + $_POST['children'];
?>
    
  <?php

      $query = "SELECT t.duration as duration FROM travels t, planets p WHERE p.name = '".$_POST['planet']."' and t.departure_date = '2019-09-21' AND t.id_planet = p.id";
      $duration_result=mysqli_query($db, $query);
      $duration = $duration_result->fetch_assoc();
      $query = "SELECT priceCalc(".$_POST['adults'].",".$_POST['children'].",".$_POST['cabin_type'].",".$duration['duration'].") as price";
      $priceCalc_result = mysqli_query($db, $query);
      $price = $priceCalc_result->fetch_assoc();
      echo $price['price'];
      ?>

<?php }?>
  </div>
</div>
