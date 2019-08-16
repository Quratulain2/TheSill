<?php 
$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
if(isset($_GET['edit_cat'])){
	
	$cat_id=$_GET['edit_cat'];
	$edit_cat="select * from  categories where cat_id='$cat_id'";
	$run_edit=mysqli_query($con,$edit_cat);
	$row_edit=mysqli_fetch_array($run_edit);
	$cat_edit_id=$row_edit['cat_id'];
	$cat_title=$row_edit['cat_title'];
	
}
?>
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
<form action="" method="post" >
<b></br>Edit this category &nbsp;</b>
<input type="text" name="cat_title1" value="<?php echo $cat_title;?>"/></br></br>
<input type="submit" name="update_cat" value="Update Category"/>
</br>
</form>

</body>
</html>
<?php
$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
if(isset($_POST['update_cat'])){
	
	$cat_title123=$_POST['cat_title1'];
	$update_cat="update categories set cat_title='$cat_title123' where cat_id='$cat_edit_id'";
	$run_cat=mysqli_query($con,$update_cat);
	if($run_cat){
		echo"<script>alert('New Category has been updated')</script>";
		echo"<script>window.open('index.php?view_cats','_self')</script>";
	}
} 
?>
