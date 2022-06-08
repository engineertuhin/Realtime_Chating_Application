<?php

class db{
private $host="sql5.freemysqlhosting.net";
private $user="sql5498417";
private $pass="P1IPV4Vci8";
private $database="sql5498417";
public function connection(){

 return new mysqli($this->host,$this->user,$this->pass,$this->database);


}



}
if(mysqli_connect_errno()){
  echo "Database is not Connected";
}




















?>
