<?php
include '../config/connection.php';
//get html form values in local variables
$username = $_POST["username"];
$password =$_POST["password"];
// create query
$q = "SELECT * FROM admin WHERE username = '"
    . $username . "'" . " AND password ='" .$password . "'";

echo "query" . $q; //comment/uncomment for error checking
//Run query
$r = mysqli_query($connection,$q) or die(mysqli_error());

//check if any data was returned from the database
if ($obj = mysqli_fetch_assoc($r)) {
	session_start();
	//echo "session started!";
	//login succeeds, create session variables
	$_SESSION["valid_id"] = $obj['userID'];
	$_SESSION["valid_user"] = $username;
	$_SESSION["valid_time"] = time();
	
	echo $_SESSION["valid_id"];
	echo $_SESSION["valid_user"];
	echo $_SESSION["valid_time"]; 
	
	//Redirect to member page
	header("location: ../product/adminpage.php"); //comment/uncomment for error checking
	}else{
		//Redirect to login fail page
		header("location: login_fail.php"); //comment/uncomment for error checking
	}
	?>