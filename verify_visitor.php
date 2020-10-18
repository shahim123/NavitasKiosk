<?php 
$conn = mysqli_connect("localhost","root","","users");//Db connect

//if(isset($_POST['login'])){
	//Script to verify the visitor!
	$id = $_GET['id'];
	$token = $_GET['token'];

	$select = "UPDATE visitors SET status = 'Active' WHERE id = '$id' AND token = '$token'";
	$result = mysqli_query($conn,$select);
	if ($result) {
		echo "verify successful. you can log in now";
	}else{
		echo "verify faild";
	}

//}
