<?php
 include("includes/db.php");
 $con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
 include("functions/functions.php");
 session_start();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="indexstyle.css" />
<style>
#drop{
	display:none;
}
.id ul {
display:inline-block;
list-style-type:none;
}

.head{
position:absolute;
top:30%;
font-size:80px;
margin-left:50px;
}
.title{
position:absolute;
top:29%;
font-size:12px;
margin-left:50px;
color:grey;
}
.dropbtn {
  background-color:white;
  color: grey;
  padding: 15px 30px;
  font-size: 16px;
  
  border: 1px solid grey;

  float:right;
  min-width:160px;
}
.dropdown {
  position:absolute;
  top:50%;
 
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  top:96%;
  background-color: white;
  width: 140px;
  z-index: 0;
   
}
i {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}
.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  
  display: block;
  width:135px;
  border:1px  solid grey;
  
}
.dropdown-content a:hover {background-color:white}
.dropdown:hover .dropdown-content {
  display: block;
}

 i {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}

</style>
</head>
<body>
<div  id="back-layer">
<div  id="top-header">
     <p class="header">The Sill</p>
      
</div>
   
	<div class="main">
	
	
	<div  id="front">
      <h1 class="head" style="font-size:80px";></br>We have </br>something  fresh</br>for you.</br> </h1>
	    
 
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

<a href="#" style="margin:100px;font-size:20px;text-decoration:none;">Price  <?php total_price(); ?></a>
<a href="cart.php" style="font-size:20px;">Bag <?php items(); ?></a>
<?php
if(!isset($_SESSION['customer_email'])){
echo "<a href='checkout.php' style='font-size:20px;'>&nbsp;&emsp;Login </a>";}
else{
	echo"<a href='logout.php' style='font-size:20px;'>&nbsp;&emsp;Logout </a>";
}
?>

</li>


</ul>
 <div style="margin-left:900px;" class="dropdown">
 <button class="dropbtn">All Sizes  <i class="down"></i></button>

  <div class="dropdown-content">
    <a href="showpro.php?All=all">All Sizes</a>
    <a href="showpro.php?size=small">Small</a>
    <a href="showpro.php?size=medium">Medium</a>
	<a href="showpro.php?size=large">Large</a>
  </div>
  </div>
  <div style="margin-left:1100px" class="dropdown">
  <button class="dropbtn">Sort Options  <i class="down"></i></button>

  <div class="dropdown-content">
    
    <a href="showpro.php?order=LH">$ Low to High</a>
    <a href="showpro.php?order=HL">$ High to Low</a>
	<a href="showpro.php?order=AZ">A-Z</a>
	<a href="showpro.php?order=ZA">Z-A</a>
  </div>
</div>

<div id="drop" >

<ul class ="list" style="list-style-type:none;background-color:white;">

<ul >

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
<li style="font-size:25px;"><a href="showpro?size=large">Large</a></li>
<li style="font-size:25px;"><a href="showpro.php?size=small">Small</a></li></ul>
<ul>
<li>Accessories</li>
<li style="font-size:25px;"><a href="showpro.php?cat=4">Pot & Planters</a></li>
<li style="font-size:25px;"><a href="showpro.php?cat=2">Potting Mix & Supplies</a></li>
<li></br></li>
</ul>
</div>

	</div>
	
  
  
  
  <div id="container">
  
  <div id="product_box">
  
  <?php showpro(); 
  cart(); ?>
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
