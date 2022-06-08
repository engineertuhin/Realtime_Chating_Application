<?php

class db{
private $host="localhost";
private $user="root";
private $pass="";
private $database="messenger";
public function connection(){

 return new mysqli($this->host,$this->user,$this->pass,$this->database);


}



}
if(mysqli_connect_errno()){
  echo "Database is not Connected";
}




















?>