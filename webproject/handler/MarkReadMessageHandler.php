<?php
include_once '../log/Log.php';
include_once '../service/ContactUsService.php';

  $logger = new Log();

  if(isset($_POST['markReadBtn']) && ($_POST['contact_id'])){
    $contactService = new ContactUsService();
    $contactService->markAsRead($_POST['contact_id'],$logger);
    header("Location: DashboardHandler.php");
  }else{
    $logger->addInfoLog('[MarkContactAsReadHandler]-> contact_id not set, redirecting to home page');
    header('Location: ../view/index.php');
  }
  $logger->close();

 ?>
