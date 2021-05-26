<?php

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$friend=$_POST['friend'];
   
	$conn=new mysqli('localhost','root','','Signup');

	if($conn->connect_error){
		die('connection Failed : '.$conn->connect_error);
	}
	
	$sql = "SELECT  Friend FROM Signup where Email='$email'"; 
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$name= $row["Friend"];		
	}
	

	if($name==$friend){
        
        header("Location:passwords.html");
	}
	else{
		echo"Please Enter Correct name";
	}
}
?>