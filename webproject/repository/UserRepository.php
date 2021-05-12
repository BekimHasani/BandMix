<?php
include_once 'DBConnection.php';
class UserRepository{

  private $connection;

  public function __construct(){}

  public  function getConnection(){
    $dbc = new DBConnection();
    $this->connection = $dbc->getConnection();
    return $this;
  }

  public function insertUser($userId,$username,$password,$role,$userType,Log $logger){
      $sql = "INSERT INTO User (user_id,username,password,role,userType) values (:user_id,:username,:password,:role,:userType)";
      $password = password_hash($password, PASSWORD_DEFAULT);
      $statement = $this->connection->prepare($sql);
      $statement->bindParam(":user_id",$userId);
      $statement->bindParam(":username",$username);
      $statement->bindParam(":password",$password);
      $statement->bindParam(":role",$role);
      $statement->bindParam(":userType",$userType);
      $statement->execute();
      $logger->addInfoLog("User [ id = $userId , username = $username , password = $password , role = $role , userType = $userType ] inserted successfully");
  }

  public function loginMusician($username,$logger){
      $query = $this->connection->prepare("SELECT * FROM user left join musician
                                  ON user.user_id = musician.user_id where user.username = :username");
      $query->bindParam(':username',$username);
      $query->execute();
      return $query->fetch();
    }

    public function loginBand($username,$logger){
        $query = $this->connection->prepare("SELECT * FROM user left join band
                                    ON user.user_id = band.user_id where user.username = :username");
        $query->bindParam(':username',$username);
        $query->execute();
        return $query->fetch();
      }

      public function getAllAdminUsers(){
        $sql = "SELECT * FROM user left join musician
                                    ON user.user_id = musician.user_id where user.role = \"ADMIN\" ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
      }

      public function updateUserRoleToAdmin($userId){
        $sql = "UPDATE user set role = \"ADMIN\" where user_id = :userId ";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':userId',$userId);
        $statement->execute();
      }

      public function searchMusicianUsers($searchInput){
        $sql = "SELECT * FROM user left join musician
                                    ON user.user_id = musician.user_id where musician.first_name like \"".$searchInput."%\" ";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':firstname',$searchInput);
        $statement->execute();
        return $statement->fetchAll();
      }

      public function searchBandUsers($searchInput){
        $sql = "SELECT * FROM user left join band ON user.user_id = band.user_id where band.band_name like \"".$searchInput."%\" ";
          $statement = $this->connection->prepare($sql);
          $statement->execute();
          return $statement->fetchAll();
      }

      public function updateUserRoleToUser($userId){
        $sql = "UPDATE user set role = \"USER\" where user_id = :userId ";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':userId',$userId);
        $statement->execute();
      }
}
?>
