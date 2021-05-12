<?php
  include_once '../log/Log.php';
  include_once '../entity/Musician.php';
  include_once '../util/UserTypeFactory.php';
  include_once '../enumeration/UserType.php';
  include_once '../service/UserService.php';


  $logger = new Log();

  if(isset($_POST['signin'])){
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['usertype'])){
        $userService = new UserService();
        $userService->login($_POST,$logger);
        $logger->close();
        exit;
    }else{
      $logger->addInfoLog('[LoginHandler] Fields for login are not set redirecting to login page');
    }
  }else{
    $logger->addInfoLog('[LoginHandler] Signin button is not set redirecting to login page');
  }
  $logger->close();
  header("Location: ../view/login.php");
  exit;

 ?>
