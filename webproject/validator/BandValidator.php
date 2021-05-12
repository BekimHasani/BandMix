<?php
include_once '../entity/Band.php';
include_once '../enumeration/BandType.php';

class BandValidator{

  private $errors;

  public function __construct($data){
    $this->errors = [];
    if(!isset($_POST['bandName'])){
      $this->errors += ['bandNameError' => 'Band name is not set'];
    }
    if(!isset($_POST['bandType'])){
        $this->errors += ['bandTypeError' => 'Band type is not set'];
    }
    if(!isset($_POST['email'])){
      $this->errors += ['bandEmailError' => 'Email is not set'];
    }
    if(!isset($_POST['state'])){
      $this->errors += ['bandStateError' => 'State is not set'];
    }
    if(!isset($_POST['city'])){
      $this->errors += ['bandCityError' => 'City is not set'];
    }

  }

  public function validate(Band $band){

    $bandName = $band->getBandName();
    $bandType = $band->getBandType();
    $email = $band->getEmail();
    $state = $band->getState();
    $city = $band->getCity();

    $emailRgx = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';

    if(!ctype_alnum($bandName)){
      $this->errors += ['bandNameError' => 'Band name must contain only characters and numbers'];
    }else if($bandName < 3){
      $this->errors += ['bandNameError' => 'Band name must contain at least 3 characters'];
    }else if($bandName > 30 ){
      $this->errors += ['bandNameError' => 'Band name must contain at most 30 characters'];
    }

    if(is_null(BandType::getValueIfExist($bandType))){
        $this->errors += ['bandTypeError' => 'Incorrect band type'];
    }

    if(!preg_match($emailRgx,$email)){
        $this->errors += ['bandEmailError' => 'Incorrect email format'];
    }

    if(!ctype_alpha($state)){
        $this->errors += ['bandStateError' => 'State must contain only characters'];
    }else if(strlen($state) < 3){
      $this->errors += ['bandStateError' => 'State name must contain at least 3 characters'];
    }else if(strlen($state) > 30 ){
      $this->errors += ['bandStateError' => 'State name must contain at most 30 characters'];
    }

    if(!ctype_alpha($city)){
        $this->errors += ['bandCityError' => 'City must contain only characters'];
    }else if(strlen($city) < 3){
      $this->errors += ['bandCityError' => 'City must contain at least 3 characters'];
    }else if(strlen($city) > 30 ){
      $this->errors += ['bandCityError' => 'Citymust contain at most 30 characters'];
    }

    return $this->errors;
  }

  public function getErrors(){
    return $this->errors;
  }

}
 ?>
