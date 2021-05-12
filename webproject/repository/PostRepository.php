<?php
include_once 'DBConnection.php';

class PostRepository{
  private $connection;

  public function __constructor(){
  }

  public function getConnection(){
    $dbcon = new DBConnection();
    $this->connection = $dbcon->getConnection();
    return $this;
  }

  public function insertPost($postId,$userId,$post,Log $logger){
      $sql = "INSERT INTO Post (post_id,user_id,post, post_date)
                            values (:post_id,:user_id,:post,:post_date)";
      $statement = $this->connection->prepare($sql);
      $statement->bindParam(":post_id",$postId);
      $statement->bindParam(":user_id",$userId);
      $statement->bindParam(":post",$post);
      $statement->bindParam(":post_date",date("Y/m/d"));
      $statement->execute();
      $logger->addInfoLog("[PostRepository::insertPost]->Post [ id = $postId , userId = $userId , post = $post ] inserted successfully");
  }

  public function getAllPosts($userId, Log $logger){
    $statement = $this->connection->prepare( "SELECT * FROM Post WHERE user_id = :userId ");
    $statement->bindParam(":userId",$userId);
    $results = array();
    $statement->execute();
    while( $rows = $statement->fetch(PDO::FETCH_ASSOC)){
      $results[] = $rows;
    }
    return $results;
  }
}
?>
