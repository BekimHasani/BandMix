<?php
include_once '../entity/Post.php';

class PostValidator{

  private $errors;

  public function __construct($data){
    $errors = [];
    if(!isset($_POST['$userId'])){
      $errors += ['userId' => 'User id is not set'];
    }
    if(!isset($_POST['post'])){
      $errors += ['post' => 'POst is not set'];
    }
  }

  public function validate(Post $post){

    $errors = [];

    $userId = $post->getUserId();
    $postTxt = $post->getPost();

    if(is_null($userId)){
      $errors += ['userId' => 'Incorrect user id'];
    }

    if(is_null($userId)){
      $errors += ['$postTxt' => 'Post is not set'];
    }

    return $this->errors;
  }

  public function getErrors(){
    return $this->errors;
  }

}
 ?>
