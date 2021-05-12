<?php
  include_once '../entity/Post.php';
  include_once '../builder/PostBuilder.php';
  include_once '../validator/PostValidator.php';
  include_once '../repository/PostRepository.php';

  class PostService{

    private Post $post;
    private PostValidator $postValidator;

    public function __construct(){

    }

    public function insertPost($data, Log $logger){
      try{
        $errors = $this->initializePostValidator($data);
        if(!empty($errors)){
          $logger->addInfoLog("Validation Error");
          return $errors;
        }
        $post = Post\PostBuilder::builder()->userId($data['userId'])->post($data['post'])->build();

        $errors = $this->validatePost($post, $logger);
        if(!empty($errors)){
          $logger->addInfoLog("Validation Error");
          return $errors;
        }
        $postRepo = new PostRepository();

        $postId = uniqid();
        $postRepo->getConnection()->insertPost($postId,$post->getUserId(),$post->getPost(), $logger);
        $logger->addInfoLog("Post insertation successfully.");
      }catch(\Exception $e){
        $logger->addErrorLog("Excpetion on PostService __construct ".$e->getMessage());
      }
    }

    private function initializePostValidator($data){
      $this->postValidator = new PostValidator($data);
      return $this->postValidator->getErrors();

    }

    private function validatePost($post,$logger){
      $postErrors = $this->postValidator->validate($post);
      return $postErrors;
    }

    public function getAllPosts($userId, Log $logger){
      try {
        $postRepo = new PostRepository();
        $results = $postRepo->getConnection()->getAllPosts($userId, $logger);
        return $results;
      }catch(\Exception $e){
        $logger->addErrorLog("Excpetion on PostService getPosts ".$e->getMessage());
        return null;
      }
    }

  }

?>
