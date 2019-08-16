<?php
 //include("includes/db.php");
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

#container{
position:absolute;
top:30%;
font-size:30px;
margin-left:25%;
//background-color:yellow;
//background:url("l1.jpg");
}
#container a:hover{
	color:green;
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
      <div  id="front" style="top:20%;position:absolute;margin-left:85px;;">
  
  <h1 style="text-align:center;font-size:40px;"></br>Manage your account here</br></br></h1>
   
   <?php  getDefault(); ?>
   <?php
   if(isset($_GET['my_orders'])){
	   include("my_orders.php");
   }
    if(isset($_GET['change_pass'])){
	   include("change_pass.php");
   }
   if(isset($_GET['delete_account'])){
	   include("delete_account.php");
   }
   
   ?>
 
  </div>
    <!--  <h1 class="head" style="font-size:80px;";>Log in to</br>your account</br><p style="font-size:25px;font-weight:normal;">Don't have an account ? <a href="customer_register.php" style="color:green;font-weight:bold;" > Create an account </a></p></h1>
	    -->
 
</div>

<ul class="navbar"  >
<li><a  href="#"style="margin:40px;font-size:20px;" >Shop</a>
<!--<a  href="#"style="margin:50px;font-size:20px;">Plants</a>-->
<!--<a href="search.php" style="margin-left:550px;font-size:20px;">Search</a>
<!--a href="#" style="margin:90px;font-size:20px;">Log in</a>-->
<!--<a href="#" style="margin:100px;font-size:20px;">Price <?php total_price(); ?></a>
<a href="cart.php" style="font-size:20px;">Bag //<?php items(); ?></a> -->
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
   <div style="background-color:;height:300px;margin-left:745px;position:absolute;width:260px;border:1px solid black;border-right:0px;">
   <div style="background-color:white;height:50px;text-align:center;border-bottom:1px solid black;">Manage Account </div>
   <ul type="none" style="font-size:25px;text-align:center;">
  <li> <a href="my_account.php?my_orders"></br>My orders</a></li>
  <li> <a href="my_account.php?edit_account"></br>Edit Account</a></li>
  <li> <a href="my_account.php?delete_account"></br>Delete Account</a></li>
  <li> <a href="my_account.php?change_pass"></br>Change password</a></li>
   </ul>
   
  </div>
 
   </div>

 </div>
  <footer id="footer" style="background-color:white;border-top:1px solid grey;" > 
<li class="low-footer"><a href="#" >About Us</a></li>
<li class="low-footer"><a href="#" >Contact Us</a></li>
<li class="low-footer"><a href="#" >Help/FAQ</a></li>
<li class="low-footer"><a href="#" >Track Order</a></li>
<li class="low-footer"><a href="#" >Terms of use</a></li>
<li class="low-footer"><a href="#" >Privacy Policy</a></li>
   </footer>
  


</body>
</html>


