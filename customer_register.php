<?php
 include("includes/db.php");
 $con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 include("functions/functions.php");
 session_start();
 

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-type" content="text/content   charset=UTF-8"   />
<link rel="stylesheet" type="text/css" href="indexstyle.css" />
<style>

#cont{
position:absolute;
top:30%;
font-size:30px;
margin-left:25%;
//background-color:yellow;
//background:url("l1.jpg");
}
input{
	width:95%;
	height:30px;
}
td{
	color:black;
}
</style>


</head>
<body >
<div  id="back-layer" style="";>
<div  id="top-header">
     <p class="header">The Sill</p>
      
</div>
   
	<div class="main">
	
 
	<div  id="front">
      <div  id="front">
    <!--  <h1 class="head" style="font-size:80px;";>Log in to</br>your account</br><p style="font-size:25px;font-weight:normal;">Don't have an account ? <a href="customer_register.php" style="color:green;font-weight:bold;" > Create an account </a></p></h1>
	    -->
 
</div>

<ul class="navbar"  >
<li><a  href="#"style="margin:40px;font-size:20px;" >Shop</a>
<?php
if(isset($_SESSION['customer_email'])){  

echo "<a  href='customer/my_account.php' style='margin:30px;font-size:22px;'>My Account</a>";}
  else{
echo"<a  href='customer/my_account.php' style='margin:30px;font-size:22px;display:none;'  >My Account</a>";
	  
  }?>
<a href="search.php" style="margin-left:550px;font-size:20px;">Search</a>
<!--a href="#" style="margin:90px;font-size:20px;">Log in</a>-->
<a href="#" style="margin:100px;font-size:20px;">Price <?php total_price(); ?></a>
<a href="cart.php" style="font-size:20px;">Bag <?php items(); ?></a>
<?php
if(!isset($_SESSION['customer_email'])){
echo "<a href='checkout.php' style='font-size:20px;'>&nbsp;&emsp;Login </a>";}
else{
	echo"<a href='logout.php' style='font-size:20px;'>&nbsp;&emsp;Logout </a>";
}
?>
</li>
</br>



</ul>

<div class="drop" style="display:none;">

</br>

<ul class ="list"style="list-style-type:none;background-color:white;">

<ul>

</br>
<li >Featured</li>
<li><a href="" style="font-size:25px;">New arrivals</a></li>
<li style="font-size:25px;"><a href="showpro.php?All=all">Shop All Plants</a></li>
<li></br></li>
</ul>
<!--<ul>

<li>Collections</li>
<li style="font-size:25px;"><a href="">Easy for beginner</a></li>
<li style="font-size:25px;"><a href="">Pet friendly</a></li>
<li></br></li>
</ul>-->
<ul>
<li>Sizes</li>


<li style="font-size:25px;"><a href="showpro.php?size=medium">Medium</a></li>
<li style="font-size:25px;"><a href="showpro.php?size=large">Large</a></li>
<li style="font-size:25px;"><a href="showpro.php?size=small">Small</a></li></ul>
<ul>
<li>Accessories</li>
<li style="font-size:25px;"><a href="showpro.php?cat=1">Pot & Planters</a></li>
<li style="font-size:25px;"><a href="showpro.php?cat=2">Potting Mix & Supplies</a></li>
<li></br></li>
</ul>
</div>

	</div>
	
  </div>
  <div id="container">
  <div id="cont">
  <form action="customer_register.php" method="post">
  <table width='600' align='center'>
  <tr align='center'>
  <td colspan='2' align='center' style="font-size:50px;color:green;">Create an Account</td>

  </tr>
  <tr><td align='right'>Name &nbsp;</td>
  <td><input type="text" name ="c_name" required /></td></tr>
  <tr><td align='right'>Email &nbsp; </td>
  <td><input type="email" name ="c_email" required /></td></tr>
  <tr><td align='right'>Password &nbsp;</td>
  <td><input type="password" name ="c_pass" required /></td></tr>
  <tr><td align='right'>Country &nbsp;</td>
  <td><select name="c_country">
  <option>Pakistan</option>
  <option>India</option>
  <option>United State</option>
  </select>
  
  
  
  </td></tr>
  <tr><td align='right'>City &nbsp;</td>
  <td><input type="text" name ="c_city" required /></td></tr>
  <tr><td align='right'>Contact &nbsp;</td>
  <td><input type="text" name ="c_contact" required /></td></tr>
  <tr><td align='right'>Address &nbsp;</td>
  <td><input type="text" name ="c_address" required /></td></tr>
  <tr ><td  colspan='5'align='right' ><input type="submit" name="register" value="Submit" style="width:10%;height:30px;"/></td></tr>
  </table>
  </form>
  <div id="product_box">
  
  </div>
   </div>
</div>
 </div>
  <footer id="footer" style="background-color:white;border-top:1px solid grey;" > 
<li class="low-footer"><a href="#" >About Us</a></li>
<li class="low-footer"><a href="#" >Contact Us</a></li>
<li class="low-footer"><a href="#" >Help/FAQ</a></li>
<li class="low-footer"><a href="#" >Track Order</a></li>

<li class="low-footer"><a href="#" >Privacy Policy</a></li>
   </footer>
  


</body>
</html>
<?php
global $con;
if(isset($_POST['register'])){
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	$c_ip=getRealIpAddr();
	$insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_address,customer_contact,customer_ip) values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_contact','$c_ip')";
    $run_customer=mysqli_query($con,$insert_customer);
	$sel_cart="select * from cart where ip_add='$c_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart>0){
		$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Account created successfully !')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
	}
	else{
		$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Account created successfully !')</script>";
		echo"<script>window.open('index.php','_self')</script>";
	}



}
?>

