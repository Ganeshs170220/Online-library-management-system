<?php
include("connect.php");
// $query = "SELECT * FROM `bookapply`";
// $result = mysqli_query($conn,$query);
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
      .status{
  background-color: #c8c3e450;
  border-start-end-radius: 20px;
  border-end-end-radius: 20px;
}
.user-profile{
  line-height: 70px;
  color: white;
}
.hr{
  margin-top: 15px;
}
.approve-status{
  background-color: #2B7A0B;
  text-align: center;
}
.pending-status{
  background-color: #FFB200;
  text-align: center;
}
.rejected-status{
  background-color: #D2001A;
  text-align: center;
}
table{
  width: 90%;
  color:white;
  font-family: 'poppins';
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
          <a href="user.php" class="user-banner-icon-data"><i class="bi bi-speedometer2 icon"></i>Dashboard</a>
          <a href="apply.php" class="user-banner-icon-data"><i class="bi bi-hand-index-thumb-fill icon"></i>Apply</a>
          <a href="statusmain.php" class="user-banner-icon-data status"><i class="bi bi-binoculars-fill icon"></i>Status</a>
          <a href="activitymain.php" class="user-banner-icon-data"><i class="bi bi-activity icon"></i>Activity</a>
          <a href="profilemain.php" class="user-banner-icon-data"><i class="bi bi-person-circle icon"></i>Profile</a>
          <a href="booksentermain.php" class="user-banner-icon-data"><i class="bi bi-book-half icon"></i>Donate</a>
        </div>
    </div>
    <div class="user-banner-right">
      <div class="user-banner-right-data">
        <h2>Your Book Status</h2>
      </div>
      <hr class="hr">
      <div class="searchbooks">

      <table align="center" border="1px">
                
                <tr>
                  <!-- <th>ID</th> -->
                  <th>Studentid</th>
                  <th>Student Name</th>
                  <th>Aadharid</th>
                  <th>studentphno</th>
                  <th>Book Name</th>
                  <th>Request</th>
                </tr>
                
                <?php
                // $sql2 = "SELECT * FROM `bookapply`";
                $studentid = $_SESSION['studentid'];
                // $uniqueid = $_SESSION['id'];
                $query2 = "SELECT * FROM `bookapply` WHERE `studentid`='$studentid'";
                // $query3 = "SELECT * FROM `bookapply` WHERE `studentid`='$studentid' AND `status`='yes' ";
                $result2 = mysqli_query($conn,$query2);
                // $result3 = mysqli_query($conn,$query3);
                
                // $_SESSION['status']=$row3['status']; 
                // if (mysqli_num_rows($result3)) {
                  
                //   while($rows=mysqli_fetch_array($result3)){
                    
                    
                //   }}
                // echo mysqli_num_rows($result2);
                if (mysqli_num_rows($result2)) {
                while($rows=mysqli_fetch_array($result2)){
?>
                  <tr>
                  <td><?php echo $rows['studentid']; ?></td>
                  <td><?php echo $rows['studentname']; ?></td>
                  <td><?php echo $rows['aadharid']; ?></td>
                  <td><?php echo $rows['studentphno']; ?></td>
                  <td><?php echo $rows['selectthebook']; ?></td>
                  <?php
                  if ($rows['status']==''){
                        $rows['status'] = 'Pending!';
                        // echo $rows['status'];
                        ?>
                        <td> <p class="pending-status"><?php echo $rows['status']; ?></p></td>
                        <?php
                    }
                    else if ($rows['status']=='yes'){
                      $rows['status'] = 'Approved';
                        // echo $rows['status'];
                        ?>
                        <td><p class="approve-status"><?php  echo $rows['status']; ?></p></td>
                        <?php

                    }
                    else{
                      $rows['status'] = 'Rejected';
                        // echo $rows['status'];
                        ?>
                        <td><p class="rejected-status"><?php  echo $rows['status']; ?></p></td>
                        <?php

                    }
                  ?>
                  </tr>
                  



<?php
                }
              }
            else{
              // echo $studentid = $_SESSION['studentid'];
              // echo "error";
            }
            
                
                ?>
                
                <!-- <td></td> -->
                </table>

      </div>
      </div>
    </div>
<script src="script.js"></script>