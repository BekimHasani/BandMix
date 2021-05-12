<?php
include_once '../entity/Musician.php';
include_once '../enumeration/Instruments.php';
include_once '../log/Log.php';

class MusicianValidator{

  private $errors;

  public function __construct($data){
    $this->errors = [];
    if(!isset($data['firstname'])){
      $this->errors += ['firstnameError' => 'Firstname is not set'];
    }
    if(!isset($data['lastname'])){
      $this->errors += ['lastnameError' => 'Lastname is not set'];
    }
    if(!isset($data['email'])){
      $this->errors += ['emailError' => 'Email is not set'];
    }
    if(!isset($data['state'])){
      $this->errors += ['stateError' => 'State is not set'];
    }
    if(!isset($data['city'])){
      $this->errors += ['cityError' => 'City is not set'];
    }
    if(!isset($data['instrument'])){
      $this->errors += ['instrumentError' => 'Instrument is not set'];
    }
  }

  public function validate(Musician $musician,Log $logger){

    $firstName = $musician->getFirstName();
    $lastName = $musician->getLastName();
    $email = $musician->getEmail();
    $state = $musician->getState();;
    $city = $musician->getCity();
    $instrument = $musician->getInstrument();
    $logger->addInfoLog("fristname = $firstName");
    $logger->addInfoLog("lastName = $lastName");
    $logger->addInfoLog("email = $email");
    $logger->addInfoLog("state = $state");
    $logger->addInfoLog("city = $city");
    $logger->addInfoLog("instrument = $instrument");




    $emailRgx = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';

    if(!ctype_alpha($firstName)){
      $this->errors += ['firstNameError' => 'First name must contain only characters'];
    }else if(strlen($firstName) < 3){
      $this->errors += ['firstNameError' => 'First name must contain at least 3 characters'];
    }else if(strlen($firstName) > 30 ){
      $this->errors += ['firstNameError' => 'First name must contain at most 30 characters'];
    }

    if(!ctype_alpha($lastName)){
      $this->errors += ['lastNameError' => 'Last name must contain only characters'];
    }else if(strlen($lastName) < 3){
      $this->errors += ['lastNameError' => 'Last name must contain at least 3 characters'];
    }else if(strlen($lastName) > 30 ){
      $this->errors += ['lastNameError' => 'Last name must contain at most 30 characters'];
    }

    if(!preg_match($emailRgx,$email)){
        $this->errors += ['emailError' => 'Invalid email format'];
    }

    if(!ctype_alpha($state)){
        $this->errors += ['stateError' => 'State must contain only characters'];
    }else if(strlen($state) < 3){
      $this->errors += ['stateError' => 'State name must contain at least 3 characters'];
    }else if(strlen($state) > 30 ){
      $this->errors += ['stateErrorw' => 'State name must contain at most 30 characters'];
    }

    if(!ctype_alpha($city)){
        $this->errors += ['cityError' => 'City must contain only characters'];
    }else if(strlen($lastName) < 3){
      $this->errors += ['cityError' => 'City must contain at least 3 characters'];
    }else if(strlen($lastName) > 30 ){
      $this->errors += ['cityError' => 'Citymust contain at most 30 characters'];
    }

    if(is_null(Instruments::getValueIfExist($instrument))){
        $this->errors += ['instrumentError' => 'Incorrect instrument type'];
    }


    return $this->errors;

  }

  public function getErrors(){
    return $this->errors;
  }

}
 ?>
