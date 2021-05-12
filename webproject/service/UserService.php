<?php
include_once '../validator/UserValidator.php';
include_once '../repository/UserRepository.php';
include_once '../enumeration/Role.php';

class UserService{

  private UserValidator $userValidator;
  private UserRepository $userRepository;

  public function __construct(){

  }

  public function login($data,Log $logger){
    try {
      $logger->addInfoLog("[UserSerive::login]");
      $this->userRepository = new UserRepository();
      $userType = $data['usertype'];
      session_start();
      if($userType == UserType::MUSICIAN){
        $user = $this->userRepository->getConnection()->loginMusician($data['username'],$logger);
      }else {
        $user = $this->userRepository->getConnection()->loginBand($data['username'],$logger);
      }
      if(!empty($user)){
        if(password_verify($data['password'], $user['password']) ){
          $logger->addInfoLog("[UserService::login] ->Valid user fetched adding user to session");
          $_SESSION['user_id'] = $user['user_id'];
          $_SESSION['username'] = $user['username'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['state'] = $user['state'];
          $_SESSION['city'] = $user['city'];
          $_SESSION['userType'] = $userType;
          $_SESSION['description'] = $user['description'];
          if($user['role'] == Role::ADMIN){
            $_SESSION['admin'] = $user['role'];
          }else{
            $_SESSION['user'] = $user['role'];
          }
          if($userType == UserType::MUSICIAN){
            $_SESSION['musician_id'] = $user['musician_id'];
            $_SESSION['firstname'] = $user['first_name'];
            $_SESSION['lastname'] = $user['last_name'];
            $_SESSION['instrument'] = $user['instrument'];
          }else{
            $_SESSION['band_id'] = $user['band_id'];
            $_SESSION['band_name'] = $user['band_name'];
            $_SESSION['band_type'] = $user['band_type'];
          }
          header("Location: ../view/userProfile.php");
          $logger->addInfoLog("[UserService::login]User".$user['username']." has successfully loged in");
          exit;
        }else{
          $logger->addInfoLog("[UserService::login] ->Invalid password for user [".$user['username']."]");
          $_SESSION['passwordMessage'] = 'Invalid password for user';
          $_SESSION['usernameValue'] = $data['username'];
        }
      }else{
        $logger->addInfoLog("[UserService::login] ->User with username = [".$user['username']."] does not exist");
        $_SESSION['usernameMessage'] = 'User does not exist';
      }
      header("Location: ../view/login.php");
    } catch (\Exception $e) {
      $logger->addInfoLog("[UserSerive::login]-> Exception: ".$e->getMessage());
      header("Location: ../view/login.php");
    }
  }

  public function getAdminUsers(Log $logger){
    try {
      $this->userRepository = new UserRepository();
      $users = $this->userRepository->getConnection()->getAllAdminUsers();
      $logger->addInfoLog('[UserService::getAdminUsers]-> Admin users fetched successfully');
      return $users;
    } catch (\Exception $e) {
        $logger -> addErrorLog('[UserService::getAdminUsers]-> Exception '.$e->getMessage());
    }
  }

  public function removeAdminPriviledges($userId,Log $logger){
    try {
      $this->userRepository = new UserRepository();
      $this->userRepository->getConnection()->updateUserRoleToUser($userId);
      $logger->addInfoLog('[UserService::getAdminUsers]-> User has beend successfully updated');
    } catch (\Exception $e) {
      $logger->addErrorLog('[UserService::getAdminUsers]-> Exception: '.$e->getMessage());
    }

  }

  public function addAdminPriviledges($userId,Log $logger){
    try {
      $this->userRepository = new UserRepository();
      $this->userRepository->getConnection()->updateUserRoleToAdmin($userId);
      $logger->addInfoLog('[UserService::addAdminPriviledges]-> User has beend successfully updated');
    } catch (\Exception $e) {
      $logger->addErrorLog('[UserService::addAdminPriviledges]-> Exception: '.$e->getMessage());
    }

  }

  public function searchUsers($searchInput, Log $logger){
    try {
      $this->userRepository = new UserRepository();
      $musicians = $this->userRepository->getConnection()->searchMusicianUsers($searchInput);
      $logger->addInfoLog('[UserService::searchUser]-> Musicians fetched successfully');

      $bands = $this->userRepository->getConnection()->searchBandUsers($searchInput);
      $logger->addInfoLog('[UserService::searchUser]-> Bands fetched successfully');

      $users = array();
      if(!empty($musicians) && !empty($bands) ){
          $users = array_merge($musicians,$bands);
      }else if(empty($musicians) && !empty($bands) ){
          $users = $bands;
      }else if(!empty($musicians) && empty($bands) ){
          $users = $musicians;
      }
      session_start();
      shuffle($users);
      $_SESSION['searchedUsers'] = $users;
      $logger->addInfoLog('[UserService::searchUser]-> User fetched successfully');
    } catch (\Exception $e) {
      $logger->addErrorLog('[UserService::searchUser]-> Exception: '.$e->getMessage());
    }
  }

}

 ?>
