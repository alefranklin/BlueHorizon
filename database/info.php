<?php
  require "../utils/utility.php"; // includo il file di connessione al database

  // ottengo la sezione del sito da gestire
  $table = $db->real_escape_string($_GET['table']);

  $query = "select * from $table";

  $result = $db->query($query) or die (mysqli_error());

  if (!$result) {
    $msg = 6;
    smartRedir($msg);
    die();
  }
  else {
    // creao la lista json da ritornare
    $arr = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($arr);
  }

?>
