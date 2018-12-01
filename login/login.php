<?php include('../utils/config.php'); ?>
<!DOCTYPE html>
<html>
<head>

    <title>Collegati per amministrare il sito - <?php echo $sito_internet ?></title>

    <!--Pannello di gestione-->
    <link href="test.css" rel="stylesheet" type="text/css" />

</head>
<body>

    <form id="login" action="verifica.php" method="post">
        <fieldset id="inputs">
            <input id="username" name="username" type="text" placeholder="username" autofocus required value="admin">
            <input id="password" name="password" type="password" placeholder="Password" required value="root">
        </fieldset>
        <fieldset id="actions">
            <input type="submit" id="submit" value="Collegati">
            <a href="../index.php" id="back">Ritorna al sito</a>
        </fieldset>
    </form>

</body>
</html>
