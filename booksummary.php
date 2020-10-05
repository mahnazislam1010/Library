<?php
session_start();
$dbh = mysqli_connect('localhost','root','mahnazrafiaislam','library');
    $search=$_GET['s'];
    $query="SELECT tblbooks.BookName,tblbooks.BookImage,tblbooks.BookPdf,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId where BookName like '%$search%'";
    $res=mysqli_query($dbh,$query) or die("Can't Execute Query...");



    $BookPdf = $_GET["BookPdf"];
    $result = mysqli_query($dbh,"SELECT * from  tblbooks WHERE BookPdf=$"BookPdf");

    $book = mysqli_fetch_object($result);
    echo json_encode($book) ;


error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
