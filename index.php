
<?php 
error_reporting(1);
session_start();

$id= $_COOKIE['id'];
if(isset($_COOKIE['email']) and isset($_COOKIE['pass'])){
    header("location:chat2.php?id=$id");
}

error_reporting(1);



spl_autoload_register(function($class){
include_once ("classes/login_and_reg/login_and_registation.php");


});

$object= new login;




  $email=$_REQUEST['email'];
  $password=$_REQUEST['password'];


  if(isset($_REQUEST['submit'])){


    $emailchack=$object-> emailchack($email);
    $pass=$object->paswoird($email,$password);

     

if(empty($email) and empty($password)){
    $mas="<p class='alert alert-danger'>You need to Email and Password <button type='button' class='close' data-dismiss='alert'>&times</button> </p>";
  
}elseif ($emailchack==false) {
    $mas="<p class='alert alert-danger'>You Email is rong <button type='button' class='close' data-dismiss='alert'>&times</button> </p>";
}elseif($pass==false){
    $mas="<p class='alert alert-danger'>You Password is rong <button type='button' class='close' data-dismiss='alert'>&times</button> </p>";
}else{
    if($emailchack==true and $pass==true){
       $get=$object->go($email,$password); 
       $emails= $get['email'];
       $pa= $get['password'];
       $id=$get['id'];
       setcookie("email",$emails,time()+60*60*60*60*7);
       setcookie("pass",$pa,time()+60*60*60*60*7);
       setcookie("id",$id,time()+60*60*60*60*7);
         $_SESSION['name']=$get['name'];
         $_SESSION['email']=$get['email'];
         $_SESSION['password']=$get['password'];
         $_SESSION['id']=$get['id'];
         $_SESSION['nickname']=$get['nicname'];
         $_SESSION['image']=$get['image'];
         $_SESSION['number']=$get['number'];
         header("location:chat2.php?id=$id");

    }
}




  }





?>

<!DOCTYPE html>
<html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Login</a>
            <section class="m-b-lg">
                <header class="wrapper text-center"> <strong>Messenger user login</strong> </header>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <?php echo $mas?>
                    <div class="list-group">
                        <div class="list-group-item"> <input type="email" name="email" placeholder="Email" class="form-control no-border" value=""> </div>
                        <div class="list-group-item"> <input type="password" name="password" placeholder="Password" class="form-control no-border"> </div>
                    </div> <button type="submit"  name="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                    <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p> <a href="signup.php" class="btn btn-lg btn-default btn-block">Create an account</a> </form>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p> <small>Web app framework base on Bootstrap<br>&copy; 2020</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

</html>