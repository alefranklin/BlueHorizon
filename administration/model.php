<?php
  /*
   *  questo è il modello standard per poter creare le azioni di aggiunta, modifica ed eliminazione per qualsiasi parte del sito
   *  è dotato di una interfaccia per standardizzare i metodi pubblici ed
   *  una classe astratta che implementa i meccanismi comuni che poi andranno ampliati nelle classi che la ereditano
   *
   *  la sezione rappresenta la sezione del sito che vogliamo modificare
   *  è totalmente arbitraria perche gestita nel file manage.php ma c'è bisogno di saperla
   *  per poterla passare tramite richiesta POST
   *  in questo modo il moedllo viene ricreato ogni volta che viene fatta una chiamata alla pagina manage.php
   *
   *  per ogni sezione le possibili azioni sono:
   *    'edit'    : viene modificata una tupla gia esistente nel database
   *    'add'     : viene aggiunta una tupla all'interno del database
   *    'delete'  : viene eliminata una tupla dal database
   *    'default' : permette di creare delle azioni personalizzate (ad esempio la registrazione dell'utente che è una modifica dell'azione 'add')
   */
  include_once "utils/utility.php"; // includo il file di connessione al database

  interface Template {
    public function __construct($section, $action, $id);
    public function loadvar();
    public function apply(&$result);
    public function form();
    public function controls();
    public function json();
    public function get_vars();
  }

  abstract class Model implements Template {

    //  contengono le informazioni del contesto in cui sono
    //  per ricostruire il modello ad ogni richiesta GET o POST
    protected $section;
    protected $action;
    protected $id;

    //  array con i nomi delle variabili e dei possibili messaggi d'errore
    protected $var_name;

    //  array associativo con il valore di tutte le variabili e messaggi sempre aggiornato
    protected $vars;

    //  variabili per generare dinamicamente il titolo e il messaggio del pulsante nella pagina del form
    public $title = "";
    private $msg_form_button;

    public function __construct($section, $action, $id=null) {
      $this->var_name = array();
      $this->vars = array();
      $this->section = $section;
      $this->action = $action;
      $this->id = $id;
    }

    /*
     *  !!!
     *    questa funzione dovrà essere richiamata nel costruttore della classe figlia
     *    dopo la dichiarazione dei nomi delle variabili
     *  !!!
     *
     *  si occupa di aggiornare le variabili ed i messaggi di errore
     *  ad ogni richiesta GET o POST per ricreare l'oggetto
     *
     */
    public function loadvar() {
      /*
       *  se la richiesta è POST sono appena arrivato nella pagina manage e
       *  devo settare le variabili da usare
       */
      if($_SERVER["REQUEST_METHOD"] == "GET") {
        //  se l'id è settato mi occupo di recuperare i dati dal database
        if (isset($this->id)) {
          $this->vars = get_query($this->get_tupla())->fetch_assoc();
        }
      }

      //  se la richiesta è post devo solo ricaricare le variabili gia impostate
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        //carico le variabili settate nel form
        foreach ($_POST as $key => $value) {
          $this->vars[$key] = test_input($value);
        }
      }

      // ed inizializzo vuote le variabili che mancano
      foreach ($this->var_name as $v) {
        if (!isset($this->vars[$v])) {
          $this->vars[$v] = "";
        }
      }
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
          break;
      }
      global $host_path;
      $result = $db->query($query) or die(mysqli_error($db));
    }

    /*  permette di capire se la variabile è stata modificata e se c'è bisogno di effettuare il controllo
        su un determinato campo del form

        ritorna true se la variabile è stata modificata  se bisogna fare il controllo
                false se non è stata modificata oppure non serve fare il controllo

        i criteri per determinare il valore di riturno sono:

        'edit'  modifica  ritorno
        no      no        true
        no      si        true
        si      no        false
        si      si        true
     */
    protected function modified($db_var, $local_var=null) {

      if ($this->action == 'edit') {
        //  se local var non è settata allora le variabili si chiamano
        //  nello stesso modo
        if(!isset($local_var)) {
          $local_var = $db_var;
        }

        //  se il campo in fase di modifica è lasciato vuoto lo considero come non modificato
        if(empty($this->vars[$local_var])) { return false; }

        $tupla = get_query($this->get_tupla())->fetch_assoc();

        //  se non esiste nel database non serve fare il controllo e non è stata modificata
        if(!isset($tupla[$db_var])) { return false; }

        return ($tupla[$db_var] != $this->vars[$local_var]) ? true : false;
      }
      else {
        return true;
      }

    }

    public function form() {
      ?>
      <input type="hidden" name="id" value="<?= $this->id ?>">
      <input type="hidden" name="section" value="<?= $this->section ?>">
      <input type="hidden" name="action" value="<?= $this->action ?>">
      <?php

      $this->_form();

    }

    public function json() {
      return json_encode($this->vars);
    }

    public function get_vars() {
      return $this->vars;
    }

    /* blocco di funzioni da ridefinire nelle classi figlie */

    abstract public function _form();


    abstract public function controls();

    //  ritorna la query che restituisce la tupla desiderata
    abstract protected function get_tupla();

    abstract protected function add();

    abstract protected function edit();

    abstract protected function delete();

    abstract protected function default();

  }
?>
