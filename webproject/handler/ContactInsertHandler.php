<?php
  include_once '../log/Log.php';
  include_once '../service/ContactUsService.php';

  $logger = new Log();
  if(isset($_POST['contactusBtn'])){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['description'])){
      $contactUsSerivce = new ContactUsService();
      $contactUsSerivce->insert($_POST,$logger);
    }else{
      $logger->$logger->addInfoLog('[ContactInsertHandler] Fields for adding contact are not set redirecting to contact us page');
    }
  }else{
    $logger->addInfoLog('[ContactInsertHandler] ContactUs button is not set redirecting to contact us page');
  }
  header("Location: ../view/contactUs.php");
  $logger->close();
  exit;

 ?>
