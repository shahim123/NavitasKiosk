<?php
//Starting the session
session_start();
$con=mysqli_connect('localhost','root','','users');//DB Connection
$email=$_POST['email'];
$res=mysqli_query($con,"select * from visitors where email='$email'");//Feteching data from DB
$count=mysqli_num_rows($res);
if($count>0){
	$otp=rand(11111,99999);//Randoming an OTP number
	mysqli_query($con,"UPDATE visitors SET otp='$otp' WHERE email='$email'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
	smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}else{
	echo "not_exist";
}
//Function for PHP Mailer
function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'TLS'; 
	$mail->Host = "smtp.sendgrid.net";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "kioskt982@gmail.com";
	$mail->Password = "Password@123456789";
	$mail->SetFrom("kioskt982@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>