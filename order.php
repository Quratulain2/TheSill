<?php
include("includes/db.php");
 $con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 include("functions/functions.php");
 //getting customer id
 if(isset($_GET['c_id'])){
	 $customer_id=$_GET[c_id];
	 
 }
 //getting product price and number of items
 
$ip_add=getRealIpAddr();
$total=0;
$sel_price="select * from cart where ip_add='$ip_add'";
$run_price=mysqli_query($con,$sel_price);
$status='Pending';
$invoice_no=mt_rand();
$count_pro=mysqli_num_rows($run_price);
while($record=mysqli_fetch_array($run_price)){
	$pro_id=$record['p_id'];
	$pro_price="select * from products where product_id='$pro_id'";
	$run_pro_price=mysqli_query($db,$pro_price);
	while($p_price=mysqli_fetch_array($run_pro_price)){
		$product_price=array($p_price['product_price']);
		$values=array_sum($product_price);
		$total+=$values;
	}
	}
	//getting quantity from cart
	$get_cart="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($con,$get_cart);
	$get_qty=mysqli_fetch_array($run_cart);
	$qty=$get_qty['qty'];
	if($qty==0){
		$qty=1;
		$sub_total=$total;
	}
	else{
		$qty=$qty;
		$sub_total=$total*$qty;
	}
	$insert_order="insert into customer_orders (customer_id,invoice_no,due_amount,total_products,order_date,order_status) values('$customer_id','$invoice_no','$sub_total','$count_pro',NOW(),'$status')";
	$run_order=mysqli_query($con,$insert_order);
	if($run_order){
		echo"<script>alert('Order Successfully submited ,Thanks !')</script>";
		echo"<script>window.open('customer/my_account.php','_self')</script>";
		
		$insert_to_pending_orders="insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status) values('$customer_id','$invoice_no','$pro_id','$qty','$status') ";
		$run_pending_order=mysqli_query($con,$insert_to_pending_orders);
		$empty_cart="delete from cart where ip_add='$ip_add'";
		$run_empty=mysqli_query($con,$empty_cart);
	}
	
 
 
?>