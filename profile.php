
<?php
session_start();
error_reporting(1);
if(isset($_REQUEST['logout'])==true){

    
    session_destroy();
    setcookie("email",$emails,time()-1);
    setcookie("pass",$pa,time()-1);
    setcookie("id",$id,time()-1);
    header('location:index.php');

}if(isset($_REQUEST['idss'])){
    $ids=$_REQUEST['idss'];
}else{
    $ids=$_REQUEST['id'];
}
 
 $id=$_COOKIE['id'];

if($ids==$id){
$mas="<a href='edit.php?id=$id' class='btn btn-info'>Edit Profile</a>";
$mas1="<a href='chat2.php?id=$id' class='btn btn-danger'>Back to Chat</a>";
}
spl_autoload_register(function(){
    include_once('classes/afterlogin/update.php');
    
     });
     $object= new edit;
     $data=$object->update($ids);
     $all= $data->fetch_assoc();
     $datas=$object->updates($id);
     $my= $datas->fetch_assoc();
      
     
    



?>

<!DOCTYPE html>
<html lang="en" class="app">
<!-- Mirrored from flatfull.com/themes/scale/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:14:50 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section class="vbox">
        <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
            <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a> <a href="profile.php?id=<?php echo $id?>" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale"> <span class="hidden-nav-xs">Messenger</span> </a>                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
            <ul class="nav navbar-nav hidden-xs">
              
                </li>
            </ul>
           
               
                </div>
            </form>
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
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img  src="classes/afterlogin/image/<?php echo  $my['image']?>" alt="..."> </span><?php echo $_SESSION['name'] ?><b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li> <span class="arrow top"></span> <a href="#">Settings</a> </li>
                        <li> <a href="profile.php?id=<?php echo $id?>">Profile</a> </li>
                        <li> <a href="#"> <span class="badge bg-danger  pull-right">3</span> Notifications </a> </li>
                        <li> <a href="">Help</a> </li>
                        <li class="divider"></li>
                        <li> <a href="?logout=true" >Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
                    <section class="vbox">
                        <section class="w-f scrollable">
                          
                                <!-- nav -->
                                <nav class="nav-primary hidden-xs">
                                   
                                </nav>
                                <h4>Menue as soon as Come</h4>
                            </div>
                        </section>
                        <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a>                            </footer>
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable">
                            <section class="hbox stretch">
                                <aside class="aside-lg bg-light lter b-r">
                                    <section class="vbox">
                                        <section class="scrollable">
                                            <div class="wrapper">
                                                <section class="panel no-border bg-primary lt">
                                                    <div class="panel-body">
                                                        <div class="row m-t-xl">
                                                            <div class="col-xs-3 text-right padder-v"> <a href="#" class="btn btn-primary btn-icon btn-rounded m-t-xl"><i class="i i-mail2"></i></a> </div>
                                                            <div class="col-xs-6 text-center">
                                                                <div class="inline">
                                                                    <div class="easypiechart" data-percent="75" data-line-width="6" data-bar-color="#fff" data-track-Color="#2796de" data-scale-Color="false" data-size="140" data-line-cap='butt' data-animate="1000">
                                                                        <div class="thumb-lg avatar"> <img 
                                                                        style="height:130px; width=200px;" src="classes/afterlogin/image/<?php echo $all['image']?>" class="dker" alt="Image not uploaad"> </div>
                                                                    </div>
                                                                    <div class="h4 m-t m-b-xs font-bold text-lt"><?php echo $all['name']?></div> <small class="text-muted m-b">Art director</small> </div>
                                                            </div>
                                                            <div class="col-xs-3 padder-v"> <a href="#" class="btn btn-primary btn-icon btn-rounded m-t-xl" data-toggle="class:btn-danger"> <i class="i i-phone text"></i> <i class="i i-phone2 text-active"></i> </a> </div>
                                                        </div>
                                                        <div class="wrapper m-t-xl m-b">
                                                            <div class="row m-b">
                                                                <div class="col-xs-6 text-right"> <small>Email</small>
                                                                    <div class="text-lt font-bold"><?php echo $all['email']?></div>
                                                                </div>
                                                                <div class="col-xs-6"> <small>Mobile</small>
                                                                    <div class="text-lt font-bold"><?php echo $all['number']?></div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-6 text-right"> <small>Reporter</small>
                                                                    <div class="text-lt font-bold">Coch Jose</div>
                                                                </div>
                                                                <div class="col-xs-6"> <small>Messenger Name</small>
                                                                    <div class="text-lt font-bold"><?php echo $all['nicname']?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <footer class="panel-footer dk text-center no-border">
                                                        <div class="row pull-out">
                                                            <div class="col-xs-4">
                                                                <div class="padder-v"> <span class="m-b-xs h3 block text-white">245</span> <small class="text-muted">Followers</small> </div>
                                                            </div>
                                                            <div class="col-xs-4 dker">
                                                                <div class="padder-v"> <span class="m-b-xs h3 block text-white">55</span> <small class="text-muted">Following</small> </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <div class="padder-v"> <span class="m-b-xs h3 block text-white">2,035</span> <small class="text-muted">Tweets</small> </div>
                                                            </div>
                                                            
                                                           
                                                        </div>
                                                        <br>
                                                        <div class="text-center mt-5">
                                                            
                                                           <?php echo $mas?>
                                                           &nbsp;   <?php echo $mas1?>
                                                            </div>
                                                    </footer>
                                                </section>
                                            </div>
                                        </section>
                                    </section>
                                </aside>
                              
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:14:50 GMT -->

</html>