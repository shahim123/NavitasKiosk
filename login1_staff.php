<?php
$login = false;
$showError = false;

// Request Type Authentication.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    // Querieng Database for data

    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        //redirecting it to welcome_Staff page if succesfull
        header("location: welcome_staff.php");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>
