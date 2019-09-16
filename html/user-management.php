<?php
  session_start();
  include_once("../utils/utility.php");

  if(isset($_POST["submit-login"])){
      verifica();
  }

  if(isset($_POST["logout"])){
      logout();
  }

  function logout(){
      $_SESSION = array();
      session_destroy(); //distruggo tutte le sessioni

      smartRedir(2);
      exit();
  }

  function verifica() {

  }
?>
