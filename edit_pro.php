<?php
//include("includes/db.php");
 $con=mysqli_connect("localhost","root","","myshop") or die("unable to connect");
if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('login.php','_self')</script>";
	
}
else{
?>
<?php
if(isset($_GET['edit_pro'])){
	$edit_id=$_GET['edit_pro'];
	$get_edit="select * from products where product_id='$edit_id'";
	$run_edit=mysqli_query($con,$get_edit);
	$row_edit=mysqli_fetch_array($run_edit);
	$update_id=$row_edit['product_id'];
	$p_title=$row_edit['product_title'];
	$cat_id=$row_edit['cat_id'];
	$p_img1=$row_edit['product_img1'];
	$p_desc=$row_edit['product_desc'];
	$p_price=$row_edit['product_price'];
	$p_size=$row_edit['size'];
	$p_keywords=$row_edit['product_keywords'];
	
}
$get_cat="select * from categories where cat_id='$cat_id'";
$run_cat=mysqli_query($con,$get_cat);
$cat_row=mysqli_fetch_array($run_cat);
$cat_edit_title=$cat_row['cat_title'];
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
<form  action="" method="post" enctype="multipart/form-data" >

<table width="600" height='500' align="center">
<tr align='center'>
<td colspan='2'><h1 align="center" style="padding:20px;">Edit Product</h1></td>
</tr>
<tr>
<td align='right'><b>Product Title</b></td>
<td><input type="text" name="product_title" size="40" value="<?php echo $p_title; ?>"></td>
</tr>
<tr>
<td align='right'><b>Category</b></td>
<td><select name="product_cat" >
<option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>

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
<option value="<?php echo $p_size; ?>"><?php echo $p_size; ?></option>
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
<td><input type="number" name="product_price" value="<?php echo $p_price; ?>"/></td>
</tr>
<tr>
<td align='right'><b>Image</b></td>
<td><input type="file" name= "product_img1" /></br><img src="product_images/<?php echo $p_img1; ?>" width='80' height='80'/></td>
</tr>
<tr>
<td align='right'><b>Description</b></td>
<td><textarea  name="product_desc" cols="41" rows="10" value="<?php echo $p_desc; ?>" /><?php echo $p_desc; ?></textarea></td>
</tr>
<tr>
<td align='right'><b>Keywords</b></td>
<td><input type="text" name="product_keywords" size="40" value="<?php echo $p_keywords; ?>" /></td>
</tr>
<tr>
<td></br></td>
</tr>
<tr  >
<td colspan="2" align="center"><input type="submit" value="update" name="update_product"/></td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php } ?>
<?php
if(isset($_POST['update_product']))
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

	
	$update_product="update products set cat_id='$product_cat', date=NOW(),product_price='$product_price', product_title='$product_title' ,size='$product_size' ,product_keywords='$product_keywords', product_desc='$product_desc',product_img1='$product_img1',status='$status' where product_id='$update_id'";
      
	  $run_update= mysqli_query($con,$update_product);
	  if($run_update){
		  echo"<script>alert('Product updated successfully')</script>";
		   echo"<script>window.open('index.php?view_products','_self')</script>";
	  }
	 
	}
}
?>





