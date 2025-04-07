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
  <button class="tablinks" onclick="openCity(event, 'search')">SEARCH BOOK</button>
  <button class="tablinks" onclick="openCity(event, 'request')">REQUEST BOOK</button>
  <button class="tablinks" onclick="openCity(event, 'return')">RETURN BOOKS</button>
  <button class="tablinks" onclick="openCity(event, 'pay')">PAY AMOUNT</button>
  <a href="login.php" class="hey"><strong>Log Out</strong></a>
</div>

<div id="search" class="tabcontent">
  
    <section>
    <h1><b>SEARCH BOOK</h1></b>
    <label> Enter the title of the book to search:&emsp;&emsp;<br><br>
    <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: Georgia;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button><br><br><br>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>title</th>
                                    <th>author</th>
                                    <th>ISBN</th>
                                    <th>price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","project");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM addbook WHERE CONCAT(id,title,author,ISBN,price) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['title']; ?></td>
                                                    <td><?= $items['author']; ?></td>
                                                    <td><?= $items['ISBN']; ?></td>
                                                    <td><?= $items['price']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>
</div>

<div id="request" class="tabcontent">
  <form action="requestbook.php" method="POST">
  <section>
    <h1><b>REQUEST BOOK</h1></b>
    <label> Title:&emsp;&ensp;
      <input id="title" placeholder="Enter book title" name="title" type="text" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br>

    <label> Author:&ensp;
      <input type="text" placeholder="Enter Author Name" name="author" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br>

    <label> ISBN:&emsp;
      <input type="text" placeholder="Enter ISBN" name="ISBN" style="height: 35px; width: 200px; border-radius: 5px;">
    </label><br><br>

    
    <div class=req>
          <input type="submit" name="login" value="DELETE BOOK" class="btn_css"> 
    </div> 
   </section>
  </form>
 
</div>

<div id="return" class="tabcontent">
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
          <th>Operation</th>
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
        . $row["price"]."<td><a href='#'>select </td>". "</td></tr>";
    }
    echo "</table>";
    } else { echo "0 results"; }
    $conn->close();
    ?>
    
    
    
      </table>
</div>

<div id="pay" class="tabcontent">
  <h3>Amount</h3>
  <p>payyyyyyyyyy Amount </p>
</div>


 </body>
 </html>
 