<?php
    session_start();

    //se non c'è la sessione registrata
    if (isset($_SESSION['user'])) {
        $auth = 1;
        $username = $_SESSION['user']['username'];
    }
    else {
        $auth = 0;
        $title = "Area riservata, ACCESS DANIED 'TUUUPIDOOOO";
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Blue Horizon </title>

		<base href="index.html">

		<meta name="description" content="Vendita razzi">
		<meta name="keywords" content="space, rocket, sell">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/animations.css">
        <link rel="stylesheet" type="text/css" href="style/style-small.css">
        <link rel="stylesheet" type="text/css" href="style/style-big.css">
        <link rel="stylesheet" type="text/css" href="style/style-medium.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="js/script.js"></script>
	</head>sx

    <body>
        <div id="header">
            <img id="logo" src="img/logo-placeholder.png">
            <nav id="menu" class="topnav"> <!-- <-screen reader stuff -->
                	<a class="active space-font" href="index.php" onclick="return false;"> HOME </a>
                    <a class="space-font" href="html/company.html"> COMPANY </a>
                    <a class="space-font" href="html/rockets.html"> ROCKETS </a>
                    <a class="space-font" href="html/travels.html"> TRAVELS </a>
                    
                    <!-- icona user o, se loggato, username -->
                    <?php if ($auth) { ?>
                        
                        <a class="space-font" href="user/privato.php"> <?= $username ?> </a>
                        
                    <?php } else { ?>
                        
                        <a href="javascript:void(0); "class="user-icon-container space-font" onclick="toggleUser(0)">
                            <i class="user-icon fas fa-user"></i>
                        </a>
                        
                        <!-- login form -->
                        <?php include("user/login.php"); ?>
                        
                    <?php } ?>
                    
                    <!-- icona hamburger -->
                    <a href="javascript:void(0);" class="icon" onclick="toggleHamburger()">
                        <i class="fa fa-bars"></i>
                    </a>
            </nav>
        </div>


        <!-- menu -->
        <div id="body-page" class="">
						<i onclick="topFunction()" id="scroll-back-btn" class="fas fa-arrow-circle-up"> </i>
						
            <div id="presentation">
                <h1 class="space-font"> BLUE <br> HORIZON </h1>
                <h2 class="space-font"> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </h2>
            </div>
        </div>

    </body>

<html>