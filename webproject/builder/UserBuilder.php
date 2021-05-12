<?php
namespace User{
  class UserBuilder extends \User {
    protected $userId;
    protected $username;
    protected $password;
    protected $role;

    public function build(){
      $user = new parent();
      $user->userId = $this->userId;
      $user->username = $this->username;
      $user->password = $this->password;
      $user->role = $this->role;
      return $user;
    }

    private function __construct(){

    }

    public static function builder(){
        return new UserBuilder();
    }

    public function userId($userId){
      $this->userId = $userId;
      return $this;
    }

    public function username($username){
      $this->username = $username;
      return $this;
    }

    public function password($password){
      $this->password = $password;
      return $this;
    }

    public function role($role){
      $this->role = $role;
      return $this;
    }
  }
}

 ?>
