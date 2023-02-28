<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OLMS</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time();?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
      .checkout{
  background-color: #c8c3e450;
  border-start-end-radius: 20px;
  border-end-end-radius: 20px;
}
.user-profile{
  line-height: 70px;
  color: white;
}
.table{
    color: white;
    border-color: white;
    font-family: 'poppins';
margin-top: 20px;
}
td,th{
    padding: 10px;
}
    </style>
  </head> 
  <body>
    <div class="container">
    <header>
        <div class="logo">
          <a href="index.html">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
        </div>
        <div class="user-profile">
          
          <?php 
          if(isset($_SESSION["aadharid"])){
            ?>
            <button onclick="over('user-logout')" class="user-log"><?php echo $_SESSION["aadharid"];?></button>

         
            <?php
}
?>
          <ul>
            <button class="user-logout" id="user-logout" style="visibility: hidden"><i class="bi bi-box-arrow-right"></i><a class="user-logout-color" href="logout.php">Logout</a></button>
          </ul>
        </div>
        
    </header>
  </div>
  <hr>
  <div class="user-banner">
    <div class="user-banner-left">
    <div class="user-banner-data">
        <a href="admin.php" class="user-banner-icon-data"><i class="bi bi-speedometer2 icon"></i>Dashboard</a>
          <a href="admin-bookrequests.php" class="user-banner-icon-data "><i class="bi bi-pencil-square icon"></i>Requests</a>
          <a href="checkin.php" class="user-banner-icon-data"><i class="bi bi-bag-check-fill icon"></i>Checkin</a>
          <a href="checkout.php" class="user-banner-icon-data checkout"><i class="bi bi-bag-dash-fill icon"></i>Checkout</a>
          <!-- <a href="#" class="user-banner-icon-data"><i class="bi bi-person-circle icon"></i>Student Registration</a> -->
        </div>
    </div>
    <div class="user-banner-right">
      <div class="user-banner-right-data">
        <h2>Search Student Checkout</h2>
      </div>
      <div class="searchbooks">
        <form action="" method="post">

          <label for="searchbooks" class="searchbookslabel">Search:</label><input type="text" value="" name="bookname" id="searchbooks" placeholder="Type yes">
          <input class="search-books-submit" name="submit" type="submit"><i class="bi bi-search search-icon"></i>
        </form>
      </div>
      <?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "olms";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
if(isset($_POST['submit'])){
  $search = $_POST['bookname'];
if($search=="")
    {
      ?><center><p class="booksearch"><?php echo '0 Records Found';?></p></center><?php
        // $_SESSION['erroroccur']="fill the field";
        // header("location:user.php");
    }   
    else if ((isset($_POST['bookname']) && !empty(($_POST['bookname']))))
    {
        if(isset($_POST['bookname'])=='yes'){

?>
            <center><table class="table" align="center" border="1px">
          
          <tr>
            <!-- <th>ID</th> -->
            <th>Studentid</th>
            <th>Student Name</th>
            <th>Aadharid</th>
            <th>studentphno</th>
            <th>Book Name</th>
            <!-- <th>Request</th> -->
          </tr><?php

    $sql = "SELECT * from bookapply where status like '%$search%' ";
    // $sql = "select * from books where books like '%$search%'";

      $result = $conn->query($sql);

    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc() ){
      ?>   <tr>
                                    <td><?php echo $row["studentid"]; ?></td>
                                    <td><?php echo $row["studentname"]; ?></td>
                                    <td><?php echo $row["aadharid"]; ?></td>
                                    <td><?php echo $row["studentphno"]; ?></td>
                                    <td><?php echo $row["selectthebook"]; ?></td>
                                
                                </tr>
        <?php 
	
}}}
else {
	?><center><p class="booksearch"><?php echo '0 Records Found';?></p></center><?php
}
}
else {
	?><center><p class="booksearch"><?php echo '0 Records Found';?></p></center><?php
}}
 else {
	?><center><p class="booksearch"><?php echo '0 Records Found';?></p></center><?php
}

$conn->close();
?></table></center>
    </div>
    </div>
<script src="script.js"></script>

