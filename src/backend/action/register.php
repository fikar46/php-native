<?php 
require_once('../../route/config.php');

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
 
$register = "insert into users (first_name, last_name, email, password) values ('$first_name','$last_name','$email','$password')";

if(mysql_query($register) === TRUE){
    session_start();
    $_SESSION['name'] = $first_name;
	$_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    setcookie('user', $first_name, time() + (86400 * 30), "/");
    setcookie('email', $email, time() + (86400 * 30), "/");
	header("location:/");
}else{
    echo "Error: " . $register . "<br>" . $conn->error;
	
}
$conn->close();
?>
