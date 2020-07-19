<?php

class db{
private $host="localhost";
private $user="admin";
private $pass="00";
private $database="messenger";
public function connection(){

 return new mysqli($this->host,$this->user,$this->pass,$this->database);


}



}
if(mysqli_connect_errno()){
  echo "Database is not Connected";
}




















?>