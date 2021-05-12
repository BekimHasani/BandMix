<?php
namespace{
  class Musician {
    protected $musicianId;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $state;
    protected $city;
    protected $instrument;
    protected $description;
    protected $userId;

    public function createMusician($musicianId,$firstName,$lastName,$email,$state,$city,$instrument,$description,$userId){
      $this->musicianId = $musicianId;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->state = $state;
      $this->city = $city;
      $this->instrument = $instrument;
      $this->description = $description;
      $this->userId = $userId;
    }

    public function __construct(){

    }

    public function getMusicianId(){
      return $this->musicianId;
    }

    public function setMusicianId($musicianId){
      $this->musicianId = $musicianId;
    }

    public function getFirstName(){
      return $this->firstName;
    }

    public function setFirstName($firstName){
      $this->firstName = $firstName;
    }

    public function getLastName(){
      return $this->lastName;
    }

    public function setLastName($lastName){
      $this->lastName = $lastName;
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

    public function getInstrument(){
      return $this->instrument;
    }

    public function setInstrument($instrument){
      $this->instrument = $instrument;
    }

    public function getDescription(){
      return $this->description;
    }

    public function setDescription($description){
      $this->description = $description;
    }

    public function getUserId(){
      return $this->userId;
    }

    public function setUserId($userId){
      $this->userId = $userId;
    }

    public function __toString(){
      return "$this->firstName $this->lastName";
    }
  }
}
?>
