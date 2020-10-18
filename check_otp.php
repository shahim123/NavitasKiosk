<?php
//Starting our session
session_start();
//Database Connection
$con=mysqli_connect('localhost','root','','users');
$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
//query for fetching data from database
$res=mysqli_query($con,"select * from visitors where email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
//query to check if OTP is valid
if($count>0){
	mysqli_query($con,"update user set otp='' where email='$email'");
	$_SESSION['IS_LOGIN']=$email;
	echo "yes";
}else{
	echo "not_exist";
}
?>