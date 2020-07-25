<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>

     <!-- jQuery -->
 
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="components/bootstrap/dist/js/jquery.js"></script>
 
  
 
 <!-- Bootstrap core CSS -->
 <link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom styles for this template -->
 <link href="components/bootstrap/dist/css/simple-sidebar.css" rel="stylesheet">
 <link rel="stylesheet" href="components/bootstrap/dist/css/postataskbox.css" />
 
    <link rel="stylesheet" href="components/bootstrap/dist/css/projectdes.css" />

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

   

 

 
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
<div class="container">
    <div class="col-sm-8">
        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                    <img src="user_images/<?php echo $im; ?>" class="img-circle avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#"><b></b></a>
                    
                    </div>
                </div>
            </div> 
            <div class="post-description"> 
              
               <?php
$title = $_GET['s_title'];
$p_id = $_GET['id'];

echo $title;

?>
             
   
          
                
            </div>
            <form action="comment.php" method="post">

            <div class="post-footer">
                <div class="input-group"> 
                    <textarea class="form-control" cols="100" rows="10" placeholder="Add a comment" type="text" name="comment"></textarea>
                    <input class="form-control"  type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>">
                    <input class="form-control"  type="hidden" name="pid" value="<?php echo $p_id;?>">
                    <div class="btn-group" role="group" style="margin-top:5px">
                    <button type="submit" name="submit_comment"  class="btn btn-primary btn-hover-green" >Post Your Comment</button>
                </div>
                </div>
                </form>
                
                    <?php 
                      $p_id = $_GET['id'];
                      
                     $sql=mysqli_query($con,"select * from comments where post_id_c='$p_id'");
                    while($comnt=mysqli_fetch_array($sql)){
                            //fetching all posts
                            $time_ago = $comnt['comment_time'];

                        echo '
                
                <ul class="comments-list">
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="http://bootdey.com/img/Content/user_1.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user">   '.$comnt['name'].'</h4>
                                <h5 class="time">'.timeAgo($time_ago).'</h5>
                            </div>
                            <p>'.$comnt['comment'].'</p>
                        </div>
                       
                    </li>
                
                </ul>
                
                ';  
                    }   
                ?>
                
            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
 
<!-- Bootstrap Core JavaScript -->
<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>


    

</body>
</html><?php } ?>
