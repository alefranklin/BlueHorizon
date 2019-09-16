<?php
    session_start();
    include_once("../utils/utility.php");
    set_lang();
    #displayErrors();
    $PageTitle="Company";

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
  <div id="company-content">
    <h1><?php tr("Our crew") ?></h1>

    <p><?php tr("Blue Horizon is an interplanetary flight company born back in 2103. Founders Matteo Pagotto, Manuel Pagotto, Alessandro Franchin and Stefano Baggio were classmates in University of Padua. They always have been passionate about space travelling and one day Matteo started to think about it in a more concrete way. His idea was to create a new concept of travelling, a new way to enjoy space voyages. His proposal didn't sound good to his colleagues to begin with, but after a few years of work Matteo finally drew the attention of Stefano, Manuel and Alessandro. When they started to work together the project started to grow way faster than before and finally in 2103 Blue Horizon became a real thing. From 2103 we made huge steps forward and now we are a solid choice for those who want to explore the galaxy!") ?>
    </p>
    <img src="../img/foundersPic.jpg" alt=<?php tr("First photo of the BlueHorizon's crew") ?> />
  </div>

  <div id="company-content">
    <h2> <?php tr("Contatti") ?> </h2>
    <ul >
      <li><a href="mailto:stefano.baggio@studenti.unipd.it"> Email <?php tr("of") ?> Stefano Baggio </a></li>
      <li><a href="mailto:alessandro.franchin.2@studenti.unipd.it"> Email <?php tr("of") ?> Alessandro Franchin </a></li>
      <li><a href="mailto:manuel.pagotto@studenti.unipd.it"> Email <?php tr("of") ?> Manuel Pagotto </a></li>
      <li><a href="mailto:matteo.pagotto@studenti.unipd.it"> Email <?php tr("of") ?> Matteo Pagotto </a></li>
    </ul>
  </div>
</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
