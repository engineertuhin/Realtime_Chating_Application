<?php


error_reporting(1);

spl_autoload_register(function($class){
include_once ("classes/login_and_reg/login_and_registation.php");

});
$object =new registation;

 

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['passsword'];

  $convertpassword=password_hash($password,PASSWORD_DEFAULT);

 $chack=$object->useremailchack($email);
$confirm=$_REQUEST['confirm'];
  $count=strlen($password);
if(isset($_REQUEST['singup'])){

if(empty($name) or empty($email) or empty($password) or empty($confirm)){
    $mas="<p class='alert alert-danger'>Please Feelup full from <button type='button' class='close' data-dismiss='alert'>&times</button> </p>";
}elseif($count<5){
    $mas="<p class='alert alert-danger'>You need to minimum 5 character password <button type='button' class='close' data-dismiss='alert'>&times</button> </p>";

}elseif($password!==$confirm){
    $mas="<p class='alert alert-danger'>Password and confirm password is no meach <button type='button' class='close' data-dismiss='alert'>&times</button> </p>";
}elseif($chack==true){
    $mas="<p class='alert alert-danger'>Email is already Available try an other one <button type='button' class='close' data-dismiss='alert'>&times</button> </p>";
}
else{
   $insert=$object-> regestation_data_insert($name,$email,$convertpassword);
    if($insert==true){
        $mas="<p class='alert alert-success'>Your Registation is Complited<button type='button' class='close' data-dismiss='alert'>&times</button> </p>";
    }

}
}
?>


<!DOCTYPE html>
<html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Registation</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Registation</a>
            <section class="m-b-lg">
                <header class="wrapper text-center"> <strong>user regestation</strong> </header>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <?php echo $mas?>
                    <div class="list-group">
                        <div class="list-group-item"> <input name="name" placeholder="Name" class="form-control no-border"> </div>
                        <div class="list-group-item"> <input name="email" type="email" placeholder="Email" class="form-control no-border"> </div>
                        <div class="list-group-item"> <input name="passsword" type="password" placeholder="Password" class="form-control no-border"> </div>
                        <div class="list-group-item"> <input name="confirm" type="password" placeholder="confirm Password" class="form-control no-border"> </div>
                    </div>
                    <div class="checkbox m-b" style="margin-top:-30px;">  </label> </div> <button type="submit" class="btn btn-lg btn-primary btn-block" name="singup">Sign up</button>
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a> </form>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>Web app framework base on Bootstrap<br>&copy; 2020</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

</html>