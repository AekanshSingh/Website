<?php

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $npass=$_POST['npass'];
	$cpass=$_POST['cpass'];
    if($npass!=$cpass){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else if(strlen($npass)<=8){
        echo"<script>alert('Password should be greater than 8')</script>";
    }
    else if(ctype_digit($npass)){
        echo"<script>alert('Password should contain Both Alphabets and Numbers')</script>";
    }

    else{
        $conn=new mysqli('localhost','root','','Signup');
        if($conn->connect_error){
            die('connection Failed : '.$conn->connect_error);
    }
    else{
        $sql = "Update Signup set Pass='$npass' where Email='$email'"; 
        if ($conn->query($sql) === TRUE) {  header("Location:index.html"); } 
        else { echo "Error: " . $sql . "<br>" . $conn->error; }
        $conn->close();
    }
}
}

?>