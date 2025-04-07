<?php
    $title = $_POST['title'];
    $author = $_POST['author'];
    $ISBN = $_POST['ISBN'];
    $price = $_POST['price'];
    
    $conn = new mysqli('localhost','root','','project');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } 
    else {
    $stmt = $conn->prepare("INSERT into addbook(title,author,ISBN,price) values(?,?,?,?)");
    $stmt->bind_param("ssss",$title,$author,$ISBN,$price);
    $execval = $stmt->execute(); 
    echo 'alert("Successfully added ")';  
    $stmt->close();
    $conn->close();
    }
?>