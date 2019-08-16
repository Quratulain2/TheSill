
<?php
$con=mysqli_connect("localhost","root","","myshop");
include("functions/functions.php");
$pro_id=$_GET['pro_id'];
$query="SELECT * FROM `products` WHERE product_id='$pro_id'";
$run_products=mysqli_query($con,$query);
while($row_products=mysqli_fetch_array($run_products)){
	  $pro_id=$row_products['product_id'];
	  $pro_title= $row_products['product_title'];
	  $pro_desc=$row_products['product_desc'];
	  $pro_price=$row_products['product_price'];
	  $pro_size=$row_products['size'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_img1=$row_products['product_img1'];
      
	  echo "
	  <div id='single_product' style='top:13%;position:fixed;margin-left:150px;' >
	  	 <img src='admin_area/product_images/$pro_img1' width='450' height='500' style='border:2px solid grey;' />
	 </div>
	  " ;
	  echo" <div style='float:right;top:13%;position:fixed;margin-left:750px;width:450px;background-color:#e4f2cb;padding:20px;'>
	  <h1>$pro_title</h1>
	  <h2><i>$pro_size</i></h2>

	  <p>$pro_desc</p> 
	  </br>
	 <a href='showpro.php?add_cart=$pro_id' style='text-decoration:none;'> <button style='background-color:#007b5f;color:white;display:block;border:none;height:50px;width:300px;font-size:18px;font-weight:bold;'>$<b>$pro_price</b>&emsp;Add To Cart</button></a>
	 
	  </div>";  }
	 
	 

?>
