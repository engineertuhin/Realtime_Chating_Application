<?php
error_reporting(1);
/*user id*/$id=$_REQUEST['ids'];
/*user my */  $ids=$_REQUEST['id'];

  spl_autoload_register(function(){
    include_once('classes/afterlogin/update.php');
    
    
     });
     $object= new edit;
     $data=$object->update($ids);
     $all= $data->fetch_assoc();
      
    
if(isset($_REQUEST['logout'])==true){
    session_destroy();
    setcookie("email",$emails,time()-1);
    setcookie("pass",$pa,time()-1);
    header('location:index.php');

}
$get1= new mas;
 $colluct=$get1-> get1($id);
 $username=$colluct['name'];
 $useremail =$colluct['email'];
 $colluct1=$get1-> get2($ids);
 $myname=$colluct1['name'];
 $myemail=$colluct1['email'];


 




?>


<!DOCTYPE html>
<html lang="en" class="app">
<!-- Mirrored from flatfull.com/themes/scale/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:22 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Messeging</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
    <link rel="stylesheet" href="css/min.css">

</head>

<body class="">





    <section class="vbox">
        <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
            <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a> <a href="chat1.php?ids=<?php echo $id ?>&&id=<?php echo $ids ?>" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale"> <span class="hidden-nav-xs"> Messenger</span> </a>                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
           
            
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
                <li class="hidden-xs"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-chat3"></i> <span class="badge badge-sm up bg-danger count">2</span> </a>
                    <section class="dropdown-menu aside-xl animated flipInY">
                        <section class="panel bg-white">
                            <div class="panel-heading b-light bg-light"> <strong>You have <span class="count">2</span> notifications</strong> </div>
                            <div class="list-group list-group-alt"> <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="images/a0.png" alt="..." class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br> <small class="text-muted">10 minutes ago</small> </span> </a>                                <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br> <small class="text-muted">1 hour ago</small> </span> </a> </div>
                            <div class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </div>
                        </section>
                    </section>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="classes/afterlogin/image/<?php echo $all['image']?>" alt="..."> </span> <?php echo $all['name']?><b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li> <span class="arrow top"></span> <a href="#">Settings</a> </li>
                        <li> <a href="profile.php?id=<?php echo $ids?>">Profile</a> </li>
                        <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li>
                        <li> <a href="docs.html">Help</a> </li>
                        <li class="divider"></li>
                        <li> <a href="?logout=true" >Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </header>
       
            
              
                <!-- /.aside -->
                <section id="content">
                    <section class="hbox stretch" >
                        <section>
                            <section class="vbox">
                                <header class="header bg-light lt b-b b-light"> <a href="profile.php?idss=<?php echo $id?>" class="btn btn-sm btn-default pull-right btn-rounded">Profile</a><p>Chat with <strong><?php echo $colluct['nicname'];?></strong></p>
                                <div style="height:1vh;" id="online">
                                       
                                       </div>
                                 
                                </header>
                                
                                <section class="w-f scrollable wrapper">
                                <button class="btn " id="preveas" style="background-color:#F0FFF0; color:blue; font-size:10px;
                                margin-left:40%;height:20px; padding-bottom: 20px; margin-bottom:4px;
                               
                                "> read all messege</button>
                                    <section class="chat-list">
                       
                                        <div id="pvs"></div>
                                       
                            
                                <div id="showmy" style="margin-bottom:70px;">
                             


                                </div>
                                <div  id="sepn"></div>
                                        
                                    </section>
                                </section>

                               
                                <footer class="footer bg-light lt b-t b-light" style=" position: fixed;
                                                         bottom: 2px;
                                                          width:  100%;
                                                         height: auto;

                                                          border: 0px solid #d6d6d6;
                                                          z-index: 99;
                                                          padding: 0;
                                                        ">
                               
                                    <form id='from' action="<?php echo $_SERVER['PHP_SELF']?>?ids=<?php echo $id ?>&&id=<?php echo $ids ?>" method="POST" enctype="multipart/form-data" class="m-t-sm"> 



                                    <input id='username' name="username" type="hidden" value="<?php echo $username ?>">
                                    <input id='useremail' name="useremail" type="hidden"  value="<?php echo $useremail ?>">
                                    <input id='myname' name="myname" type="hidden"  value="<?php echo $myname ?>">
                                    <input id='myemail' name="myemail" type="hidden"  value="<?php echo $myemail ?>">
                                    <input id='myid' name="myid" type="hidden"  value="<?php echo $ids ?>">
                                    <input id='userid' name="userid" type="hidden"  value="<?php echo $id ?>">                                    





                                    <input type="file" id='image' name="images" style="position:absolute;z-index:1;" > <div style="text-align: center; position:relative;height:1px" id="type"></div> <p style="text-align: right; position:relative;margin-right:5px "  id='seen' ></p>
                                        <div class="input-group">
                                         <input  autocomplete="off"  id="sms" name="sms" type="text" class="form-control input-sm rounded" placeholder="Say something"> <span class="input-group-btn"> <button name="submit" id='text' type="submit" class="btn btn-sm btn-danger font-bold btn-rounded" type="button">Send</button> </span>                                            </div>
                                        </form>
                                </footer>
                            </section>
                        </section>
                        <!-- side content -->
           
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
(function($){

$(document).on('submit','form#from',function(event){
    event.preventDefault();
var username=$('#username').val();
var useremail=$('#useremail').val();
var myname=$('#myname').val();
var myemail=$('#myemail').val();
var myid=$('#myid').val();
var sms=$('#sms').val();


if(sms==""){

}else{
$.ajax({
url:'classes/afterlogin/sms.php',
data: {

username:username,
useremail:useremail,
myname:myname,
myemail:myemail,
myid:myid,
sms:sms,


},
method:'post',
success:function(data){
    $('#sms').val('');
}


});

}

});


$(document).ready(function(){
    function mydata(){
var username=$('#username').val();
var useremail=$('#useremail').val();
var myname=$('#myname').val();
var myemail=$('#myemail').val();
var myid=$('#myid').val();
var userid=$('#userid').val();

$.ajax({
    url:'classes/afterlogin/sms.php',
    data: {

username:username,
useremail:useremail,
myname:myname,
myemail:myemail,
myid:myid,
userid:userid,


},
method:'POST',
 success:function(data){
     $('#showmy').html(data);

    }

});
    }
    setInterval( function(){
    mydata();
    userdata();
    update();
    actived()
}, 688);


function userdata(){
    var username=$('#username').val();
var useremail=$('#useremail').val();
var myname=$('#myname').val();
var myemail=$('#myemail').val();
var userid=$('#userid').val();
$.ajax({
    url:'classes/afterlogin/sms.php',
    data: {

username:username,
useremail:useremail,
myname:myname,
myemail:myemail,
userid:userid,
},
method:'POST',
 success:function(data){
     $('#user').html(data);
     

    }

});


}
function update(){
    var myid=$('#myid').val();
    var userid=$('#userid').val();
   $.ajax({
url: "classes/afterlogin/updateactivety.php",
data: { myid:myid,userid:userid },
method:'POST',
success:function(data){
$('#seen').html(data);
}

   });
 
    }
    function previous(){

            $(document).on('click','#preveas',function(){
 var username=$('#username').val();
var useremail=$('#useremail').val();
var myname=$('#myname').val();
var myemail=$('#myemail').val();
var myid=$('#myid').val();
var userid=$('#userid').val();
$.ajax({
url: "classes/afterlogin/preveoussms.php",
data: {
username:username,
useremail:useremail,
myname:myname,
myemail:myemail,
myid:myid,
userid:userid,
},
method:'POST',
success:function(data){
    $('#pvs').html(data);
}

   });


            });

    }
   
    previous();

    function actived(){

$('#online').ready(function(){

    var userid=$('#userid').val();
    $.ajax({
url: "classes/afterlogin/onlineuser.php",
data: {
userid:userid,
},
method:'POST',
success:function(data){
    $('#online').html(data);
}

   });
   
});

    }
   


});
$(document).on('submit','form#from',function(event){
    event.preventDefault();
   var image=$('#image').val();


  if(image==""){

     
  }else{
   
        $('#sepn').html('<img style="width:100%;max-width: 400px; height: auto;" src="audio/a.gif">'); 

   
    $.ajax({

url:"classes/afterlogin/imageupload.php",
data:new FormData(this),
processData:false,
contentType:false,
method:'POST',
success:function(data){
    $('#image').val(''); 
    setTimeout(function(){
        $('#sepn').remove();
    },4000);
    
}



      });
      
  }
 


});

$(document).on('keyup','#sms',function(){
   
var username=$('#username').val();
var useremail=$('#useremail').val();
var userid=$('#userid').val();
var sms=$('#sms').val();
$.ajax({

url:"classes/afterlogin/smstypeing.php",
data:{
    username:username,
useremail:useremail,
    userid:userid,
    sms:sms,
},
method:"POST",

success:function(data){

}


});


});
function get(){
$(document).ready(function(){
    
    var username=$('#username').val();
var useremail=$('#useremail').val();
var userid=$('#userid').val();
var sms=$('#sms').val();
$.ajax({

url:"classes/afterlogin/tyeping_get.php",
data:{
    username:username,
useremail:useremail,
    userid:userid,
    sms:sms,
},
method:"POST",

success:function(data){
  $('#type').html(data);

}


});



});



}
setInterval(function(){
    get(); 
},1000);



$('#text').click(function(){

    $.ajax({

url:"classes/afterlogin/deletetype.php",

success:function(data){

}


});


});


})(jQuery);




    </script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:23 GMT -->

</html>