<?php
    session_start();
    include_once("utils/utility.php");

    $PageTitle="Blue Horizon";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>
<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<!-- menu -->
<div id="body-page" class="" role="main">
    <div id="presentation">
        <h1 class="space-font">Welcome space wanderer!</h1>
        <div class="mySlides"><img src="./img/Slideshow_1.jpg" alt="Sshow1">Join our space travel community!</div>
        <div class="mySlides"><img src="./img/Slideshow_2.jpg" alt="Sshow2">See our space-ships!</div>
        <div class="mySlides"><img src="./img/Slideshow_3.jpg" alt="Sshow3">Learn more about us!</div>
        <div class="mySlides"><img src="./img/Slideshow_4.jpg" alt="Sshow4">Book the flight of your dreams among our plentiful travel options</div>
        <div class="mySlides"><img src="./img/Slideshow_5.jpg" alt="Sshow5">Take a look at some neat facts about the planets you're going to orbit around!</div>
    </div>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>


<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
