<?php
include_once '../log/Log.php';
include_once '../service/UserService.php';

  $logger = new Log();

  if(isset($_POST['addAdminBtn']) && ($_POST['user_id'])){
    $userService = new UserService();
    $userService->addAdminPriviledges($_POST['user_id'],$logger);
    header("Location: DashboardHandler.php");
  }else{
    $logger->addInfoLog('[AddAdminHandler]-> user_id or addAdminBtn not set, redirecting to home page');
    header('Location: ../view/index.php');
  }
  $logger->close();

 ?>
