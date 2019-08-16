<?php
 include("includes/db.php");
 //$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 include("functions/functions.php");
 session_start();

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-type" content="text/content   charset=UTF-8"   />
<link rel="stylesheet" type="text/css" href="indexstyle.css" />
<script type="text/javascript">
function drops{
	
var x=document.getElementById("drop");

x.style.display="block";
	
}
</script>
<style>
#back-layer{
	background:url("");
}
  #drop{
	 display:none;
 } 
</style>



</head>
<body >
<div  id="back-layer" style="";>
<div  id="top-header">
     <p class="header">The Sill</p>
      
</div>
   
	<div class="main">
	
    <img src ="images/new.jpg" class="image" />
	<div  id="front">
      <h1 class="head"  >Home is where the </br>plants grow.</br> 
      <button id="shopall" style="width:120px;height:45px;background-color:white;border:1px solid white;"><a href="showpro.php?All=all" style="font-size:21px;color:black;font-weight:normal;"  >Shop All</a></button></h1>

<ul class="navbar"  >
<li ><a  href="" style="margin:40px;font-size:22px;"  onclick="drops()" >&emsp; Shop</a>

<?php
if(isset($_SESSION['customer_email'])){  

echo "<a  href='customer/my_account.php' style='margin:30px;font-size:22px;'>My Account</a>";}
  else{
echo"<a  href='customer/my_account.php' style='margin:30px;font-size:22px;display:none;'  >My Account</a>";
	  
  }?>
<a href="search.php" style="margin-left:750px;font-size:22px;">Search</a>
<a href="#" style="margin:55px;font-size:22px;">Price <?php total_price(); ?></a>
<a href="cart.php" style="font-size:22px;">Bag <?php items(); ?></a>
<?php
if(!isset($_SESSION['customer_email'])){
echo "<a href='checkout.php' style='font-size:20px;'>&nbsp;&emsp;Login </a>";}
else{
	echo"<a href='logout.php' style='font-size:20px;'>&nbsp;&emsp;Logout </a>";
}
?>
</li>
</br>
<hr>


</ul>

<div id="drop" style="">

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
  <img src="images/p3.jpg" width='600' height='350' style="padding-left:60px;"/>
 
  <img src="images/p29.jpg" width='600' height='350' style="padding-right:60px;float:right;"/>
  <?php cart(); ?>
  <div id="product_box">
  <h1 align='center'>Current favourites</h1>
  <?php getPro(); ?>
 
  </div>
   </div>

 </div>
  <footer id="footer" style="background-color:#e4f2cb;border-top:1px solid grey;" > 
<li class="low-footer"><a href="#" >About Us</a></li>
<li class="low-footer"><a href="#" >Contact Us</a></li>
<li class="low-footer"><a href="#" >Help/FAQ</a></li>
<li class="low-footer"><a href="#" >Track Order</a></li>
<li class="low-footer"><a href="#" >Privacy Policy</a></li>
   </footer>
  


</body>


</html>