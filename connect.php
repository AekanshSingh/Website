<?php

if(isset($_POST['register'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass = $_POST["pass"];  
    $confirm = $_POST["confirm"];  
    $friend = $_POST["friend"];  
    if($pass!=$confirm){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else if(strlen($pass)<=8){
        echo"<script>alert('Password should be greater than 8')</script>";
    }
    else if(ctype_digit($pass)){
        echo"<script>alert('Password should contain Both Alphabets and Numbers')</script>";
    }

    else{
        $conn=new mysqli('localhost','root','','Signup');
        if($conn->connect_error){
            die('connection Failed : '.$conn->connect_error);
    }
    
    else{
        
        $sql = "INSERT INTO signup (FirstName, LastName, Email, Pass ,Friend ,Active) values ('$fname','$lname','$email','$pass','$friend','Yes')"; 
        if ($conn->query($sql) === TRUE) { header("Location:index.html");} 
        else { echo "Error: " . $sql . "<br>" . $conn->error; }
         $conn->close();
     }
    
    }


}
?>