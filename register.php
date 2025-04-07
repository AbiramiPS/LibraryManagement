<?php
    $username = $_POST['username'];
    $course = $_POST['course'];
    $yearofstudy = $_POST['yearofstudy'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = new mysqli('localhost','root','','project');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } 
    else {
    $stmt = $conn->prepare("insert into register(username,course,yearofstudy,address,number,email,password) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss",$username,$course,$yearofstudy,$address,$number,$email,$password);
    $execval = $stmt->execute(); 
    echo 'alert("Successfully submitted ")';  
    $stmt->close();
    $conn->close();
    }
?>