<?php
namespace{
  class Band{
    protected $bandId;
    protected $bandName;
    protected $description;
    protected $bandType;
    protected $email;
    protected $state;
    protected $city;
    protected $userId;

    public function createBand($bandId, $bandName, $description, $bandType,
                          $email, $state, $city, $userId){
      $this->bandId = $bandId;
      $this->bandName = $bandName;
      $this->description = $description;
      $this->bandType = $bandType;
      $this->email = $email;
      $this->state = $state;
      $this->city = $city;
      $this->userId = $userId;
    }

    public function __construct(){

    }

    public function getBandId(){
      return $this->bandId;
    }

    public function setBandId($bandId){
      $this->bandId = $bandId;
    }

    public function getBandName(){
      return $this->bandName;
    }

    public function setBandName($bandName){
      $this->bandName = $bandName;
    }

    public function getDescription(){
      return $this->description;
    }

    public function setBandType($bandType){
      $this->bandType = $bandType;
    }

    public function getBandType(){
      return $this->bandType;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getState(){
      return $this->state;
    }

    public function setState($state){
      $this->state = $state;
    }

    public function getCity(){
      return $this->city;
    }

    public function setCity($city){
      $this->city = $city;
    }

    public function getUserId(){
      return $this->userId;
    }

    public function setUserId($userId){
      $this->userId = $userId;
    }

    public function __toString(){
      return (string)$this->bandnName;
    }
  }
}
?>
