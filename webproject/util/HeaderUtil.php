<?php
class HeaderUtil{

  public static function isLocationPresent(Log $logger){
    $headers = headers_list();
    foreach ($headers as $header => $value) {
      $logger->addInfoLog("$header => $value");
      if(substr($value,0,8) == 'Location'){
        $logger->addInfoLog("Location was already set: ".$value );
        return true;
      }
    }
    return false;
  }

}

 ?>
