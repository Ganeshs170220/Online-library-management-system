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
      .activity{
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
.time{
background-color: #EB1D36;    
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
          <a href="statusmain.php" class="user-banner-icon-data "><i class="bi bi-binoculars-fill icon"></i>Status</a>
          <a href="activitymain.php" class="user-banner-icon-data activity"><i class="bi bi-activity icon"></i>Activity</a>
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
                  <th>Due Date</th>
                </tr>
                
                <?php
            
                
                // $sql2 = "SELECT * FROM `bookapply`";
                $studentid = $_SESSION['studentid'];
                $query2 = "SELECT * FROM `bookapply` WHERE `studentid`='$studentid'";
                // $query3 = "SELECT * FROM `bookapply` WHERE `studentid`='$studentid' AND `status`='yes' ";
                $result2 = mysqli_query($conn,$query2);
                // $result3 = mysqli_query($conn,$query3);
                
                // $_SESSION['status']=$row3['status']; 
                // if (mysqli_num_rows($result3)) {
                  
                //   while($rows=mysqli_fetch_array($result3)){
                    
                    
                //   }}
                // echo mysqli_num_rows($result2);
                $time_now=mktime(date('h')+3,date('i')+30,date('s'));
                // echo $time_now;
                $future1 = date('y-m-d',$time_now);
                // echo $future1;
                $future = date('y-m-d', strtotime($future1. ' + 15 days'));
                // echo $future;
                $date=strtotime($future);
                
    
                $diff=$date-time();
                $days=floor($diff/(60*60*24));
                $hours=round(($diff-$days*60*60*24)/(60*60));
                // echo "$days days $hours hours remain<br />";
                if (mysqli_num_rows($result2)) {
                while($rows=mysqli_fetch_array($result2)){
                    if ($rows['status']=='yes'){
?>
                    
                  <tr>
                  <td><?php echo $rows['studentid']; ?></td>
                  <td><?php echo $rows['studentname']; ?></td>
                  <td><?php echo $rows['aadharid']; ?></td>
                  <td><?php echo $rows['studentphno']; ?></td>
                  <td><?php echo $rows['selectthebook']; ?></td>
                  
                  <td><div class="time"><?php echo $days ,' days ' ,$hours ,' hours ', ' remain ';?></div></td>

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