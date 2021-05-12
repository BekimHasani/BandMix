<?php
include_once '../entity/Musician.php';
include_once '../entity/Band.php';
include_once '../enumeration/UserType.php';

class UserTypeFactory{

  public static function getUserType($usertype){
    switch ($usertype) {
      case 'MUSICIAN':
        return UserType::MUSICIAN;
      case 'BAND':
        return UserType::BAND;
      default:
        return null;
    }
  }
}
 ?>
