<?php
//include("include/db.php");
 $con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
//include("functions/functions.php");
session_start();
if(isset($_GET['order_id'])){
	$order_id=$_GET['order_id'];

}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<style>
input[type="text"],select{
	width:200px;
	height:25px;
}
input ,select{
	
	width:250px;
	height:30px;
}
input {
	border-radius:3px;
}
td{
	padding:5px;
}
form{
	padding:15px;
	margin-left:200px;
	margin-top:20px;
		width:800px;
	background-color:#e4f2cb;
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
<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
<table width='900' height='500px;' align='center'>
<tr align='center'>
<td colspan='5'><h2>PAYMENT CONFIRMATION</h2></td>
</tr>
<tr>
<td align='right'>Invoice No </td>
<td><input type="text" name="invoice_no" required /></td>
</tr>
<tr>
<td align='right'>Amount Paid </td>
<td><input type="text" name="amount" required /></td>
</tr>
<tr>
<td align='right'>Select Payment Mode :</td>
<td><select name="payment_method" required >
<option>----</option>
<option>Bank transfer</option>
<option>Easypaisa/UBL Omni</option>
<option>Paypal</option>
</select></td>
</tr>

<tr>
<td align='right'>Easypaisa/UBL OMNI code </td>
<td><input type="text" name="code" size="5" /></td>
</tr>
<tr>
<td align='right'>Transaction/Reference ID </td>
<td><input type="text" name="tr"/></td>
</tr>
<tr>
<td align='right'>Payment date</td>
<td><input type="text" name="date" required /></td>
</tr>
<tr align='center'>
<td colspan='5'><input type="submit" name="confirm" value="Confirm Payment"/></td>
</tr>
</table>
</form>
</body>
</html>

<?php
if(isset($_POST['confirm'])){
	$update_id=$_GET['update_id'];
	$invoice=$_POST['invoice_no'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];
	$ref_no=$_POST['tr'];
	$code=$_POST['code'];
	$payment_method=$_POST['payment_method'];
	$complete='Complete';
	$insert_payment ="insert into payments(invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice','$amount','$payment_method','$ref_no','$code','$date')";
	$run_payment= mysqli_query($con,$insert_payment);
	$update_order="UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";
	$run_order= mysqli_query($con,$update_order);
	$update_pending_order="updat pending_orders set order_status='$complete'  where order_id='$update_id'";
	$run_pending_order=mysqli_query($con,$update_pending_order);
	
	
	if($run_payment){
		echo"<h2 style='text-align:center;'>Payment received ,your order will be completed within 24 hours </h2>";	
	}
	
}
?>



