<?php
error_reporting(1);


session_start();
spl_autoload_register(function($class){
    include_once ("../database/database.php");
   
    
    });
  $object=  new db;
 $connect= $object->connection();
   $id= $_COOKIE['id'];
   $select="select * from useraccount where id='$id'";
  $my=$connect->query($select);
 $myinfo= $my->fetch_assoc();
$myname= $myinfo['name'];
   $myemail=$myinfo['email'];
   $sql="select * from useraccount where id!='$id' ORDER BY active Desc";
   $con=$connect->query($sql);
   while($data=$con->fetch_assoc()){
    $time=time();
    $active= $data['active'];
  
   $userid=$data['id'];
  $sqls="SELECT ids,sound FROM `massage` WHERE name='$myname' and email='$myemail' and ida='$userid' and ids='1'";
  $connected=$connect->query($sqls);
  $get=$connected->num_rows;
$get2=  $connected->fetch_assoc();
  $last= $get2['ids'];
  $Sou="SELECT sound FROM `massage` WHERE name='$myname' and email='$myemail' and ida='$userid' ORDER BY id DESC ";
 $h= $connect->query($Sou);
$sound=$h->fetch_assoc();
   $sounds= $sound['sound'];

   $image=$data['image'];
   $extention=explode('.',$image);
   $lastx=end($extention);
   
  
?>
<input type="hidden" id="idhidden" value="<?php  echo $userid?>" >

       <li class="list-group-item  active  " >
                        
                                            <div class="media"> <a href=""  class="pull-right m-t-sm"> <span class="badge badge-empty"><?php 
                                            if(isset($last) and $last==1 and isset($get)){
                                              echo $get; 
                                           if($sounds==1){
                          echo '<audio autoplay="true" src="audio/audio.mp3">';
                        

                                           }
                                            
                                            }
                                              ?>
                                           
                                           </span> </a> <span class="pull-left thumb-sm avatar"> <img style="height:50px;width=50px;" src="<?php
                                           if(in_array($lastx,['jpg','png'])==true):
                                          ?>
                                        classes/afterlogin/image/<?php echo $data['image']?>
                                         <?php
                                          else :
                                            ?>
                                            classes/afterlogin/image/defult/defult.png
                                            
                                         
                                        <?php endif ?>" class='' alt=".." class="rounded-circle"> 
                                            <?php if($active>$time){  $mas="Actived" ?>
                                           
                                            <i class="on b-white bottom"></i>
                                            <?php } else { $mas="Not Actived"?>
                                              <i class="busy b-white bottom"></i>

                                            <?php }?>
                                          </span>
                                                <div class="media-body">
                                                    <div ><a  href="chat1.php?ids=<?php echo $data['id'] ?>&&id=<?php echo $id ?> "><?php echo $data['name'];
                                                    ?></a></div> <small class="text-muted"><?php echo $mas?></small> </div>
                                            </div>
                                        </li>
                                     
                                        </li>
                                       
                                   
   <?php $sound="update massage set sound='2' where name='$myname' and email='$myemail' and ida='$userid' and ids='1'";
                         $connect->query($sound);  }?>





