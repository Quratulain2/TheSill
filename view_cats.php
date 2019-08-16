<!DOCTYPE HTML>
<html>
<head>
<style>
tr,th{
	border:1px groove black;
	padding:10px;
}
td{padding:10px;}
th{
	background-color:black;
	color:white;
}
</style>
</head>
<body>
<table width='1100' align ='center' bgcolor='#e4f2cb'>
<tr align='center'>
<td colspan ='4'><h2 style="padding:10px;"></br>VIEW ALL CATEGORIES</h2></td>
</tr>
<tr>
<th>Category Id</th>
<th>Category Title</th>
<th>Edit</th>
<th>Delete</th>
</tr>



<?php
$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect");
$get_cat="select * from categories";
$run_cat=mysqli_query($con,$get_cat);
while($row_cats=mysqli_fetch_array($run_cat)){
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];	

?>
<tr align='center'>
<td><?php echo $cat_id; ?></td>
<td><?php echo $cat_title;?></td>
<td><a href="index.php?edit_cat=<?php echo $cat_id ;?>" style="color:blue;">Edit</a></td>
<td><a href="index.php?delete_cat=<?php echo $cat_id ;?>" style="color:blue;">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>