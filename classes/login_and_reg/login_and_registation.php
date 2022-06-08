<?php

error_reporting(1);


spl_autoload_register(function($class){
    include_once ("classes/database/database.php");
   
    
    });
    

class registation  extends db{
 public function  regestation_data_insert($name,$email,$convertpassword){
     $query="INSERT INTO `useraccount`( `name`, `email`, `password`, `image`,`number`, `nicname`, `active`) VALUES ('$name','$email','$convertpassword','?','?','?','0')";
    $data= parent::connection()->query($query);
    if($data==true){
        return true;
    }

  }
  public function useremailchack($email){
    $query="select * from useraccount where email='$email'";
    $data= parent::connection()->query($query);
     $d= $data->num_rows;
     if($d>0){
         return true;
     }

  }



}
class login extends db{
   public function emailchack($email){

$query="select email from useraccount where email='$email'";
$data= parent::connection()->query($query);
   $get=$data->num_rows;
  
  if($get==1){
      return true;
  }else{
      return false;
  }


   }
  
   public function paswoird($email,$password){
    $query="select * from useraccount where email='$email'";
    $data= parent::connection()->query($query);
     $d= $data->fetch_assoc();
       $pass= $d['password'];
     
     
     if(password_verify($password,$pass)){
         return true;
         
     }else{
         return false;
     }
   

   }
   

   public function go($email,$password){

    $query="select * from useraccount where email='$email'";
    $data= parent::connection()->query($query);
     $d= $data->fetch_assoc();
       $pass= $d['password'];
     
     
     if(password_verify($password,$pass)){
         return $d;
         
     }


   }
   


}









?>