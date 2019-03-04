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
      $getplanet="SELECT name FROM images WHERE name=$destination";
      $planet_result=mysqli_query($db, $getplanet);
      $planet_name=$planet_result->fetch_object();
      echo("<h1>".$planet_name."</h1>")
    ?>  
    
    <img src="../img/planetph.jpg" alt="pianeta"/>
    <table id="flight-infos">
      <tr>
        <th> Date </th> 
        <th> Adult </th>
        <th> Child </th>
        <th> Group </th>
        <th> First-class </th>
        <th> Choose </th>
      </tr>
      <tr>
        <td> DDDD </td>
        <td> $$$$ </td>
        <td> $$$$ </td>
        <td> $$$$ </td>
        <td> $$$$ </td>
        <td> $$$$ </td>
      </tr>
    </table>      
    <p> description description description description description description description
    description description description description description description description
    description description description description description description description
    description description description description description description description
    description description description description description description description
    description description description description description description description
    </p>
  </div>
</div>
