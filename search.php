<?php
session_start();
$dbh = mysqli_connect('localhost','root','mahnazrafiaislam','library');
    $search=$_GET['s'];
    $query="SELECT tblbooks.BookName,tblbooks.BookImage,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId where BookName like '%$search%'";
    $res=mysqli_query($dbh,$query) or die("Can't Execute Query...");

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
<?php include('includes/header.php');
?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="entry">
                                        
                                        <table border="5px solid black" width="100%" align="center" 
                                        style="
                                        border-top-width: 5px;
                                        border-right-width: 5px;
                                        border-bottom-width: 5px;
                                        border-left-width: 5px;
                                        width: 80%;
                                        background-color: lavender;">
                                            <?php
                                                $count=0;
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    if($count==0)
                                                    {
                                                        echo '<tr>';
                                                    }
                                                    
                                                    echo '<td width="20%" align="center" style="font-size: 16px;">
                                                        <a href="detail.php?id='.$row['b_id'].'" ><br>
                                                        <img src="'.$row['BookImage'].'" width="80" height="100">
                                                        <br>'.$row['BookName'].'</a>
                                                    </td>';
                                                    $count++;                           
                                                    
                                                    if($count==4)
                                                    {
                                                        echo '</tr>';
                                                        $count=0;
                                                    }
                                                }
                                            ?>
                                            
                                        </table>
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
</body>
</html>
<?php } ?>
