<?php
class DBConnection{

  private $dsn = 'mysql:host=localhost;dbname=webprojekti';
  private $username = 'root';
  private $password = 'root';
  private $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  );

  public function getConnection(){
    try{
      $connection = new PDO($this->dsn, $this->username, $this->password, $this->options);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo $e->getMessage();
      return null;
    }
    return $connection;
  }

}
?>
