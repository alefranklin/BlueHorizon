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

        <figure class="mySlides w3-animate-opacity" id="S1">
        <img src="img/Slideshow_1.jpg" alt="Sshow1">
        <figcaption><a href="javascript:void(0);" onclick="toggleUser(0)">↪ Join our space travel community!</a></figcaption>
        </figure>

        <figure class="mySlides w3-animate-opacity" id="S2">
        <img src="img/Slideshow_2.jpg" alt="Sshow2">
        <figcaption><a href="html/rockets.php">↪ See our space-ships!</a></figcaption>
        </figure>

        <figure class="mySlides w3-animate-opacity" id="S3">
        <img src="img/Slideshow_3.jpg" alt="Sshow3">
        <figcaption><a href="html/company.php">↪ Learn more about us!</a></figcaption>
        </figure>

        <figure class="mySlides w3-animate-opacity" id="S4">
        <img src="img/Slideshow_4.jpg" alt="Sshow4">
        <figcaption><a href="html/travels.php">↪ Book the flight of your dreams among our plentiful travel options</a></figcaption>
        </figure>

        <figure class="mySlides w3-animate-opacity" id="S5">
        <img src="img/Slideshow_5.jpg" alt="Sshow5">
        <figcaption><a href="html/infoplanet.php">↪ Take a look at some neat facts about the planets you're going to orbit around!</a></figcaption>
        </figure>

        <button class="w3-button w3-display-left" id="left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-display-right" id="right" onclick="plusDivs(+1)">&#10095;</button>
    </div>
</div>

<script>
  var myIndex = 0;
  carousel()
  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
     x[i].style.display="none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display="block";  
    setTimeout(carousel, 7000); // Change image every 2 seconds
  }
</script>

<script>
  var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>
<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
