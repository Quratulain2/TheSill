<?php if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('login.php','_self')</script>";
	
}
else{?>
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
<table width='1100' bgcolor='#e4f2cb' align='center'>
<tr align='center'>
<td colspan='6'><h2 style="padding:30px;">VIEW ALL ORDERS</h2></td>
</tr>
<tr>
<th>Order No</th>
<th>Customer</th>
<th>Invoice No</th>
<th>Product ID</th>
<th>Qty</th>
<th>Status</th>
<th>Delete</th>
</tr>
<?php 
$con=mysqli_connect("localhost","root","","myshop") or die("unable to connect");
$get_orders="select * from pending_orders";
$run_orders=mysqli_query($con,$get_orders);
$i=0;
while($row_orders=mysqli_fetch_array($run_orders)){
	
	$order_id=$row_orders['order_id'];
		$customer_id=$row_orders['customer_id'];
		
	$invoice=$row_orders['invoice_no'];
	
	$p_id=$row_orders['product_id'];
	
	$qty=$row_orders['qty'];
	
	$status=$row_orders['order_status'];
$i++;

?>
<tr align='center'>

<td><?php echo $i; ?></td>
<td><?php $get_customer="select * from customers where customer_id='$customer_id'";
$run_customer=mysqli_query($con,$get_customer); 
$row_customer=mysqli_fetch_array($run_customer);
$customer_email=$row_customer['customer_email'];
echo $customer_email;


?></td>
<td bgcolor='#b0e096'><?php echo $invoice; ?></td>
<td><?php echo $p_id; ?></td>
<td><?php echo $qty; ?></td>
<td><?php 
if($status=='Pending'){
	echo $status='Pending';
}
else{
echo $status='Complete';

} ?>

</td>
<td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>">Delete</a></td>
</tr>
<?php } ?>

</table>
</body>
</html>
<?php } ?>