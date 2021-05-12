<?php
include_once '../log/Log.php';
include_once '../service/UserService.php';
include_once '../util/HeaderUtil.php';

  $logger = new Log();

  if(isset($_POST['searchBtn'])){
    $searchInput = $_POST['searchInput'];
    $logger->addInfoLog($searchInput);
    if(strlen($searchInput) > 2){
      $userService = new UserService();
      $userService->searchUsers($_POST['searchInput'],$logger);
    }else{
      $logger->addInfoLog("[SearchUserHandler]-> searchInput length is not valid ".strlen($searchInput));
      header("Location: ../view/index.php");
    }
  }else{
    $logger->addInfoLog("[SearchUserHandler]-> searchBtn is not set redirecting to index");
    header("Location: ../view/index.php");
  }
  if(HeaderUtil::isLocationPresent($logger)){
    exit;
  }
  header("Location: ../view/search.php");

 ?>
