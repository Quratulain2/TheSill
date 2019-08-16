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
<td colspan='7'><h2 style="padding:30px;">VIEW ALL PAYMENTS</h2></td>
</tr>
<tr>
<th>Payment No</th>
<th>Invoice No</th>
<th>Amount Paid</th>
<th>Payment Method</th>
<th>Ref No</th>
<th>Code</th>
<th>Payment date</th>
</tr>
<?php 
$con=mysqli_connect("localhost","root","","myshop") or die("unable to connect");
$get_pay="select * from payments";
$run_pay=mysqli_query($con,$get_pay);
$i=0;
while($row_pay=mysqli_fetch_array($run_pay)){
	
	$pay_id=$row_pay['payment_id'];
		$invoice=$row_pay['invoice_no'];
		
	$amount=$row_pay['amount'];
	
	$pay_mode=$row_pay['payment_mode'];
	
	$ref_no=$row_pay['ref_no'];
	
	$code=$row_pay['code'];
	$date=$row_pay['payment_date'];
$i++;

?>
<tr align='center'>

<td><?php echo $i; ?></td>

<td bgcolor='#b0e096'><?php echo $invoice; ?></td>
<td><?php echo $amount; ?></td>
<td><?php echo $pay_mode; ?></td>
<td><?php echo $ref_no; ?></td>
<td><?php echo $code; ?></td>
<td><?php echo $date; ?></td>


</tr>
<?php } ?>

</table>
</body>
</html>
<?php } ?>