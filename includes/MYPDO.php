<?php
include_once 'con_fig.php';
class MyPDO{
 
 protected $connection;

  function __construct (){
    $this->open_connection();
  }

  protected function open_connection(){
    try {
    $this->connection = new PDO (DNS,DB_USER,DB_PASS);
  } catch (PDOException $e){
    echo $e->getMessage();
  }
}

   protected function close_connetion(){
    $this->connection = null;
   }
   
}

?>