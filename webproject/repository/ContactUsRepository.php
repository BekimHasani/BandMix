<?php
include_once '../log/Log.php';
include_once 'DBConnection.php';
class ContactUsRepository{

  private $connection;

  public function __construct(){}

  public  function getConnection(){
    $dbc = new DBConnection();
    $this->connection = $dbc->getConnection();
    return $this;
  }

  public function insert($contactId,$name,$email,$subject,$description,Log $logger){
    $sql = "INSERT into contacts (contact_id,contact_name,email,subject,description,status)
                                            VALUES (:contact_id,:name,:email,:subject,:description,:status)";
    $status = 0;
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(':contact_id',$contactId);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':email',$email);
    $statement->bindParam(':subject',$subject);
    $statement->bindParam(':description',$description);
    $statement->bindParam(':status',$status);
    $statement->execute();
    $logger->addInfoLog("[ContactUsRepository::insert]->Contact  [ name = $name , email = $email , subject = $subject , description = $description ] inserted successfully");
  }

  public function getAllContacts(){
    $sql = "SELECT * FROM contacts where status = 0 ";
    $statement = $this->connection->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public function updateContactStatus($contactId ){
    $sql = "UPDATE contacts set status = 1 where contact_id = :contactId ";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(':contactId',$contactId);
    $statement->execute();
  }
}
 ?>
