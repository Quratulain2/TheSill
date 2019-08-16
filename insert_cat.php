<?php if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('login.php','_self')</script>";
	
}
else{?>
<!DOCTYPE HTML>
<html>
<head>
<style>
input[type="text"]{
	border-radius:3px;
	width:300px;
	height:25px;
}
form{
	margin:10%;
	background-color:#e4f2cb;
	width:800px;
	height:100px;
	border:1px solid grey;
}
input[type="submit"]{
	color:white;
	background:#007b5f;
	display:block;
	border:none;
	width:150px;
	height:30px;
}
</style>
</head>
<body>
<form action="" method="post">
<b></br>Insert new category &nbsp;</b><input type="text" name="cat_title" autofocus="on"/></br></br>
<input type="submit" name="insert_cat" value=" Insert Category"/>
</form>
<?php 
$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
if(isset($_POST['insert_cat'])){
	
	$cat_title=$_POST['cat_title'];
	$insert_cat="insert into categories (cat_title) values('$cat_title')";
	$run_cat=mysqli_query($con,$insert_cat);
	if($run_cat){
		echo"<script>alert('New category has been inserted')</script>";
		echo"<script>window.open('index.php?view_cats','_self')</script>";
	}
}
?>
</body>
</html>
<?php } ?>