<?php session_start();
error_reporting(1);
if(!isset($_COOKIE['email']) and !isset($_COOKIE['pass'])){
    header("location:index.php");
}
  $id=$_REQUEST['id'];
  
?>
<?php

 if(empty($id)){
    session_destroy();
    
    header('location:index.php');

 }
?>




<!DOCTYPE html>
<html lang="en" class="app">
<!-- Mirrored from flatfull.com/themes/scale/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:22 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Online Member</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>

<script>
/*
$(document).ready(function(){
setInterval(function(){
$("#load").load("chat2.php?id=<?php //echo $id?>");
Refresh();
},10000);
});
*/
</script>
</head>

                        <!-- side content -->
<body class=""id="load" >
    <h1 class="text-center">Gorib er Messenger</h1>
    <div class="text-center" >
        <a href="profile.php?id=<?php echo $id?>"  class="btn btn-sm btn-default  btn-rounded">Profile</a>
        <br>
        <br>
        
    </div>
  <input type="hidden" id="id" value="<?php echo $id?>">
                        
                    
                            <section class="" style="margin-top:-30px;">
                                <section class="scrollable">
                                    <h4 class="font-thin text-black padder m-b-none m-t">Chat</h4>
                                    <div class="wrapper text-u-c"><strong>Online</strong></div>
                                    <ul class="list-group no-bg no-borders auto m-b-none">
                                    <div id='autoload'>
                                    
                                    
                                    
                                    </div> 
                                    </ul>
                                  
                                    </section>
                            </section>
                            </div>
                                     
                        <!-- / side content -->
                    </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> </section>
            </section>
        </section>
    </section>

    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>

(function($){

$(document).ready(function(){
    function autoload(){
$.ajax({

url:'classes/afterlogin/chat.php',
success:function(data){
    $('#autoload').html(data);
}


});
    }
    
    $(document).ready(function(){
setInterval(function(){
    autoload();
    activty().load("chat2.php?id=<?php echo $id?>");
},1000);
});

});

function activty(){

$.ajax({

url:'classes/afterlogin/activety.php',
success:function(data){
    
}

});

}



})(jQuery);



</script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:23 GMT -->

</html>