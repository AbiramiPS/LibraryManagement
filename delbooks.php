<?php
session_start();
$con = mysqli_connect("localhost","root","","project");

if(isset($_POST['deletebtn']))
{
    $title = $_POST['title'];

    $query = "DELETE FROM addbook WHERE title='$title' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Book Deleted Successfully";
        echo 'alert("Book successfully deleted ")'; 
        header("Location: admin.php");
    }
    else
    {
        $_SESSION['status'] = "Book Not Deleted";
        header("Location: admin.php");
    }
}

?>