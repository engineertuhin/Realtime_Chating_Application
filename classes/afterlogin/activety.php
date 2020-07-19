<?php

error_reporting(1);
session_start();
spl_autoload_register(function($class){
    include_once ("../database/database.php");
   
    
    });
  
   echo $time=time()+10;
    $object=  new db;
    $connect= $object->connection();
      $id= $_COOKIE['id'];
      $query="UPDATE `useraccount` SET `active`='$time' WHERE  id='$id'";
      $connect->query($query);




?>