<?php
class Role{
  const USER = 'USER';
  const ADMIN = 'ADMIN';

  public static function getValueIfExist($role){
    $reflection = new ReflectionClass('Role');
    foreach($reflection->getConstants() as $value){
      if($role == $value){
        return $value;
      }
    }
    return null;
  }

}
 ?>
