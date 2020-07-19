<?php


spl_autoload_register(function($class){
    include_once ("../database/database.php");

    
    });
  $object=  new db;
  $con=$object->connection();
  $sql="TRUNCATE TABLE typeing";
  $con->query($sql);




?>