<?php
include_once 'DBConnection.php';
class MusicianRepository{

  private $connection;

  public function __construct(){}

  public  function getConnection(){
    $dbc = new DBConnection();
    $this->connection = $dbc->getConnection();
    return $this;
  }

  public function insertUser($musicianId,$firstname,$lastname,$email,$state,$city,$instrument,$userid,Log $logger){
      $sql = "INSERT INTO musician (musician_id,first_name,last_name,email,state,city,instrument,user_id)
                            values (:musician_id,:first_name,:last_name,:email,:state,:city,:instrument,:user_id)";
      $statement = $this->connection->prepare($sql);
      $statement->bindParam(":musician_id",$musicianId);
      $statement->bindParam(":first_name",$firstname);
      $statement->bindParam(":last_name",$lastname);
      $statement->bindParam(":email",$email);
      $statement->bindParam(":state",$state);
      $statement->bindParam(":city",$city);
      $statement->bindParam(":instrument",$instrument);
      $statement->bindParam(":user_id",$userid);
      $statement->execute();
      $logger->addInfoLog("Musician [ id = $musicianId , firstname = $firstname , lastname = $lastname ,
                          email = $email , state = $state , city = $city , instrument  ] inserted successfully");
  }

  public function updateDescription($musicianId,$description){
    $sql = "UPDATE musician set description = :description where musician_id = :musicianId ";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(':musicianId',$musicianId);
    $statement->bindParam(':description',$description);
    $statement->execute();
  }
}
?>
