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
      $getplanet="SELECT t.departure_date from travels t, planets p where p.name='$destination' and t.id_planet = p.id;";
      $planet_result=mysqli_query($db, $getplanet);
      while($dates = $planet_result->fetch_assoc()){
        echo("<h1>".$dates['departure_date']."</h1>");
      }
    ?>

  </div>
</div>
