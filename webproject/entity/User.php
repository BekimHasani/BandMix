<?php
namespace{
  class User{
    protected $userId;
    protected $username;
    protected $password;
    protected $role;

    public function __construct(){

    }

    public function getUserId(){
  		return $this->userId;
  	}

  	public function setUserId($userId){
  		$this->userId = $userId;
  	}

  	public function getUsername(){
  		return $this->username;
  	}

  	public function setUsername($username){
  		$this->username = $username;
  	}

  	public function getPassword(){
  		return $this->password;
  	}

  	public function setPassword($password){
  		$this->password = $password;
  	}

    public function setRole($role){
        $this->role = $role;
    }

    public function getRole(){
      return $this->role;
    }


    public function __toString(){
      return "$this->username";
    }
  }
}
 ?>
