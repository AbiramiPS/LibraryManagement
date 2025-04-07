<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Bookabank Management System</title>
  <link href="admin.css" rel="stylesheet" type="text/css"  />
  <script src="admin.js"></script>
</head>
<body>
  
  <div class="tab">
    <a href="#" class="logo">
      <img src="logo1.jpg">
    </a>
    
  <h4>STUDENTS BOOK BANK</h4>
  <button class="tablinks" onclick="openCity(event, 'add')">ADD BOOK</button>
  <button class="tablinks" onclick="openCity(event, 'delete')">DELETE BOOK</button>
  <button class="tablinks" onclick="openCity(event, 'available')">BOOKS AVAILABLITY</button>
  <button class="tablinks" onclick="openCity(event, 'userdetails')">USER DETAILS</button>
  <a href="login.php" class="hey"><strong>Log Out</strong></a>
</div>

<div id="add" class="tabcontent">
  
  <form action="addbook.php" method="POST">
    <section>
    <h1><b>ADD BOOK</h1></b>
    <label> Title:&emsp;&emsp;
      <input id="title" placeholder="Enter book title" name="title" type="text" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br>

    <label> Author:&emsp;
      <input type="text" placeholder="Enter Author Name" name="author" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br>

    <label> ISBN:&emsp;&ensp;
      <input type="text" placeholder="Enter ISBN" name="ISBN" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br>

    <label> Price:&ensp;&ensp;&ensp;
      <input type="text" placeholder="Enter book price" name="price" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br><br><br>

    <div class="add">
          <input type="submit" name="addbook" value="ADD BOOK" class="btn_css"> 
    </a>
   
   </section>
  </form>


  </div>

<div id="delete" class="tabcontent">
  <form action="delbooks.php" method="POST">

  <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>
  <section>
    <h1><b>DELETE BOOK</h1></b>
    <label> Book Title:&emsp;&ensp;
      <input id="title" placeholder="Enter book title you want to delete" name="title" type="text" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br>

    
    <div class=del>
          <input type="submit" name="deletebtn" value="DELETE BOOK" class="btn_css"> 
    </div> 
   </section>
  </form>
</div>

<div id="available" class="tabcontent">
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
  <table>
    <tr>
      <th>ID</th>
      <th>Book Title</th>
      <th>Author</th>
      <th>ISBN</th>
      <th>Price</th>
    </tr>
    <?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,title,author,ISBN,price FROM addbook";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"] . "</td><td>" . $row["author"] . "</td><td>" . $row["ISBN"] . "</td><td>"
    . $row["price"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>



  </table>
</div>

<div id="userdetails" class="tabcontent">
  <h3>USER DETAILS</h3>

  <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
  <table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Course</th>
      <th>Year of Study</th>
      <th>Address</th>
      <th>Number</th>
      <th>email</th>
      <th>password</th>
    </tr>
    <?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,username,course,yearofstudy,address,number,email,password FROM register";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"] . "</td><td>" . $row["course"] . "</td><td>" . $row["yearofstudy"] . "</td><td>" . $row["address"] . "</td><td>" . $row["number"] . "</td><td>" . $row["email"] . "</td><td>"
    . $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>



  </table>
  
</div>


 </body>
 </html>
 


