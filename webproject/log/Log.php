<?php
class Log{

  private $log_set = false;
  private $log_file = "../logs.log";

  public function __construct(){
    if(!$this->log_set){
      ini_set("log_errors", TRUE);
      ini_set('error_log', $this->log_file);
    }
    error_log("-----------Starting logger-----------------");
  }

  public function addInfoLog($info_log){
    error_log('[INFO]'."->$info_log");
  }

  public function addErrorLog($error_log){
    error_log('[ERROR]'."->$error_log");
  }

  public function close(){
    error_log("-----------Closing logger------------------\n");
  }

}
 ?>
