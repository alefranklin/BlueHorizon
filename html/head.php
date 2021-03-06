<!DOCTYPE html>
<html lang=<?= $_SESSION['lang'] ?>>
	<head>
        <!-- aggiungo tag generici -->
		<title><?= isset($PageTitle) ? tr($PageTitle) : "Blue Horizon" ?></title>

		<!-- <base href="<?= $base_url ?>"> -->

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <meta name="description" content=<?php tr("Vendita razzi") ?>>

        <meta name="keywords" content="space, rocket, sell">

        <meta charset="UTF-8">

				<script src="<?= $host_path."js/script.js" ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?= $host_path."style/animations.css" ?>">

        <link rel="stylesheet" type="text/css" href="<?= $host_path."style/style-small.css" ?>">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link rel="stylesheet" href= "<?= $host_path."style/stampa.css"?>"  media="print"  type="text/css" />

        <link rel="stylesheet" type="text/css" href="<?= $host_path."style/style-big.css" ?>">

        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type='text/css'>

				<link
				rel="stylesheet"
				href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
				integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0="
				crossorigin="anonymous">

        <link
				rel="stylesheet"
				href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
				integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
				crossorigin="anonymous">

        <!-- carico i tag specifici -->
        <?php
            if (function_exists('customPageHeader')) {
                customPageHeader();
            }
        ?>
    </head>

    <?php
        if(isset($_GET['snackmsg'])) { ?>
            <body onload="snackMessage(<?= $_GET["snackmsg"] ?>)">
    <?php
        } else { ?>
            <body>
    <?php
        } ?>
