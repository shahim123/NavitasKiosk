
<?php
//Localhost Connection
$server = "localhost";
$username = "root";
$password = "";
$database = "users";
//Script for database Connection
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>