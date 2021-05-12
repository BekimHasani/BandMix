<?php

namespace{
  class Post{

    protected $postId;
    protected $userId;
    protected $post;

    public function __construct(){
    }

    public function setPostId($postId){
      $this->postId = $postId;
    }

    public function getPostId(){
      return $this->postId;
    }

    public function getUserId(){
      return $this->userId;
    }

    public function setUserId($userId){
      $this->userId = $userId;
    }

    public function getPost(){
      return $this->post;
    }

    public function setPost($post){
      $this->post = $post;
    }
    public function __toString(){
      return "$this->username";
    }
  }
}
 ?>
