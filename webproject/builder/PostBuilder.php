<?php
namespace Post{
  class PostBuilder extends \Post{
    protected $postId;
    protected $userId;
    protected $post;

    public function build(){
      $post = new parent();
      $post->postId = $this->postId;
      $post->userId = $this->userId;
      $post->post = $this->post;
      return $post;
    }

    private function __construct(){

    }

    public static function builder(){
      return new PostBuilder();
    }

    public function postId($postId){
      $this->postId = $postId;
      return $this;
    }

    public function userId($userId){
      $this->userId = $userId;
      return $this;
    }

    public function post($post){
      $this->post = $post;
      return $this;
    }
  }
}
 ?>
