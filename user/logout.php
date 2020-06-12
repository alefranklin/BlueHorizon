<?php
    session_start();
    include_once("../utils/utility.php");
    $_SESSION = array();
    session_destroy();
    header("location:".$host_path."?snackmsg=2");
    exit();
?>
