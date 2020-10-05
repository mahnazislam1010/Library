<?php
session_start();
// $dbh = mysqli_connect('localhost','root','mahnazrafiaislam','library');
//     if (isset($_SESSION['favorites'])) 
// 		foreach ($_SESSION['favorites'] as $item){
// 		    $query="SELECT * from  tblbooks where tblbooks.id=".$item;
// 		    $res=mysqli_query($dbh,$query) or die("Can't Execute Query...");
// 		    $row=mysqli_fetch_assoc($res);
// 		    print_r($row);
// }
error_reporting(0);
include('includes/config.php');
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "select from tblbooks  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
// header('location:manage-books.php');

}

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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
$dbh = mysqli_connect('localhost','root','mahnazrafiaislam','library');
if (isset($_SESSION['favorites'])){ 
	foreach ($_SESSION['favorites'] as $item){
	$query="SELECT tblbooks.BookName,tblbooks.BookImage,tblbooks.BookPdf,tblbooks.BookSummary,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId where tblbooks.id=".$item;
	$res=mysqli_query($dbh,$query) or die("Can't Execute Query...");
	$row=mysqli_fetch_assoc($res);



                                                    if($count==0)
                                                    {
                                                        echo '<tr>';
                                                    }
                                                    
                                                    echo '<td width="20%" align="center" style="font-size: 16px;">
                                                        <a href="detail.php?id='.$row['b_id'].'" ><br>
                                                        <img src="assets/img/'.$row['BookImage'].'" width="80" height="100">
                                                        <br>'.$row['BookName'].'</a>



                                                        <br>';?>


                                                        
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#ab<?php echo $row['bookid']; ?>" ><i class="fa fa-pencil"></i> Preview</button>
                                                        

                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#cd<?php echo $row['bookid']; ?>" ><i class="fa fa-pencil"></i> Read</button>

                                                        <?php echo '
                                                        
                                                        <a href="download.php?file=assets/img/'.$row['BookPdf'].'">  <button class="btn btn-success"><i class="fa fa-pencil"></i> Download</button>
                                                        
                                                         
                                                    </td>'; ?>



<!-- Modal to Preview Book-->
<div class = "modal fade" id = "ab<?php echo $row['bookid'];?>" tabindex = "-1" role = "dialog" aria-hidden = "true" >
    
   <div class = "modal-dialog modal-lg">
      <div class = "modal-content">
          
         <div class = "modal-header">
            <h4 class = "modal-title">
               Book Details
            
 
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
               <b>X</b>
            </button>
            </h4>
         </div>
          
         <div id = "modal-body">
          <?php echo '
            <embed src="assets/img/'.$row['BookSummary'].'" height="550px" width="892px"  />'?>
            <!-- assets/img/'.$row['BookPdf'].' -->

         </div>
          
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               OK
            </button>
         </div>
          
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
    
</div><!-- /.modal  to Preview Book-->







<!-- Modal to Read Book-->
<div class = "modal fade" id = "cd<?php echo $row['bookid'];?>" tabindex = "-1" role = "dialog" aria-hidden = "true" >
    
   <div class = "modal-dialog modal-lg">
      <div class = "modal-content">
          
         <div class = "modal-header">
            <h4 class = "modal-title">
               Book Details
            
 
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
               <b>X</b>
            </button>
            </h4>
         </div>
          
         <div id = "modal-body">
          <?php echo '
            <embed src="assets/img/'.$row['BookPdf'].'" height="550px" width="892px"  />'?>
            <!-- assets/img/'.$row['BookPdf'].' -->

         </div>
          
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               OK
            </button>
         </div>
          
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
    
</div><!-- /.modal  to Read Book-->



















                                                    
                                                    <?php
                                                    $count++;                           
                                                    
                                                    if($count==4)
                                                    {
                                                        echo '</tr>';
                                                        $count=0;
                                                    }
                                                
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