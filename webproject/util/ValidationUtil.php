<?php
class ValidationUtil{

  public function checkErrors($userErrors,$musicianErrors,Log $logger,$usertype){
    $errors = null;

    foreach ($musicianErrors as $key => $value) {
      $logger->addInfoLog("[$key => $value]");
    }

    if(!empty($userErrors) && !empty($musicianErrors) ){
        $errors = array_merge($userErrors,$musicianErrors);
      }
      if(empty($userErrors) && !empty($musicianErrors) ){
        $errors = $userErrors;
      }
      if(!empty($userErrors) && empty($musicianErrors) ){
        $errors = $musicianErrors;
      }
      if(!empty($errors)){
        $logger->addInfoLog("Validation Error:");
        session_start();
        $_SESSION['validationError'] = $usertype;

        foreach ($errors as $key => $value) {
          $_SESSION[$key] = $value;
          $logger->addInfoLog("[$key => $value]");
        }
        header('Location: ../view/signup.php');
        return $errors;
      }
      return null;
  }
}

 ?>
