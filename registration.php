<?php
    session_start();
    include("connessione_db.php"); // connessione al database
?>
<html>  
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h2>Registrazione</h2>   
        <form name="form_registration" method="post" action="registration.php">
            <br/>
            <p>Username: <input type="text" name="username_reg"></p>
            <br/>
            <p>Password: <input type="password" name="password_reg"></p>
            <br/>
            <p>Email: <input type="text" name="email_reg" ></p>
            <br/>
            <button>Registrati</button>
        </form>
        <a href="index.php" id="back">Ritorna al sito</a>
    <body>
</html>