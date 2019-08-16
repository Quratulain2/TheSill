<?php
$db=mysqli_connect("localhost","root","","myshop");

function getPro(){
	global $db;

$get_products="select * from products order by rand() ";
  $run_products=mysqli_query($db,$get_products);
  
  while($row_products=mysqli_fetch_array($run_products)){
	  $pro_id=$row_products['product_id'];
	  $pro_title= $row_products['product_title'];
	  $pro_desc=$row_products['product_desc'];
	  $pro_price=$row_products['product_price'];
	  $pro_size=$row_products['size'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_img1=$row_products['product_img1'];
      
	  echo "
	  <div id='single_product' style='float:left;margin:10px;padding:10px;'>
	  	 <a href='details.php?pro_id=$pro_id' >
		 <img src='admin_area/product_images/$pro_img1' width='280' height='280' /></a>
	  <h3 ><span style='float:left;'>$pro_title</span><b style='float:right;';>$ $pro_price </b></h3>
	  <h3></br><i style='float:left;color:green;'>$pro_size </i></h3>
	  
	  
	  </div>
	  
	  " ; }
}
function showpro(){
	global $db;
	if(isset($_GET['size'])){
		$size=$_GET['size'];
		

$get_products="select * from products where size ='$size' ";
  $run_products=mysqli_query($db,$get_products);
  
  while($row_products=mysqli_fetch_array($run_products)){
	  $pro_id=$row_products['product_id'];
	  $pro_title= $row_products['product_title'];
	  $pro_desc=$row_products['product_desc'];
	  $pro_price=$row_products['product_price'];
	  $pro_size=$row_products['size'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_img1=$row_products['product_img1'];
      
	  echo "
	  <div id='single_product' style='margin:10px;padding:23px;';>
	  	 <a href='details.php?pro_id=$pro_id' ></br></br></br> <img src='admin_area/product_images/$pro_img1' width='350' height='400' /></a>
	  <h3 ><span style='float:left;font-size:30px;'>$pro_title</span><b style='float:right;font-size:25px;';>$ $pro_price </b></h3>
	  <h3></br></br><span style='font-style:italic;float:left;font-size:25px;color:green;<px;'>$pro_size </span></h3>
	  
	  
	  </div>
	  
" ; }
}
else if(isset($_GET['All'])){
		$all=$_GET['All'];
		

$get_products="select * from products ";
  $run_products=mysqli_query($db,$get_products);
  
  while($row_products=mysqli_fetch_array($run_products)){
	  $pro_id=$row_products['product_id'];
	  $pro_title= $row_products['product_title'];
	  $pro_desc=$row_products['product_desc'];
	  $pro_price=$row_products['product_price'];
	  $pro_size=$row_products['size'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_img1=$row_products['product_img1'];
      
	  echo "
	  <div id='single_product' style='margin:10px;padding:23px;';>
	  	 <a href='details.php?pro_id=$pro_id' ></br></br></br> <img src='admin_area/product_images/$pro_img1' width='350' height='400' /></a>
	  <h3 ><span style='float:left;'>$pro_title</span><b style='float:right;';>$ $pro_price </b></h3>
	  <h3></br><span style='font-style:italic;float:left;'>$pro_size </span></h3>
	  
	  
	  </div>
	  
" ; }
}
else if(isset($_GET['cat'])){
		$cat=$_GET['cat'];
		

$get_products="select * from products where cat_id='$cat'";
  $run_products=mysqli_query($db,$get_products);
  
  while($row_products=mysqli_fetch_array($run_products)){
	  $pro_id=$row_products['product_id'];
	  $pro_title= $row_products['product_title'];
	  $pro_desc=$row_products['product_desc'];
	  $pro_price=$row_products['product_price'];
	  $pro_size=$row_products['size'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_img1=$row_products['product_img1'];
      
	  echo "
	  <div id='single_product' style='margin:10px;padding:23px;';>
	  	 <a href='details.php?pro_id=$pro_id' ></br></br></br> <img src='admin_area/product_images/$pro_img1' width='350' height='400' /></a>
	  <h3 ><span style='float:left;'>$pro_title</span><b style='float:right;';>$ $pro_price </b></h3>
	  <h3></br><span style='font-style:italic;float:left;'>$pro_size </span></h3>
	  </div>
	" ; }	}
	
	else if(isset($_GET['order'])){
		$order=$_GET['order'];
		if($_GET['order']=='LH'){
			$get_products="select * from products order by product_price ";
		}
		else if($_GET['order']=='HL'){
			$get_products="select * from products order by product_price desc ";
		}
		else if($_GET['order']=='AZ'){
			$get_products="select * from products order by product_title  ";
		}
		else if($_GET['order']=='ZA'){
			$get_products="select * from products order by product_title desc  ";
		}
		
		

//$get_products="select * from products where cat_id='$cat'";
  $run_products=mysqli_query($db,$get_products);
  
  while($row_products=mysqli_fetch_array($run_products)){
	  $pro_id=$row_products['product_id'];
	  $pro_title= $row_products['product_title'];
	  $pro_desc=$row_products['product_desc'];
	  $pro_price=$row_products['product_price'];
	  $pro_size=$row_products['size'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_img1=$row_products['product_img1'];
      
	  echo "
	  <div id='single_product' style='margin:10px;padding:23px;';>
	  	 <a href='details.php?pro_id=$pro_id' ></br></br></br> <img src='admin_area/product_images/$pro_img1' width='350' height='400' /></a>
	  <h3 ><span style='float:left;'>$pro_title</span><b style='float:right;';>$ $pro_price </b></h3>
	  <h3></br><span style='font-style:italic;float:left;'>$pro_size </span></h3>
	  </div>
	" ; }	}
	
	 else if(isset($_POST['user_query'])){
		 
		$user_keyword=$_POST['user_query'];
	$get_products="select * from products where product_keywords like '%$user_keyword%' ";
	
	$run_products=mysqli_query($db,$get_products);
  
  while($row_products=mysqli_fetch_array($run_products)){
	  $pro_id=$row_products['product_id'];
	  $pro_title= $row_products['product_title'];
	  $pro_desc=$row_products['product_desc'];
	  $pro_price=$row_products['product_price'];
	  $pro_size=$row_products['size'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_img1=$row_products['product_img1'];
      
	  echo "
	  <div id='single_product' style='margin:10px;padding:23px;';>
	  	 <a href='details.php?pro_id=$pro_id' ></br></br></br> <img src='admin_area/product_images/$pro_img1' width='350' height='400' /></a>
	  <h3 ><span style='float:left;'>$pro_title</span><b style='float:right;';>$ $pro_price </b></h3>
	  <h3></br><span style='font-style:italic;float:left;'>$pro_size </span></h3>
	  </div>
	" ; }
}}

function getRealIpAddr(){
	global $db;
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];}
		else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return  $ip;}
	
function cart(){
	if(isset($_GET['add_cart'])){
		global $db;
		$ip_add=getRealIpAddr();
		$p_id=$_GET['add_cart'];
	$check_pro="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
	$run_check=mysqli_query($db,$check_pro);
	if(mysqli_num_rows($run_check)>0){
		echo "";
	}
	else{
		$q="insert into cart (p_id,ip_add) values('$p_id','$ip_add')";
		$run_q=mysqli_query($db,$q);
		echo"<script> window.open('showpro.php','_self')</script>";
		
	}
		}}
function items(){
	
	if(isset($_GET['add_cart'])){
		global $db;
		$ip_add=getRealIpAddr();
		$get_items="select * from cart where ip_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);
		}
	else{
		global $db;
		$ip_add=getRealIpAddr();
		$get_items="select * from cart where ip_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
		echo "(" .$count_items .")";}
function total_price(){
	
	
global $db;
$ip_add=getRealIpAddr();
$total=0;
$sel_price="select * from cart where ip_add='$ip_add'";
$run_price=mysqli_query($db,$sel_price);
while($record=mysqli_fetch_array($run_price)){
	$pro_id=$record['p_id'];
	$pro_price="select * from products where product_id='$pro_id'";
	$run_pro_price=mysqli_query($db,$pro_price);
	while($p_price=mysqli_fetch_array($run_pro_price)){
		$product_price=array($p_price['product_price']);
		$values=array_sum($product_price);
		$total+=$values;
	}
	}
  echo "($" . $total .")";
}
	
	
	
?>
