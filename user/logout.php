<?php
    session_start();
    include_once("../utils/config.php");
    session_destroy();
    header("location:".$host_path."?snackmsg=2");
    exit();
?>
