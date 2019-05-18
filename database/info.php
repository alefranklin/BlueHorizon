<?php
  require "../utils/utility.php"; // includo il file di connessione al database

  if(isset($_GET['table'])) {
    // ottengo la sezione del sito da gestire
    $table = $db->real_escape_string($_GET['table']);
    $result = get_table_json($table);
  }
  else {
    $result = 0;
  }

  if ($result) {
    echo $result;
  }
  else {
    $msg = 6;
    smartRedir($msg);
    die();
  }

?>
