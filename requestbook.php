<?php
    $title = $_POST['title'];
    $author = $_POST['author'];
    $ISBN = $_POST['ISBN'];
  
    
    $conn = new mysqli('localhost','root','','project');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } 
    else {
    $stmt = $conn->prepare("INSERT into requestbook(title,author,ISBN) values(?,?,?)");
    $stmt->bind_param("sss",$title,$author,$ISBN);
    $execval = $stmt->execute(); 
    echo 'alert("Your request has been successfully completed ")';  
    $stmt->close();
    $conn->close();
    }
?>