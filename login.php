<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bookbank management system</title>
        <link href="login.css" rel="stylesheet" type="text/css"/>
        
        <script>
            function pageRedirect() {
                window.location.href = "admin.php";
                
            }
        </script>
    </head>

    <body background="bg3.jpg">  
        <form method="POST">
                <a href="login.php" class="logo">
                    <img src="logo1.jpg">
                </a>
            <section id="tit">
        <h1><b>STUDENTS BOOKBANK</b></h1></section>

        <section id="user">
         <h1><b>User Login</h1></b>
         <label> Username:&ensp;
             <input id="username" placeholder="Enter Username" name="username" type="text">
              </label><br><br>
        <label> Password:&ensp;
              <input type="password" placeholder="Enter Password" name="password" style="height: 35px; width: 200px; border-radius: 5px;">
        </label><br><br>
        <a href="#">
               <input type="submit" name="submit" value="Login" class="btn_css"> 
               
        </a> 


        </section>

        <section id="register">
         <p>  
               Don't have an account?<a href="register.html"> <input type="button"  value="Register" class="btn_css"></a>
               
        </p>
        </section>

        <section id="admin">
        <script src="adminlog.js"></script>
            <h1><b>Admin Login</h1></b>
            <label> Admin name:&ensp;
                <input id="name" placeholder="Enter Username" type="text">
                </label><br><br>
            <label> Password:&emsp;&ensp;
                <input id="password" type="password" placeholder="Enter Password" style="height: 35px; width: 200px; border-radius: 5px;">
            </label><br><br>
        
                <input type="button" name="login" value="Login" class="btn_css" onclick="pageRedirect()" >
     
        </section>
    </form>
    </body>
    
    <?php

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','project');
if($conn->connect_error){
echo "$conn->connect_error";
die("Connection Failed : ". $conn->connect_error);
} 
else {
$stmt = $conn->prepare("select * from register where username= ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0 ){
    $data = $stmt_result->fetch_assoc();
                if ($password ==$data['password']) {
            
                header("Location: user.php");
                }
                else{
                echo '<script>alert("invalid password or username")</script>';
                }
            }
else {
    echo "invald details" ;
}
}


?>

</html>
