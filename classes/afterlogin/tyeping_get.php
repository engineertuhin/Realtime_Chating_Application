<?php
error_reporting(1);
session_start();


spl_autoload_register(function($class){
    include_once ("../database/database.php");
 

    });
  $object=  new db;
  $con=$object->connection();

  $email= $_COOKIE['email'];




 $type="select * from typeing ORDER BY id Desc LIMIT 1";
 $typ= $con->query($type);
 $typing=$typ->fetch_assoc();
 $tname= $typing['name'];
 $temail=$typing['email'];
  $typeing=$typing['typeing'];
  $ids= $typing['userid'];



  if(!empty($typeing)){
if($email==$temail){

echo '<img height="40px" width="60px" style="margin-top:-10px;margin-left:13px" src="audio/b.gif">';
echo '<audio id="audio" style="display:none;" src="audio/facebook_msnger_2014.mp3" controls autoplay loop onloadeddata="setHalfVolume()">';
echo '<script>
function setHalfVolume() {
    var myAudio = document.getElementById("audio");
    myAudio.volume = 0.4;
}
</script>';


}


  }




?>