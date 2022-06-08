<?php
error_reporting(1);


spl_autoload_register(function($class){
    include_once ("../database/database.php");
 
   
    
    });
  $object=  new db;
  $con=$object->connection();


$my=$_REQUEST['myid'];
$user=$_REQUEST['userid'];

$time=time()+10;

$sql="UPDATE `useraccount` SET active='$time' WHERE id='$my'";
$con->query($sql);

?>
<?php



$data="select * from useraccount where id='$user'";
$search=$con->query($data);
 $get= $search->fetch_assoc();
$username= $get['name'];
$useremail= $get['email'];



$data1="select * from useraccount where id='$my'";
$search1=$con->query($data1);
 $get1= $search1->fetch_assoc();
  $myname= $get1['name'];
$myemail= $get1['email'];


$update="UPDATE `massage` SET `ids`='2' WHERE name='$myname' and email='$myemail' and name1='$username' and email1='$useremail' and ida='$user'";
$con->query($update);
$seen="select * from massage where name='$username' and email='$useremail' and name1='$myname' and email1='$myemail' and ida='$my' ORDER BY id DESC ";

$sen=$con->query($seen);
$seens=$sen->fetch_assoc();
$seenuser= $seens['ids'];
if($seenuser==2){
    echo 'Seen';
}else{
  echo '.';
}





?>