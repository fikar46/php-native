<?php 
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
 
$register = $dbh->prepare("insert into users (first_name, last_name, email, password) values ('$first_name','$last_name','$email','$password')");
$register->execute()
if($register === TRUE){
    session_start();
    $_SESSION['name'] = $first_name;
	$_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    setcookie('user', $first_name, time() + (86400 * 30), "/");
    setcookie('email', $email, time() + (86400 * 30), "/");
	header("location:/");
}else{
    echo "<p class='warning'> Error: server bermasalah</p>";
	
}
?>
