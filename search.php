<?php
$con=mysqli_connect("localhost","root","","myshop") or die("unable to connect");
include("functions/functions.php");
?>


<!DOCTYPE HTML>
<html>
<head>
<style>
body{
	margin:0;
	padding:0;
	width:1360px;
	//height:350px;
	height:auto;
	background:url("p76.jpg");
	background-size;cover;
	background-repeat:repeat;
	background-position:center center;
	//background-blur:20px;
	background-color:white;
	
	
	
	
}
input[type="text"]{
	width:40%;
	height:40px;
	border:2px solid green;
	border-radius:4px;
	outline:none;
	padding:10px;
	margin-left:30%;
	margin-top:0%;
	background:white;
	font-size:20px;
	

	
}
input[type="text"]:hover{
	//border-color:green;
}
h3{
	margin-top:16%;
	font-size:35px;
	color:black;
	
}

</style>
</head>
<body>

<form action="showpro.php" method="POST" enctype="multipart/form-data">
<h3 align='center'>Search</h3>
<input type="text" name="user_query" placeholder="Type to search" autofocus="on" />

</form>

</body>
</html>