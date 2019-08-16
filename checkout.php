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

.head{
position:absolute;
top:30%;
font-size:80px;
margin-left:50px;
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

echo "<a  href='customer/my_account.php' style='margin:30px;font-size:20px;'>My Account</a>";}
  else{
echo"<a  href='customer/my_account.php' style='margin:30px;font-size:20px;display:none;'  >My Account</a>";
	  
  }?>
<a href="search.php" style="margin-left:550px;font-size:20px;">Search</a>
<!--a href="#" style="margin:90px;font-size:20px;">Log in</a>-->
<a href="#" style="margin:100px;font-size:20px;text-decoration:none;">Price <?php total_price(); ?></a>
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
  <?php 
  if(!isset($_SESSION['customer_email'])){
	  include("customer/customer_login.php");
  }
  else{
	 // echo"<script>window.open('payment_options.php','_self')</script>";	
	  include("payment_options.php");
  }
  
  
  //cart();
  ?>
  <div id="product_box">
  
  </div>
   </div>

 </div>
  <footer id="footer" style="	background-color:#e4f2cb;border-top:1px solid grey;" > 
<li class="low-footer"><a href="#" >About Us</a></li>
<li class="low-footer"><a href="#" >Contact Us</a></li>
<li class="low-footer"><a href="#" >Help/FAQ</a></li>
<li class="low-footer"><a href="#" >Track Order</a></li>

<li class="low-footer"><a href="#" >Privacy Policy</a></li>
   </footer>
  


</body>
</html>

