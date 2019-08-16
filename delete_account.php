<form action="" method="post">
<table width='800' align='center'>
<tr align='center'>
<td colspan='2'><h2>Do you really want to delete your account ?</h2></td>
</tr>
</br>
<tr align='center'>
<td><input type="submit" name="yes" value="Yes ,I want to delete" style="background:#007b5f;border:none;width:200px;height:30px;color:white;"/>
<input type="submit" name="no" value="No ,I don't want to delete" style="background:#007b5f;border:none;width:200px;height:30px;color:white;"/></td>
</tr>
</table>
</form>
<?php
 $con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 $c=$_SESSION['customer_email'];
 if(isset($_POST['yes'])){
	 $delete_customer="delete * from customer where customer_email='$c'";
	 $run_delete=mysqli_query($con,$delete_customer);
	 if($run_dalete){
		 session_destroy();
		 echo"<script>alert('Your account has been deleted!')</script>";
		 echo"<script>window.open('../index.php','_self')</script>";
 }}
	 if(isset($_POST['no'])){
		 echo"<script>window.open('my_account.php','_self')</script>";
	 }
 
?>