<?php if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('login.php','_self')</script>";
	
}
else{ ?>
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
<td colspan='6'><h2 style="padding:30px;">VIEW ALL CUSTOMERS</h2></td>
</tr>
<tr>
<th>S.No</th>
<th>Name</th>
<th>Email</th>
<th>Country</th>
<th>Delete</th>
</tr>
<?php 
$con=mysqli_connect("localhost","root","","myshop") or die("unable to connect");
$get_c="select * from customers";
$run_c=mysqli_query($con,$get_c);
$i=0;
while($row_c=mysqli_fetch_array($run_c)){
	
	$c_id=$row_c['customer_id'];
	$c_email=$row_c['customer_email'];
	$c_name=$row_c['customer_name'];
	$c_country=$row_c['customer_country'];
$i++;

?>
<tr align='center'>

<td><?php echo $i; ?></td>
<td><?php echo $c_name; ?></td>
<td><?php echo $c_email; ?></td>
<td><?php echo $c_country; ?></td>
<td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
</tr>
<?php } ?>

</table>
</body>
</html>
<?php } ?>