<?php
spl_autoload_register(function($class){
    include_once ("../database/database.php"); 
    });
    
  $object=  new db;
  $con=$object->connection();


if(!empty($_FILES['images'])){
$username=$_REQUEST['username'];
$useremail=$_REQUEST['useremail'];
$mynema=$_REQUEST['myname'];
$myemail=$_REQUEST['myemail'];
$myid=$_REQUEST['myid'];
$userid=$_REQUEST['userid'];
 


   $file_name = $_FILES["images"]["name"];
   $file_type = $_FILES["images"]["type"];
   $temp_name = $_FILES["images"]["tmp_name"];
   $file_size = $_FILES["images"]["size"];
   $error = $_FILES["images"]["error"];
   $convert=time().rand().$file_name;
   if (!$temp_name)
   {
     
       exit();
   }
   function compress_image($source_url, $destination_url, $quality)
   {
       $info = getimagesize($source_url);
       if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
       elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
       elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
       imagejpeg($image, $destination_url, $quality);
       echo "Image uploaded successfully.";
   }
   if ($error > 0)
   {
      
   }
   else if (($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/png") || ($file_type == "image/pjpeg"))
   {
       $filename = compress_image($temp_name,"textimage/".$convert,10);
   }
   




  $sql="INSERT INTO `massage`(`name`, `email`, `massage`, `name1`, `email1`, `ida`, `ids`,sound,images) VALUES ('$username','$useremail','cccc','$mynema','$myemail','$myid','1','1','$convert')";
   $done=$con->query($sql);
   if($done==true){
move_uploaded_file($temp_name,"classes/afterlogin/textimage/".$convert);
   

   }


}




?>