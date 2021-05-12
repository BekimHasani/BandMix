<?php
  include_once '../util/UserTypeFactory.php';
  include_once '../entity/Musician.php';
  include_once '../service/MusicianService.php';
  include_once '../service/BandService.php';
  include_once '../entity/Band.php';
  include_once '../log/Log.php';
  include_once '../enumeration/UserType.php';
  include_once '../service/UserService.php';
  include_once '../util/HeaderUtil.php';

  $logger = new Log();
  $logger->addInfoLog("Handling signup request");
  if(isset($_POST['registerbtn'])){
    if(isset($_POST['usertype'])){
      $usertype = UserTypeFactory::getUserType($_POST['usertype']);
      $userService = new UserService();
      if($usertype == UserType::MUSICIAN){
          $musicianService = new MusicianService();
          $musicianService->insertMusicianUser($_POST,$logger);
          if(HeaderUtil::isLocationPresent($logger)){
            exit;
          }
          $userService->login($_POST,$logger);
          $logger->close();
          exit;
      }elseif($usertype == UserType::BAND){
        $logger->addInfoLog("Inside");
        $bandService = new BandService();
        $bandService->insertBandUser($_POST,$logger);
        if(HeaderUtil::isLocationPresent($logger)){
          exit;
        }
        $userService->login($_POST,$logger);
        $logger->close();
        exit;
      }else{
        $logger->addInfoLog('User type is not valid');
      }
    }else{
      $logger->addInfoLog('User type is not set');
    }
  }else{
    $logger->addInfoLog('Register btn is not set');
  }
  $logger->close();
  header("Location: ../view/signup.php");
  exit;
 ?>
