<?php
include_once 'DBConnection.php';

class BandRepository{
  private $connection;

  public function __constructor(){
  }

  public function getConnection(){
    $dbcon = new DBConnection();
    $this->connection = $dbcon->getConnection();
    return $this;
  }

  public function insertUser($bandId,$bandName,$description,$bandType,$email,$state,$city,$userid,Log $logger){
      $sql = "INSERT INTO Band (band_id,band_name,description,band_type,email,state,city,user_id)
                            values (:band_id,:band_name,:description,:band_type,:email,:state,:city,:user_id)";
      $statement = $this->connection->prepare($sql);
      $statement->bindParam(":band_id",$bandId);
      $statement->bindParam(":band_name",$bandName);
      $statement->bindParam(":description",$description);
      $statement->bindParam(":band_type",$bandType);
      $statement->bindParam(":email",$email);
      $statement->bindParam(":state",$state);
      $statement->bindParam(":city",$city);
      $statement->bindParam(":user_id",$userid);
      $statement->execute();
      $logger->addInfoLog("[BandRepository::insertUser]->Band [ id = $bandId , bandName = $bandName , description = $description , bandType = $bandType,
                          email = $email , state = $state , city = $city  ] inserted successfully");
  }

  public function updateDescription($bandId,$description){
    $sql = "UPDATE band set description = :description where band_id = :bandId ";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(':bandId',$bandId);
    $statement->bindParam(':description',$description);
    $statement->execute();
  }
}
?>
