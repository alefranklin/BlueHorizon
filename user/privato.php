<?php
    session_start();
    include_once("../utils/connessione_db.php"); //includo i file necessari a collegarmi al db
    include_once("../utils/config.php");

    //se non c'è la sessione registrata
    if ($_SESSION['autorizzato']) {
        
        if(isAdmin()) {
            header("location:".$host_path."administration/admin.php");
            die;
        }
        
        $auth = 1;
        $title = "Benvenuto nell'area riservata utente rispettabile n° ".$_SESSION['user']['id'];
    }
    else {
        $auth = 0;
        $title = "Area riservata, ACCESS DANIED 'TUUUPIDOOOO";
    }
    
    $PageTitle="Company";

    function customPageHeader() { ?>

        <!-- aggiungere tag specifici per questa pagina -->
        
        <!--Pannello di gestione-->
        <link href="<?= $host_path."user/test.css" ?>" rel="stylesheet" type="text/css" />

<?php } ?>


<!-- head -->
<?php include($local_path."html/head.php"); ?>

<!-- body -->
<div id="header">
    <?php include($local_path."html/navbar.php"); ?>
</div>

<div id="body-page" class="">
    
    <h1><?= $title; ?></h1>
    
    <?php if ($auth) { ?>
        <p>
            <h3>I tuoi dati sono:</h3><br/>

            <?php foreach($_SESSION['user'] as $key => $value): ?>
            <?= $key . ' : ' . $value ?><br/>
            <?php endforeach; ?>
            autorizzato : <?= $_SESSION['autorizzato']; ?><br/>
        </p>

        <p>
            Per effettuare il logout clicca <a href="<?= $host_path."user/logout.php" ?>"><font color='blue'>qui</font></a>
        </p>
        <p>
            Torna alla <a href="<?= $host_path ?>"><font color='blue'>Home</font></a>
        </p>
    <?php } else { ?>
        <p>
            Torna alla <a href="<?= $host_path ?>"><font color='blue'>Home</font></a>
        </p>
    <?php } ?>

</div>

<!-- footer -->
<?php include($local_path."html/footer.php"); ?>