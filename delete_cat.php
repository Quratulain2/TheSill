<?php 
$con=mysqli_connect("localhost","root","","myshop") or die("unable to connect");
if(isset($_GET['delete_cat'])){
	$delete_id=$_GET['delete_cat'];
	$delete_pro="delete from categories where cat_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_pro);
	if($run_delete){
		echo "<script>alert('One category has been  deleted ')</script>";
		echo"<script>window.open('index.php?view_cats','_self')</script>";
	}
}
?>