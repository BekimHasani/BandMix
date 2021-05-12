<?php
include_once '../log/Log.php';
include_once '../service/PostService.php';

  $logger = new Log();
  $logger->addInfoLog("Handling post insert");
  if(isset($_POST['postBtn'])){
    $profileService = new PostService();
    $profileService->insertPost($_POST,$logger);
    header("Location: ../view/userProfile.php");
    $logger->close();
  }


  function getPostData($userId){
    $logger = new Log();
    $logger->addInfoLog("Handling geting posts");
    $postService = new PostService();
    $results = $postService->getAllPosts($userId, $logger);
    $logger->close();
    return $results;
  }
?>
