<?php
session_start();

$dbh = mysqli_connect('localhost','root','mahnazrafiaislam','library');

include('includes/config.php');



?>
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
<meta http-equiv="refresh" content="0;url=show-favorites.php"/>
</head>
<body>
	Favorite Added
	<?php 
	$bookid=$_GET['bookid'];
	if (!isset($_SESSION['favorites'])) {
		$favoritesArr = array();
		$_SESSION['favorites']=$favoritesArr;
	}
	if(!in_array($bookid, $_SESSION['favorites'], true)){
        array_push($_SESSION['favorites'], $bookid);
    }
	
	
    echo $favorites[0];
    echo $favorites[1];
    echo $favorites[2];
    echo $favorites[3];
    echo count($favorites);
 ?>

</body>
</html>	

