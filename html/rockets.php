<html lang="it">
<?php
    include_once("../utils/config.php");
    $PageTitle="Rockets";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<body>
    <div id="header">
        <?php include($local_path."html/navbar.php"); ?>
    </div>
    <div id="body-page" class="">
    <i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>
					
	        <div id="rockets">
	        <h1> Our spacecrafts:</h1>
	        <dl>
	            <dt> Name 1 </dt>
	            <dd>
	                <img class="space-ship" src="../img/hyperion-shuttle.jpg" />
	                <p> description description description description description description
	                    description description description description description description
	                    description description description description description description
	                </p>
	            </dd>
	            <dt>Name 2</dt>
	            <dd>
	                <img class="space-ship" src="../img/ship2.png">
	                <p>
	                    description description description description description description
	                    description description description description description description
	                    description description description description description description
	                </p>
	            </dd>
	            <dt>Name 3</dt>
	            <dd>
	                <img class="space-ship" src="../img/ship3.jpeg">
	                <p>
	                    description description description description description description
	                    description description description description description description
	                    description description description description description description
	                </p>
	            </dd>
	        </dl>

	        </div>
				</div>

    </body>

<html>
