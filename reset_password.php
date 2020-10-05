<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['change']))
{

if (isset($_GET['token'])) {
	$token = $_GET['token'];


$newpassword=md5($_POST['newpassword']);


$con="update tblstudents set Password=:newpassword where token=:token";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':token', $token, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "$token";
if ($chngpwd1){
$_SESSION['msg']= "Your password successfully updated.";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
} else{
	$_SESSION['msg']= "Your password not updated.";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}




}


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Password Recovery </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">Change Password</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 CHANGE YOUR PASSWORD
</div>
<div class="panel-body">
<form role="form" name="chngpwd" method="post" onSubmit="return valid();">



<div class="form-group">
<label>New Password</label>
<input class="form-control" type="password" name="newpassword" required autocomplete="off"  />
</div>

<div class="form-group">
<label>Confirm New Password</label>
<input class="form-control" type="password" name="confirmpassword" required autocomplete="off"  />
</div>



 <button type="submit" name="change" class="btn btn-info">Chnage Password</button> | <a href="index.php">Login</a>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>