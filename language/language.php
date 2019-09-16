<?php
session_start();
include_once("../utils/utility.php");

$lang = $db->real_escape_string($_GET['lang']);
set_lang($lang);
smartRedir(7);
?>
