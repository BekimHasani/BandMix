<?php
include_once '../entity/User.php';
class UserValidator{

  private $errors ;

  public function __construct($data){
    $this->errors = [];
    if(!isset($data['username'])){
      $this->errors += ['username' => 'Username is not set'];
    }
    if(!isset($data['password'])){
      $this->errors += ['password' => 'Password is not set'];
    }
  }

  public function validate(User $user){
    $username = $user->getUsername();
    $password = $user->getPassword();
    $role = $user->getRole();

    $passRgx = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20}/';

    if(!ctype_alnum($username)){
      $this->errors += ['usernameError' => 'Username must contain only characters and numbers'];
    }else if(strlen($username) < 3){
      $this->errors += ['usernameError' => 'Username must contain at least 3 characters'];
    }else if(strlen($username) > 30 ){
      $this->errors += ['usernameError' => 'Username can contain at most 30 characters'];
    }

    if(strlen($password) < 6){
      $this->errors += ['passwordError' => 'Password must contain at least 6 characters'];
    }else if(strlen($password) > 20){
      $this->errors += ['passwordError' => 'Password can contain at 20 characters'];
    }else if(!preg_match($passRgx,$password)){
      $this->errors += ['passwordError' => 'Invalid password format'];
    }


    if(is_null(Role::getValueIfExist($role))){
      $this->errors += ['role' => 'Incorrect role type'];
    }

    return $this->errors;
  }

  public function getErrors(){
    return $this->errors;
  }
}
 ?>
