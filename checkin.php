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
        .hr{
            margin-top: 10px;
        }
      .checkin{
  background-color: #c8c3e450;
  border-start-end-radius: 20px;
  border-end-end-radius: 20px;
}
.user-profile{
  line-height: 70px;
  color: white;
}
h4{
    margin-top: 5vh;
    color: white;
    text-align: center;
    font-family: 'poppins';
    font-weight: 300;
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
          <a href="checkin.php" class="user-banner-icon-data checkin"><i class="bi bi-bag-check-fill icon"></i>Checkin</a>
          <a href="checkout.php" class="user-banner-icon-data"><i class="bi bi-bag-dash-fill icon"></i>Checkout</a>
          <!-- <a href="#" class="user-banner-icon-data"><i class="bi bi-person-circle icon"></i>Student Registration</a> -->
        </div>
    </div>
    <div class="user-banner-right">
      <div class="user-banner-right-data">
        <h2>Search Student Checkin</h2>
        <hr class="hr">
        <h4>No Records Found.</h4>
      </div>
      
      
    </div>
    </div>
<script src="script.js"></script>

