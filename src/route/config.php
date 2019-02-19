
<?php
	if(!isset($dbh)){
 		session_start();
 		date_default_timezone_set("Asia/Jakarta");
 		$musername = "root";
 		$mpassword = "";
 		$hostname  = "localhost";
 		$dbname    = "warehousenesia"; //nama database yang telah dibuat
 		$dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=3306",$musername, $mpassword);
 		/*Change The Credentials to connect to database.*/
	}
?>