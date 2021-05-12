<?php
include_once '../log/Log.php';
include_once '../service/MusicianService.php';
include_once '../service/BandService.php';
include_once '../enumeration/UserType.php';
include_once '../util/HeaderUtil.php';

  $logger = new Log();
  session_start();

  if(isset($_POST['desriptionBtn']) && isset($_POST['description'])){
    if($_SESSION['userType'] == UserType::MUSICIAN ){
      $userService = new MusicianService();
      $userService->updateDescription($_POST['musician_id'],$_POST['description'],$logger);
    }else {
      $userService = new BandService();
      $userService->updateDescription($_POST['band_id'],$_POST['description'],$logger);
    }
  }else{
    $logger->addInfoLog('[UpdateDescriptionHandler]-> desriptionBtn or description not set, redirecting to home page');
    header('Location: ../view/index.php');
  }
  $logger->close();
  if(HeaderUtil::isLocationPresent($logger)){
    exit;
  }
  header("Location: ../view/userProfile.php");
 ?>
