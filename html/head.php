<?php include_once("../utils/config.php"); ?>

<!DOCTYPE html>
<html>
	<head>
        <!-- aggiungo tag generici -->
		<title><?= isset($PageTitle) ? $PageTitle : "Blue Horizon" ?></title>

		<!-- <base href="<?= $base_url ?>"> -->
        
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        
        <meta name="description" content="Vendita razzi">

        <meta name="keywords" content="space, rocket, sell">

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="<?= $base_url."style/animations.css" ?>">

        <link rel="stylesheet" type="text/css" href="<?= $base_url."style/style-small.css" ?>">

        <link rel="stylesheet" type="text/css" href="<?= $base_url."style/style-big.css" ?>">

        <link rel="stylesheet" type="text/css" href="<?= $base_url."style/style-medium.css" ?>">

        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="<?= $base_url."js/script.js" ?>"></script>
        
        <!-- aggiungo i tag specifici per la pagina -->
        <?php 
            if (function_exists('customPageHeader')) {
                customPageHeader();
            }
        ?>
    </head>
    
    <body>
        
<!doctype html>
<html>
  <head>
    
    
  </head>
  <body>