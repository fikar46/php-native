<?php 
include '../../route/config.php';
 
$email = $_POST['email'];
$password = md5($_POST['password']);
 
$login = $dbh->prepare("select * from users where email='$email' and password='$password'");
$login->execute();
$result=$login->fetch();

if($login->rowCount()>0){
    session_start();
    $_SESSION['name'] = $result['first_name'];
	$_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    setcookie('user', $result['first_name'], time() + (86400 * 30), "/");
    setcookie('first_name', $result['first_name'], time() + (86400 * 30), "/");
    setcookie('last_name', $result['last_name'], time() + (86400 * 30), "/");
    setcookie('email', $email, time() + (86400 * 30), "/");
	header("location:/");
}else{
	header("location:/login");	
}
?>