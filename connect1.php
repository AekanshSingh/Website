<?php

// Grab User submitted information
$email = $_POST["email"];
$pass = $_POST["password"];

$con=new mysqli('localhost','root','','Signup');

if($con->connect_error){
		die('connection Failed : '.$con->connect_error);
	}
$sql = "SELECT email,pass FROM Signup WHERE email = '$email'"; 
	$result = $con->query($sql);

$row = mysqli_fetch_array($result);

if($row["email"]==$email && $row["pass"]==$pass)
    header("Location:index.html");
else
    echo"Sorry, your credentials are not valid, Please try again.";
?>