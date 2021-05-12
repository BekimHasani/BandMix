<?php
namespace Musician{
  class MusicianBuilder extends \Musician {
    protected $musicianId;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $state;
    protected $city;
    protected $instrument;
    protected $description;
    protected $userId;

    public function build(){
      $musician = new parent();
      $musician->musicianId = $this->musicianId;
      $musician->firstName = $this->firstName;
      $musician->lastName = $this->lastName;
      $musician->email = $this->email;
      $musician->state = $this->state;
      $musician->city = $this->city;
      $musician->instrument = $this->instrument;
      $musician->description = $this->description;
      $musician->userId = $this->userId;
      return $musician;
    }

    private function __construct(){

    }

    public static function builder(){
        return new MusicianBuilder();
    }

    public function musicianId($musicianId){
      $this->musicianId = $musicianId;
      return $this;
    }

    public function firstName($firstName){
      $this->firstName = $firstName;
      return $this;
    }

    public function lastName($lastName){
      $this->lastName = $lastName;
      return $this;
    }

    public function email($email){
      $this->email = $email;
      return $this;
    }

    public function state($state){
      $this->state = $state;
      return $this;
    }

    public function city($city){
      $this->city = $city;
      return $this;
    }

    public function instrument($instrument){
      $this->instrument = $instrument;
      return $this;
    }

    public function description($description){
      $this->description = $description;
      return $this;
    }
    public function userId($userId){
      $this->userId = $userId;
       return $this;
    }
  }
}

 ?>
