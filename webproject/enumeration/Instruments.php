<?php
class  Instruments {
  const GUITAR = 'Guitar';
  const PIANO = "Piano";
  const DRUMS = 'Drums';
  const BASS = 'Bass';

  public static function getValueIfExist($instrument){
    $reflection = new ReflectionClass('Instruments');
    foreach($reflection->getConstants() as $value){
      if($instrument == $value){
        return $value;
      }
    }
    return null;
  }

}
 ?>
