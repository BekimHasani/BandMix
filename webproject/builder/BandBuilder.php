<?php
namespace Band{
  class BandBuilder extends \Band{
    protected $bandId;
    protected $bandName;
    protected $description;
    protected $bandType;
    protected $email;
    protected $state;
    protected $city;
    protected $userId;

    public function build(){
      $band = new parent();
      $band->bandId = $this->bandId;
      $band->bandName = $this->bandName;
      $band->description = $this->description;
      $band->bandType = $this->bandType;
      $band->email = $this->email;
      $band->state = $this->state;
      $band->city = $this->city;
      $band->userId = $this->userId;
      return $band;
    }

    private function __construct(){

    }

    public static function builder(){
        return new BandBuilder();
    }

    public function bandId($bandId){
      $this->bandId = $bandId;
      return $this;
    }

    public function bandName($bandName){
      $this->bandName = $bandName;
      return $this;
    }

    public function description($description){
      $this->description = $description;
      return $this;
    }

    public function bandType($bandType){
      $this->bandType = $bandType;
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

    public function userId($userId){
      $this->userId = $userId;
       return $this;
    }
  }
}
?>
