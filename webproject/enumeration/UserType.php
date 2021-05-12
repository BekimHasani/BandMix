<?php
class UserType{
  const MUSICIAN = 'MUSICIAN';
  const BAND = 'BAND';

  public static function getValueIfExist($userType){
    $reflection = new ReflectionClass('UserType');
    foreach($reflection->getConstants() as $value){
      if($userType == $value){
        return $value;
      }
    }
    return null;
  }

}
 ?>
