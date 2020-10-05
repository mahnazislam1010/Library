<?php
session_start();

$dbh = mysqli_connect('localhost','root','mahnazrafiaislam','library');
    $search=$_GET['s'];
    $query="SELECT tblbooks.BookName,tblbooks.BookImage,tblbooks.BookPdf,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId where BookName like '%$search%'";
    $res=mysqli_query($dbh,$query) or die("Can't Execute Query...");
error_reporting(0);

include('includes/config.php');

$file = $_GET['file'];
header("content-disposition: attachment; filename=".urlencode($file));
$fb = fopen($file, "r");
while(!feof($fb)) {
    echo fread($fb, 819222);
    flush();
}
fclose($fb);



if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>

<?php } ?>
