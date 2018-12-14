<?php
    session_start();
    include_once("../utils/utility.php");
    $PageTitle="Rockets";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page" class="">

    <div id="rockets">
        <h1> Our spacecrafts:</h1>
        <dl>
            <dt> Name 1 </dt>
            <dd>
                <img class="space-ship" src="../img/hyperion-shuttle.jpg" alt="spacecrafts-1"/>
                <p> description description description description description description
                description description description description description description
                description description description description description description
                </p>
            </dd>

            <dt>Name 2</dt>
            <dd>
                <img class="space-ship" src="../img/ship2.png" alt="spacecrafts-2"/>
                <p>
                description description description description description description
                description description description description description description
                description description description description description description
                </p>
            </dd>

            <dt>Name 3</dt>
            <dd>
                <img class="space-ship" src="../img/ship3.jpeg" alt="spacecrafts-3"/>
                <p>
                description description description description description description
                description description description description description description
                description description description description description description
                </p>
            </dd>
        </dl>
    </div>

</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>
