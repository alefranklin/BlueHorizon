<?php
  /*
   * questo è il modello standard per poter creare le azioni di aggiunta, modifica ed eliminazione per qualsiasi parte del sito
   * è dotato di una interfaccia per standardizzare i metodi pubblici e
   * una classe astratta che implementa i meccanismi comuni che poi andranno ampliati nelle classi che la ereditano
   *
   * le possibili azioni sono:
   *    'edit'  : viene modificata una tupla gia esistente nel database
   *    'add'   : viene aggiunta una tupla all'interno del database
   *    'reg'   : è una sottosezione di 'add' per il caso della registrazione di un utente
   * il moedllo viene ricreato ogni volta che viene fatta una chiamata ad una pagina
   *
   */
  include_once "../utils/utility.php"; // includo il file di connessione al database

  interface Template {
    public function __construct($section, $action, $id);
    public function loadvar();
    public function apply(&$result);
    public function form();
    public function controls();
    public function json();
  }

  abstract class Model implements Template {

    protected $section;
    protected $action;
    protected $id;
    protected $var_name;
    protected $vars;

    public $title = "";
    private $msg_form_button;

    public function __construct($section, $action, $id=null) {
      $this->var_name = array();
      $this->vars = array();
      $this->section = $section;
      $this->action = $action;
      $this->id = $id;
      $this->vars['section'] = $this->section;
      $this->vars['action'] = $this->action;
      $this->vars['id'] = $this->id;
    }

    public function loadvar() {
      /* se la richiesta è get sono appena arrivato nella sezione manage e
         devo settare le variabili da usare */
      if($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($this->id)) {
          $this->vars = get_query($this->get_tupla())->fetch_assoc();
        }
        foreach ($this->var_name as $v) {
          if(!isset($this->vars[$v])) {
            $this->vars[$v] = "";
          }
        }

      }

      /* se la richiesta è post devo solo ricaricare le variabili gia impostate */
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        //carico le variabili settate nel form
        foreach ($_POST as $key => $value) {
          $this->vars[$key] = test_input($value);
        }
        // setto anche le variabili vuote per evitare errori
        foreach ($this->var_name as $v) {
          if (!isset($this->vars[$v])) {
            $this->vars[$v] = "";
          }
        }
      }

      $this->vars['section'] = $this->section;
      $this->vars['action'] = $this->action;

    }

    public function apply(&$result=null) {

      global $db;

      switch ($this->action) {
        case 'edit':
          $query = $this->edit();
          break;

        case 'add':
          $query = $this->add();
          break;

        case 'delete':
          // controllo se le variabili sono valide
          if (isset($this->id) && is_numeric($this->id)) {
            $query = $this->delete();
          }
          else {
            smartRedir(6);
          }
          break;

        default:
          $query = $this->default();
          die();
          break;
      }

      $result = $db->query($query) or die(mysqli_error($db));
      smartRedir(5);
      die();

    }

    public function form() {
      ?>
      <input type="text" name="id" value="<?= $this->vars['id'] ?>">
      <input type="hidden" name="section" value="<?= $this->vars['section'] ?>">
      <input type="hidden" name="action" value="<?= $this->vars['action'] ?>">
      <?php

      $this->_form();
    }

    public function json() {
      return json_encode($this->vars);
    }

    /* blocco di funzioni da ridefinire nelle classi figlie */

    abstract public function _form();

    abstract public function controls();

    abstract protected function get_tupla();

    abstract protected function add();

    abstract protected function edit();

    abstract protected function delete();

    abstract protected function default();

  }
?>
