<?php
error_reporting(1);

spl_autoload_register(function($class){
    include_once ("classes/database/database.php");
 
   
    
    });
    

class edit  extends db{

   public function update($id){
 $query="select * from  useraccount where id='$id'";
 return $data= parent::connection()->query($query);



   }
public function updateinsert($name,$nick,$email,$number,$finish,$id,$imagetmp,$hidden,$image){

if(!empty($image)){
    $image=$finish;
    unlink("classes/afterlogin/image/".$hidden);

}else {
    $image=$hidden;
}

$query="UPDATE `useraccount` SET `name`='$name',`email`='$email',`image`='$image',`number`='$number',`nicname`='$nick' WHERE  id='$id'";
$data= parent::connection()->query($query);
if($data==true){

move_uploaded_file($imagetmp,"classes/afterlogin/image/".$finish);
  
return true;

}


   }
   public function getuserdata($ids){

    $query="select * from useraccount where id ='$ids'";
    $data= parent::connection()->query($query);
    return $data->fetch_assoc();
    
    
    }
    public function getmydata($my){
        $query="select * from useraccount where id ='$my'";
        $data= parent::connection()->query($query);
        return $data->fetch_assoc();

    }
    public function updates($my){
        $query="select * from useraccount where id='$my'";
        return $data= parent::connection()->query($query);
         

    }
  
    
}


class mas extends db{

function  get1($id){

    $query="select * from  useraccount where id='$id'";
     $data= parent::connection()->query($query);
    return $data->fetch_assoc();

}
function  get2($ids){

    $query="select * from  useraccount where id='$ids'";
     $data= parent::connection()->query($query);
    return $data->fetch_assoc();

}


}





?>