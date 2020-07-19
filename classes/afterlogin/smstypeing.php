<?php
spl_autoload_register(function($class){
    include_once ("../database/database.php");
 

    });
  $object=  new db;
  $con=$object->connection();
$myname= $_REQUEST['username'];
$myemail= $_REQUEST['useremail'];
$myid= $_REQUEST['userid'];
$sms= $_REQUEST['sms'];
$sql="INSERT INTO `typeing`(`typeing`, `userid`, `name`, `email`) VALUES ('$sms','$myid','$myname','$myemail')";
$con->query($sql);










?>