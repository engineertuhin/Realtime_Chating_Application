<?php
error_reporting(1);


spl_autoload_register(function($class){
    include_once ("../database/database.php");
 
    include_once ("../afterlogin/test.php");
 
    
    });
  $object=  new db;
  $con=$object->connection();


if(isset($_REQUEST['myid']) and isset($_REQUEST['userid'])){
 $username= $_REQUEST['username'];
  $useremail=$_REQUEST['useremail'];
  $myname=$_REQUEST['myname'];
 $myemail=$_REQUEST['myemail'];
 $myid=$_REQUEST['myid'];
  $user=$_REQUEST['userid'];
  $row="select * from massage where name='$username' and email='$useremail' and name1='$myname' and email1='$myemail' and ida='$myid' UNION  select * from massage where name='$myname' and email='$myemail' and name1='$username' and email1='$useremail' and ida='$user' order by id ";
  $rows= $con->query($row);
    $getrow=$rows->num_rows;
 if($getrow>=10){
   $rowlimit=$getrow-10;
 }else{
    $rowlimit=0;
 }

 $sql="select * from massage where name='$username' and email='$useremail' and name1='$myname' and email1='$myemail' and ida='$myid' UNION  select * from massage where name='$myname' and email='$myemail' and name1='$username' and email1='$useremail' and ida='$user' order by id limit $rowlimit";
$cullect= $con->query($sql);

while($data=$cullect->fetch_assoc()){
    $s=$data['massage'];    
$object=new a;
 $date=$object->facebook_time_ago($data['data']);
 ?>

<?php if($data['name']==$myname and $data['email']==$myemail and $data['ida']==$user){
                                               $imagedata="select * from useraccount where id='$user'";
                                               $myimage=$con->query($imagedata);
                                               $getimage=$myimage->fetch_assoc();


                                           ?>
                                          <article class="chat-item left"> 
                                          <?php if(($s=='cccc')==false):?>
                                          
                                          
                                          <a href="#" class="pull-left thumb-sm avatar"><img style="height:35px" src="classes/afterlogin/image/<?php echo $getimage['image']?>" class="img-circle"></a>
                                          
                                            <section class="chat-body">
                                                <div class="panel b-light text-sm m-b-none">
                                                    <div class="panel-body"> <span class="arrow left"></span>
                                                        <p class="m-b-none"><?php echo $data['massage']?></p>

                                                    </div>
                                                </div> <small class="text-muted"><i class="fa fa-ok text-success"></i><?php echo $date?></small> </section>

                                          <?php else:?>
                                            <a href="#" class="pull-left thumb-sm avatar"><img style="height:35px" src="classes/afterlogin/image/<?php echo $getimage['image']?>" class="img-circle"></a> 
                                            <img  class="zoom" style="margin-left:10px;width:100%;max-width: 400px; height: auto; " src="classes/afterlogin/textimage/<?php echo  $data['images']?>" alt=""><h1 style="display:none" >dfsd</h1>
                                                <small class="text-muted"><br> <i class="fa fa-ok text-success"></i><?php echo $date?></small> </section>

                                          <?php endif;?>
                                        </article>
                                       <?php }else{
                                           $imagedata="select * from useraccount where id='$myid'";
                                           $myimage=$con->query($imagedata);
                                           $getimage=$myimage->fetch_assoc();
                                           ?>
                                     <article  class="chat-item right"> 
                                     <?php if(($s=='cccc')==false):?>
                                        <a href="#" class="pull-right thumb-sm avatar">
                                        <img style="height:35px" src="classes/afterlogin/image/<?php echo $getimage['image']?>" class="img-circle"></a>
                                            <section class="chat-body">
                                                <div class="panel bg-light dk text-sm m-b-none">
                                                    <div class="panel-body"> <span class="arrow right"></span>
                                                        <p class="m-b-none"><?php echo $data['massage']?></p>
                                                    </div>
                                                </div> <small class="text-muted"><?php echo $date?></small> </section>
                                                 <?php else:?>
                                                    <a href="#" class="pull-right thumb-sm avatar">
                                        <img style="height:35px" src="classes/afterlogin/image/<?php echo $getimage['image']?>" class="img-circle"></a>
                                            <section class="chat-body">
                                                <span class="arrow right"></span>
                                                <img class="zoom" style="width:100%;max-width: 400px; height: auto;" src="classes/afterlogin/textimage/<?php echo  $data['images']?>" alt=""><h1 style="display:none" >dfsdxc</h1>
                                                <small class="text-muted"><i class="fa fa-ok text-success"></i><?php echo $date?></small> </section>
                                                <?php endif;?>
                                                </article>

                                       <?php }?>        
<?php  } }?>


