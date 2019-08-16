<?php
@session_start();
//include("includes/db.php");
 $con=mysqli_connect("localhost","root","","myshop") or die("unable to connect");
if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('login.php','_self')</script>";
	
}
else{
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
input ,select{
	
	width:250px;
	height:30px;
}
input {
	border-radius:3px;
}
input[type="submit"]{
	color:white;
	background:#007b5f;
	display:block;
	border:none;
	width:150px;
	height:30px;
	
}
td{
	padding:5px;
}
form{
	width:1000px;
	background-color:#e4f2cb;
}
</style>
</head>
<body>
<form  action="insert_product.php" method="post" enctype="multipart/form-data" >

<table width="600" height='500' align="center">
<tr align='center'>
<td colspan='2'><h1 align="center" style="padding:20px;">Insert New product</h1></td>
</tr>
<tr>
<td align='right'><b>Product Title</b></td>
<td><input type="text" name="product_title" size="40" required></td>
</tr>
<tr>
<td align='right'><b>Category</b></td>
<td><select name="product_cat" >
<option><?php  ?></option>
<?php
$get_cats="select * from categories";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats = mysqli_fetch_array($run_cats)){
	$cat_id = $row_cats['cat_id'];
	$cat_title = $row_cats['cat_title'];
	echo"<option value='$cat_id'>$cat_title</option>";
}

?>
</select></td>

</tr>
<tr>
<td align='right'><b>Size</b></td>
<td>
<select name="product_size">
<option><?php ?></option>
<?php
$get_cats="select distinct size from products";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats = mysqli_fetch_array($run_cats)){
	
	$size=$row_cats['size'];
	echo"<option value='$size'>$size</option>";
}

?>
<!--<option>Small</option>
<option>Medium</option>
<option>Large</option>-->
</select></td>
</tr>
<tr>
<td align='right'><b>Price</b></td>
<td><input type="number" name="product_price" required /></td>
</tr>
<tr>
<td align='right'><b>Image</b></td>
<td><input type="file" name= "product_img1" required /></td>
</tr>
<tr>
<td align='right'><b>Description</b></td>
<td><textarea  name="product_desc" cols="41" rows="10" required /></textarea></td>
</tr>
<tr>
<td align='right'><b>Keywords</b></td>
<td><input type="text" name="product_keywords" size="40"  required /></td>
</tr>
<tr>
<td></br></td>
</tr>
<tr  >
<td colspan="2" align="center"><input type="submit" value="insert_product" name="insert_product"/></td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php } ?>
<?php
if(isset($_POST['insert_product']))
{
	$product_title=$_POST['product_title'];
	$product_price=$_POST['product_price'];
	$product_size=$_POST['product_size'];
	$product_desc=$_POST['product_desc'];
	$product_cat=$_POST['product_cat'];
	$product_keywords=$_POST['product_keywords'];
	$status='on';
	
	$product_img1= $_FILES['product_img1']['name'];
	
	$temp_name1= $_FILES['product_img1']['tmp_name'];
	
	
	if($product_title =='' OR $product_desc =='' OR $product_price =='' OR  $product_keywords =='' OR $product_size =='' OR $product_img1 =='' OR $product_cat =='')
	{
		echo "<script>alert( 'Please enter all the fields') </script>";
	exit();
		
	} 
	else{
		move_uploaded_file($temp_name1,"product_images/$product_img1");

	
	$insert_product="INSERT INTO `products`(`cat_id`, `product_title`, `product_desc`, `product_price`, `product_img1`, `date`, `status`, `size`,`product_keywords`) VALUES ('$product_cat','$product_title','$product_desc','$product_price','$product_img1',NOW(),'$status','$product_size','$product_keywords')";
      
	  $run_product= mysqli_query($con,$insert_product);
	  if($run_product){
		  echo"<script>alert('Product insert successfully')</script>";
		  echo"<script>window.open('index.php?insert_product','_self')</script>";
		  
	  }
	 
	}
}
?>





