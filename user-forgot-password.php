<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['change']))
{
$email=$_POST['email'];

  $sql ="SELECT * FROM tblstudents WHERE EmailId=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);

$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{

    // $userdata = mysqli_fetch_array($query);
    // $fname = $userdata['fname'];
    // $token = $userdata['token'];

foreach ($results as $result) {
    $to_email = $email;
    $subject = "Password Reset";
    $body = "Hi, $result->FullName. <br> Click here to reset your password.<br>
    http://localhost/Library/reset_password.php?token=$result->token ";
    $headers .= "MIME-Version: 1.0"."\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
    $headers .= 'From: nehasarker49@gmail.com'."\r\n";
    if(mail($to_email, $subject, $body, $headers)){
        $_SESSION['msg']= "Check your mail to reset your password $email";

        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "Email sending failed...";
    }



}

}
else {
echo "<script>alert('This Email id is not registered.');</script>"; 
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
<h4 class="header-line">User Password Recovery</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 RECOVER ACCOUNT
</div>
<div class="panel-body">
<form role="form" name="chngpwd" method="post" onSubmit="return valid();">

<div class="form-group">
<label>Enter Reg Email id</label>
<input class="form-control" type="email" name="email" required autocomplete="off" />
</div>




 <button type="submit" name="change" class="btn btn-info">Send Recovery Link</button> 

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
