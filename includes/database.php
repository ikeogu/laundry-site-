<?php
include_once 'con_fig.php';
class MyPDO{
 
 private $connection;

  function __construct (){
    $this->open_connection();
  }

  public function open_connection(){
    try {
    $this->connection = new PDO (DNS,DB_USER,DB_PASS);
  } catch (PDOException $e){
    echo $e->getMessage();
  }
}

   public function  close_connetion(){
    $this->connection = null;
   }
   public function query ($sql){
    return $this->connection->query($sql);
   }
}

$database = new MyPDO();

?>