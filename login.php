<?php
session_start();
$con= mysqli_connect("localhost","root","","myshop") or die("unable to connect"); 
?> 
 <!DOCTYPE HTML>
  <html>
  <head>
        <title>Styled Login Form - UI/UX Tutorial</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
	<h1 align='center' style="color:white;padding:10px;"><?php echo @$_GET['logout'];?></h1>
        <form class="login-form" action="" method="POST">
            <div class="login-form__logo-container">
               
            </div>
            <div class="login-form__content">
                <div class="login-form__header">Admin Login</div>
                <input class="login-form__input" type="email" name="admin_email" placeholder="Email">
                <input class="login-form__input" type="password" name="password" placeholder="Password">
                <button class="login-form__button" type="submit" name="login" >Login</button>
                <div class="login-form__links">
                    <a class="login-form__link" href="./">Forgot your password?</a>
                </div>
            </div>
        </form>
		
    </body>
   </html>
   <?php
   if(isset($_POST['login'])){
	   $user_email=$_POST['admin_email'];
	   $user_pass=$_POST['password'];
	   $sel_admin="select * from admins where admin_email='$user_email' AND admin_pass='$user_pass'";
	   $run_admin=mysqli_query($con,$sel_admin);
	   $check_admin=mysqli_num_rows($run_admin);
	   if($check_admin==1){
		   $_SESSION['admin_email']=$user_email;
		   echo"<script>window.open('index.php?logged_in=You successfully logged In!','_self')</script>";
		   
	   }
	   else{
		   echo"<script>alert('Admin Email or Password is incorrect ,try again!')</script>";
	   }
	   
   }
   ?>