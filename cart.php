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
td{
	  border-bottom: 1px solid #ddd;
}

</style>
</head>
<body>
<div  id="back-layer">
<div  id="top-header">
     <p class="header">The Sill</p>
      
</div>
   
	<div class="main">
	
	
	<div  id="front"  >
      <h1 class="head" style="font-size:80px";>Shopping Bag<p style="font-size:20px;font-weight:normal;";></br>Looks like you're ready for some free plant delivery! <a href="index.php" style="color:green;">Continue Shopping </a></p></h1>
	    
 
</div>
      

<ul class="navbar">
<li><a  href="#"style="margin:40px;font-size:20px;" >Shop</a>
<?php
if(isset($_SESSION['customer_email'])){  

echo "<a  href='customer/my_account.php' style='margin:30px;font-size:20px;'>My Account</a>";}
  else{
echo"<a  href='customer/my_account.php' style='margin:30px;font-size:20px;display:none;'  >My Account</a>";
	  
  }?>
<a href="search.php" style="margin-left:550px;font-size:20px;">Search</a>
<!--<a href="#" style="margin:90px;font-size:20px;">Log in</a>-->
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

<hr>


</ul>
 
  

<div class="drop" style="display:none;";>
<br>
<ul class ="list" style="list-style-type:none;background-color:white;";>

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
<li style="font-size:25px;"><a href="showpro.php?cat=1">Pot & Planters</a></li>
<li style="font-size:25px;"><a href="showpro.php?cat=2">Potting Mix & Supplies</a></li>
<li></br></li>
</ul>
</div>

	</div>
	
  
  
  
  <div id="container">
  
  <div id="product_box">
  
  <?php showpro(); ?>
  <?php cart(); ?>
  <form method="post" action="cart.php" enctype="multipart/form-data">
  <table width='1340' align='center' >
  <tr align='center' style="font-size:25px;font-weight:bold;color:#726d60;">
  <td width='100'>Remove</td>
   <td colspan='2' width='600' >Product</td>
   <td ></td>
    <td  width=500'> Quantity</td>
	 <td width='300'>Price</td>

  <tr></br></br></tr>
  <?php
  $ip_add=getRealIpAddr();
$total=0;
$sel_price="select * from cart where ip_add='$ip_add'";
$run_price=mysqli_query($con,$sel_price);
while($record=mysqli_fetch_array($run_price)){
	$pro_id=$record['p_id'];
	$pro_price="select * from products where product_id='$pro_id'";
	$run_pro_price=mysqli_query($con,$pro_price);
	while($p_price=mysqli_fetch_array($run_pro_price)){
		$product_price=array($p_price['product_price']);
		$product_title=$p_price['product_title'];
		$product_image=$p_price['product_img1'];
		$product_size=$p_price['size'];
		$price=$p_price['product_price'];
		$values=array_sum($product_price);
		$total+=$values;
	
 
  ?>
  <tr>
  <td><input type="checkbox"  name="remove[]" value="<?php echo $pro_id ?>" /></td>
    <td><img src="admin_area/product_images/<?php echo $product_image;?>" width='180' height='180'/></td>
	  <td style="font-size:20px;color:#726d60;"><?php echo $product_title;?></br><?php echo $product_size;?></td>
	  <td></td>
	    <td><input type="text" name="qty" size="3" value="" /></td>
		
		<?php
		
		
		if(isset($_POST['update'])){
			
			$qty=$_POST['qty'];
			
			$insert_qty="update cart set qty='$qty' where ip_add='$ip_add'";
			$run_qty=mysqli_query($con,$insert_qty);
			
			$total=$total*$qty;
			
		}
		


		?>
	
		
		
		
	
		<td><?php echo "$" .$price; ?></td>
  </tr>
  
<?php }} ?>
<tr>

<td colspan='5' align='right' style="font-size:35px;border:none;margin:30px;"></br>Subtotal : <?php echo "$" .$total;?></td>

</tr>
<tr>
<td colspan='5' align='right' style="border:none;"></br></br><input type="submit" name="update" value="Update Cart" style="width:200px;height:50px;background-color:#1aa373;color:white;font-weight:bold;"/></td>
<td   style="border:none;"></br></br> <button style="width:200px;height:50px;background-color:#1aa373;";><a href="checkout.php" style="text-decoration:none;color:white;font-weight:bold;";">Checkout</a></button></td>
</tr>
  </table>
  </form>
 
 
  

   <?php 
   function updatecart(){
	   global $con;
  if(isset($_POST['update'])){
	  foreach($_POST['remove'] as $remove_id){
		  $delete_products="delete from cart where p_id='$remove_id'";
		  $run_delete=mysqli_query($con,$delete_products);
		  if($run_delete){
			  echo "<script>window.open('cart.php','_self')</script>";
			  
		  }
	 }
  }
	  
	  
   }
  echo @$up_cart=updatecart();
  ?>
  
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
