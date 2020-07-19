<?php

error_reporting(1);
 $id=$_REQUEST['id'];
 spl_autoload_register(function(){
include_once('classes/afterlogin/update.php');

 });
 $object= new edit;
  $name=$_REQUEST['name'];
 $nick=$_REQUEST['nick'];
 $email=$_REQUEST['Email'];
 $number=$_REQUEST['number'];
 $image=$_FILES['file']['name'];
  $imagetmp=$_FILES['file']['tmp_name'];
   $convert=rand().time().$image;
   $ex=explode('.',$convert);
    $last=end($ex);
    $finish=md5($convert).'.'.$last;
   

 $data=$object->update($id);
 $all= $data->fetch_assoc();
 if(isset($_REQUEST['s'])){
   $hidden=$_REQUEST['hidden'];
 $updatekore=$object->updateinsert($name,$nick,$email,$number,$finish,$id,$imagetmp,$hidden,$image);
if($updatekore==true){
  $mas="<p class='alert alert-success'>Your Data is updated<button type='button' class='close' data-dismiss='alert'>&times</button> </p>";

}

 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body style="background-color:#DCDCDC" >
<div class="container-sm" >
<?php echo $mas?>
<div class="row">
<div class="col-12">
<table class="table table-hover">
<tr>
<th>
<small>Old Image</small> 
</th>
<td><img style="text-align:center" height="400px" width="400px";  src="classes/afterlogin/image/<?php echo $all['image']?>" class="img-thumbnail img-fluid shadow   " alt="Image Not Upload" ></td>

</tr>
<form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
<tr>
<th>Name</th>
<td><div class="form-group">
    <input type="text" class="form-control" name="name" id="exampleInputPassword1" value="<?php echo $all['name']?>" placeholder="name">
  </div></td>


</tr>
<tr>
<th>Nick name</th>
<td><div class="form-group">
    <input type="text" class="form-control" name="nick" id="exampleInputPassword1" value="<?php echo $all['nicname']?>" placeholder="Enter your nick name">
  </div></td>
  <input name="hidden" type="hidden" value="<?php echo $all['image']?>">

</tr>
<tr>
<th>Email</th>
<td><div class="form-group">
    <input type="Email" class="form-control" name="Email" id="exampleInputPassword1" value="<?php echo $all['email']?>" placeholder="Enter your Email">
  </div></td>


</tr>
<tr>
<th>Number</th>
<td><div class="form-group">
    <input type="text" class="form-control" name="number" id="exampleInputPassword1" value="<?php echo $all['number']?>" placeholder="enter Your number">
  </div></td>


</tr>
<tr>
<th>new image</th>
<td><div class="form-group">
    <input type="file"  name="file">
  </div></td>


</tr>
<th>Update</th>
<td>
    <button type="submit" name="s" class="btn btn-primary ">Update</button>
    <a href="profile.php?id=<?php echo $id?>"  class="text-white btn btn-danger">back</a>
  </td>


</tr>


</form>
</table>
</div> 
</div> 
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>