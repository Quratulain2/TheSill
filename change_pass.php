<style>
td{
	padding:5px;
	font-size:20px;
	
}
input{
	width:200px;
	height:20px;
}

</style>
<form action="" method="post" >
<table width='500' height='100' bgcolor='#bac2cf'>
<tr align="center">
<td colspan='4' style="text-decoration:underline;"><h3>CHANGE YOUR PASSWORD</h3> </td>
</tr>
<tr align="right">
<td >Current Password</td>
<td><input type="password" name="old_pass" required autofocus="on" /></td>
</tr>
<tr align="right">
<td>New Password</td>
<td><input type="password" name="new_pass" required /></td>
</tr>
<tr align="right">
<td>New Password Again </td>
<td><input type="password" name="new_pass_again" required /></td>
</tr>
<tr align='center'>
<td colspan='4'><input type="submit" name="change_pass" value="Change Password"/></td>
</tr>
</table>
</form>
<?php
 $con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 $c=$_SESSION['customer_email'];
 if(isset($_POST['change_pass'])){
	 $old_pass=$_POST['old_pass'];
	  $new_pass=$_POST['new_pass'];
	   $new_pass_again=$_POST['new_pass_again'];
	   $get_real_pass="select * from customers where customer_pass='$old_pass'";
	   $run_real_pass=mysqli_query($con,$get_real_pass);
	   $check_pass=mysqli_num_rows($run_real_pass);
	   if($check_pass==0){
		   echo"<script>alert('Your current password is not valid try again !')</script>";
		   exit();
	   }
	   if($new_pass!=$new_pass_again){
		   echo"<script>alert('New password did not match, try again !')</script>";
		    exit();
	   }
	   else{
		   $update_pass="update customers set customer_pass='$new_pass' where customer_email='$c'";
		   $run_pass=mysqli_query($con,$update_pass);
		   echo"<script>alert('Your password has been successfully changed ! !')</script>";
		   echo"<script>window.open('my_account.php','_self')</script>";
	   }
 }
?>