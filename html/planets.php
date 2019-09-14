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
    <form method="post" action="planets.php">
      <input type="hidden" name="planet" value="<?php echo $_POST['planet'];?>"/>
      <input type="hidden" name="date" value="<?php echo $_POST['date']?>"/>
      <label for="adults">Number of adults: </label>
      <input type="number" max="6" min="1" value="1" name="adults"/><br><br>
      <label for="childen">Number of children: </label>
      <input type="number" max="5" min="0" value="0" name="children"/>
      <input type="submit"/>
    </form>
<?php }?>
  </div>
</div>
