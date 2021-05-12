<?php
include_once '../log/Log.php';
include_once '../service/UserService.php';

  $logger = new Log();

  if(isset($_POST['removeAdminBtn']) && ($_POST['user_id'])){
    $userService = new UserService();
    $userService->removeAdminPriviledges($_POST['user_id'],$logger);
    header("Location: DashboardHandler.php");
  }else{
    $logger->addInfoLog('[RemoveAdminHandler]-> user_id or removeAdminBtn not set, redirecting to home page');
    header('Location: ../view/index.php');
  }
  $logger->close();

 ?>
