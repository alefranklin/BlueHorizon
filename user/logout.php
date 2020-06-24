<?php
    session_start();
    include_once("../utils/utility.php");
    $_SESSION = array();
    session_destroy();
    header("location:../index.php?snackmsg=2");
    exit();
?>
