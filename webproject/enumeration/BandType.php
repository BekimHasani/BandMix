<?php
class  BandType {
  const ROCK_BAND = 'Rock Bend';
  const POP_BAND = 'Pop Band';
  const RAP_BAND = 'Rap Band';
  const OTHENRS = 'Others';

  public static function getValueIfExist($bandType){
    $reflection = new ReflectionClass('BandType');
    foreach($reflection->getConstants() as $value){
      if($bandType == $value){
        return $value;
      }
    }
    return null;
  }

}
 ?>
