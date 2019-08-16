<?php
if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('login.php','_self')</script>";
	
}
else{
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
tr,th{
	border:1px groove black;
}
td{
	text-align:center;
}
td a{
	color:blue;
}
th{
	background-color:black;
	color:white;
}
</style>
</head>
<body>
<?php  if(isset($_GET['view_products'])){ ?>
<table width='1100' align='center' bgcolor='#e4f2cb'>
<tr align='center'>
<td colspan='7'> <h2 style="padding:30px;">View All Products</h2></td></tr>
<tr>
<th>S.No</th>
<th>Title</th>
<th>Image</th>
<th>Price</th>
<th>Total Sold</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
$get_pro="select * from products";
$run_pro=mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro)){
	$p_id=$row_pro['product_id'];
	$p_title=$row_pro['product_title'];
	$p_img=$row_pro['product_img1'];
	$p_price=$row_pro['product_price'];
	$status=$row_pro['status'];
	$i++;

?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $p_title;?></td>
<td><img src="product_images/<?php echo $p_img; ?>" width='70' height='70'></td>
<td><?php echo "$".$p_price;?></td>
<td>
<?php  
$get_sold="select * from pending_orders where product_id='$p_id'";
$run_get=mysqli_query($con,$get_sold);
$count=mysqli_num_rows($run_get);
echo $count;

?>
</td>
<td><?php echo $status;?></td>
<td><a href="index.php?edit_pro=<?php echo $p_id; ?>">Edit</a></td>
<td><a href="delete_pro.php?delete_pro=<?php  echo $p_id; ?>">Delete</a></td>

</tr>
<?php } ?>
</table>
<?php } 
?>
</body>
</html>
<?php } ?>