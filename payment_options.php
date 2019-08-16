<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Payment Options</title>
</head>
<body>
<?php
include("includes/db.php");
 $con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 //include("functions/functions.php"); 
?>

<div align='center' style="padding:20px;color;background-color:#e4f2cb;">
<h1 style="text-decoration:underline;color:green;">Payment options</h1>
<?php
$ip=getRealIpAddr();
$get_customer="select * from customers where customer_ip='$ip'";
$run_customer=mysqli_query($con,$get_customer);
$customer=mysqli_fetch_array($run_customer);
$customer_id=$customer['customer_id'];

?>
<b><h2></br>Pay with paypal</h2> </b><b>or</b><a href="order.php?c_id=<?php echo $customer_id;?>"  style="font-size:20px;color:blue;"> &nbsp;pay offline</a>
<b><h2></br>If you selected pay offline then please check your email or account to find the invoice number for your order</h2></b>
</div>
</body>
</html>