<?php
    session_start();
    include_once("../utils/utility.php");
    $PageTitle="Destination";

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
    <h1> Planet Name </h1>
    <img src="../img/planetph.jpg" alt="pianeta" />
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
