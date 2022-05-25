<?php

error_reporting(1);


spl_autoload_register(function($class){
    include_once ("../database/database.php");
 
    include_once ("../afterlogin/test.php");
 
    
    });
  $object=  new db;
  $con=$object->connection();

$id=$_REQUEST['userid'];
$sql="SELECT active FROM `useraccount` WHERE id='$id'";
$get=$con->query($sql);
$datda=$get->fetch_assoc();
$update= $datda['active'];
 $time=time();

 if($time<$update){
     echo "<p style='color:green;font-size:12px;margin-top:-12px;'>Online</p>";
 }else{
    echo "<p style='color:red;font-size:12px;margin-top:-12px;'>Off Line</p>";
 }





?>