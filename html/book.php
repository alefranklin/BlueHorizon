<?php
    session_start();
    include_once("../utils/utility.php");
    $PageTitle="Book";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php }

    $available_destination_query = "SELECT p.name, p.id from planets p, travels t WHERE t.id_planet = p.id and t.departure_date > CURRENT_DATE() order by p.id";
    $available_destination = get_query($available_destination_query);

    if(isset($_GET['planet'])){
    $available_date_query = "SELECT t.departure_date from travels t, planets p where t.id_planet = p.id and p.name = '".$_GET['planet']."' and t.departure_date > CURRENT_DATE()";
    $available_date = get_query($available_date_query);
    }
?>
<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>
<div id="body-page">
<br />
<br />
  <form>
          <?php if(isset($_GET['planet'])){
              echo $_GET['planet'];
          } else {?>
            <select id="book_planet">
            <option default>
              Select your destination
            </option>
            <?php while ($destination = $available_destination->fetch_assoc()){ ?>
                <option value="<?= $destination['name']?>">
                  <?php echo $destination['name']; ?>
                </option>
            <?php }?>
              </select>
          <?php }?>


          <?php if(isset($_GET['date'])){
              echo $_GET['date'];
          } else {?>
            <select id="book_date">
            <option default>
              Select your destination
            </option>
            <?php while ($date = $available_date->fetch_assoc()){ ?>
                <option value="<?= $date['departure_date']?>">
                  <?php echo $date['departure_date']; ?>
                </option>
            <?php }?>
              </select>
          <?php }?>

          <?php if(isset($_GET['adults']) || isset($_GET['kids'])){
              echo "Adults: ".$_GET['adults'];
              echo "Kids: ".$_GET['kids'];
          } else {?>
            <input type="number" min=0 max=4 id="adults_counter" placeholder="0" />
            <input type="number" min=0 max=4 id="kids_counter" />
            <a href="javascript:void(0); " onclick="get_people()">Aggiungi persone</a>
          <?php }?>
  </form>



</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
