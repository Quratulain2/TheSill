<?php 

$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 //include("functions/functions.php");
 @session_start();
 
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="indexstyle.css"/>
<style>
input{
	width:70%;
	height:40px;
	border:1px solid grey;
	padding:5px;
	margin:5px;
}
td{
	color:grey;
	font-size:20px;
	padding:10px;
}


</style>
</head>
<body>
 <h1 class="head" style="font-size:80px;";>Log in to</br>your account</br><p style="font-size:25px;font-weight:normal;">Don't have an account ? <a href="customer_register.php" style="color:green;font-weight:bold;" > Create an account </a></p></h1>
<div style="float:right;margin-left:750px;top:25%;position:absolute;">
<form action="checkout.php" method="post">
<table width='590' align='center'>
<tr>
<td > Email  </td>
</tr>
<tr>
<td><input type="text" name="c_email" value="" placeholder="Email"/></rd>
</tr>
<tr>
<td > Password  </td>
</tr>
<tr>

<td><input type="password" name="c_pass" value="" placeholder="Password"/></td>
</tr>
<tr >
<td  ><a href="forgot_pass.php" style="color:#1aa373;font-weight:bold;">Forgot your password ?</a></td>

</tr>
<tr >
<td  >
<input type="submit" name="c_login" value="Sign In" style="background-color:#1aa373;color:white;"/></td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['c_login'])){
	$customer_email=$_POST['c_email'];
	$customer_pass=$_POST['c_pass'];
	$sel_customer="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer=mysqli_query($con,$sel_customer);
	$check_customer=mysqli_num_rows($run_customer);
	$get_ip=getRealIpAddr();
	$sel_cart="select * from cart where ip_add='$get_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_customer==0){
		echo" <script>alert('password or email address is not correct !')</script>";
		exit();
	}
	if($check_customer==1 AND $check_cart==0){
		$_SESSION['customer_email']=$customer_email;
		echo"<script>window.open('customer/my_account.php','_self')</script>";		
	}
	
	else{
		$_SESSION['customer_email']=$customer_email;
		include("payment_options.php");
		//echo"<script>window.open('payment_options.php','_self')</script>";	
	}
	
}
?>
