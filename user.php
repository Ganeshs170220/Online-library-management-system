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
      .dashboard{
  background-color: #c8c3e450;
  border-start-end-radius: 20px;
  border-end-end-radius: 20px;
}
.user-profile{
  line-height: 70px;
  color: white;
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
          if(isset($_SESSION["studentid"])){
            ?>
            <button onclick="over('user-logout')" class="user-log"><?php echo $_SESSION["studentid"];?></button>

         
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
          <a href="user.php" class="user-banner-icon-data dashboard"><i class="bi bi-speedometer2 icon"></i>Dashboard</a>
          <a href="apply.php" class="user-banner-icon-data"><i class="bi bi-hand-index-thumb-fill icon"></i>Apply</a>
          <a href="statusmain.php" class="user-banner-icon-data"><i class="bi bi-binoculars-fill icon"></i>Status</a>
          <a href="activitymain.php" class="user-banner-icon-data"><i class="bi bi-activity icon"></i>Activity</a>
          <a href="profilemain.php" class="user-banner-icon-data"><i class="bi bi-person-circle icon"></i>Profile</a>
          <a href="booksentermain.php" class="user-banner-icon-data"><i class="bi bi-book-half icon"></i>Donate</a>
        </div>
    </div>
    <div class="user-banner-right">
      <div class="user-banner-right-data">
        <h2>Search Books</h2>
      </div>
      <div class="searchbooks">
        <form action="" method="post">

          <label for="searchbooks" class="searchbookslabel">Search:</label><input type="text" value="" name="bookname" id="searchbooks" placeholder="search by book name">
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

    $sql = "select * from books where books like '%$search%'";

      $result = $conn->query($sql);

    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc() ){
      ?><center><p class="booksearch"><?php echo $row["books"]."<br>";?></p></center><?php
	
}}
else {
	?><center><p class="booksearch"><?php echo '0 Records Found';?></p></center><?php
}}
 else {
	?><center><p class="booksearch"><?php echo '0 Records Found';?></p></center><?php
}}

$conn->close();
?>
    </div>
    </div>
<script src="script.js"></script>

