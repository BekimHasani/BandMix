<?php
include_once '../service/ContactUsService.php';
include_once '../enumeration/Role.php';
include_once '../log/Log.php';
include_once '../service/UserService.php';

  $logger = new Log();
  session_start();
  if(isset($_SESSION['admin'])){
      $contactService = new ContactUsService();
      $userService = new UserService();
      $contacts = $contactService ->getContacts($logger);
      $adminUsers = $userService ->getAdminUsers($logger);
      $_SESSION['contacts'] = $contacts;
      $_SESSION['adminUsers'] =  $adminUsers;
      header('Location: ../view/dashboard.php');
      $logger->close();
      exit;
   }else{
     $logger->addInfoLog("[DashboardHandler]-> Admin is not set, redirecting to home page");
   }
   header('Location: ../view/index.php');
   $logger->close();
 ?>
