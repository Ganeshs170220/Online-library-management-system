<?php
session_start();
if(isset($_SESSION['profileupdate'])){
  echo "<script>alert('Profile updated successfully')</script>";
  unset($_SESSION['profileupdate']);
}
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
        .profile{
    background-color: #c8c3e450;
    border-start-end-radius: 20px;
    border-end-end-radius: 20px;
  }
  .p-one input{
    width: 100%;
  }
  input {
  padding-left: 5px;
  height: 30px;
  width: 250px;
  padding-top: 5px;
  border: 1px solid gray;
  border-radius: 5px;
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
          <!-- <img onclick="over('user-logout')" class="user-image" src="images/S170220.png">
         -->
         <?php
          if(isset($_SESSION["studentid"])){
            ?>
            <button onclick="over('user-logout')" class="user-log"><?php echo $_SESSION["studentid"];?></button>
            <!-- <img onclick="over('user-logout')" class="user-image" src="images/S170220.png">
         -->
         
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
              <a href="apply.php" class="user-banner-icon-data apply"><i class="bi bi-hand-index-thumb-fill icon"></i>Apply</a>
              <a href="statusmain.php" class="user-banner-icon-data"><i class="bi bi-binoculars-fill icon"></i>Status</a>
              <a href="activitymain.php" class="user-banner-icon-data"><i class="bi bi-activity icon"></i>Activity</a>
              <a href="profilemain.php" class="user-banner-icon-data profile"><i class="bi bi-person-circle icon"></i>Profile</a>
              <a href="booksentermain.php" class="user-banner-icon-data"><i class="bi bi-book-half icon"></i>Donate</a>
            </div>
        </div>
        <!---------------------------------------------- apply header ------------------------- -->
        
        <div class="user-banner-right apply-banner-right">
            <h2 class="book-apply-heading">Edit Profile</h2>
            <hr>
        <div class="edit-profile-form">
                <div class="edit-profile-sub">
                    <div class="profile-section">
                    <form action="profileupdate.php" method="post" class="profile-section-form">
                        <div class="profile-left-section">
                    <div class="p-one">
                    <label for="userid">Student ID:</label><input type="text" value="<?php if(isset($_SESSION['studentid'])){echo $_SESSION['studentid']; }?>" id="Studentid" name="studentid" required></div>
                    <div class="p-one">
                    <label for="Aadharid">Aadhar id:</label><input type="text" value="<?php if(isset($_SESSION['studentid'])){echo $_SESSION['aadharid']; }?>" id="Aadharid" name="aadharid" required>
                </div>
                <div class="p-one">
                    <label for="studentname">Student Name:</label><input type="text" value="<?php if(isset($_SESSION['studentid'])){echo $_SESSION['studentname']; }?>" id="studentname" name="studentname" required>
                </div>
                <div class="p-one">
                    <label for="studentphno">Student Phno:</label><input type="text" id="studentphno" value="<?php if(isset($_SESSION['studentid'])){echo $_SESSION['studentphno']; }?>" name="studentphno" required>
                </div>
                <div class="p-one">
                  <label for="Year----">Year:</label>
                <select name="year" id="year" class="select-profile-branch" required>
                    <option value=""><?php if(isset($_SESSION['studentid'])){echo $_SESSION['year']; }?></option>
                    <option value="puc">PUC</option>
                    <option value="e1">E1</option>
                    <option value="e2">E2</option>
                    <option value="e3">E3</option>
                    <option value="e4">E4</option>
                  </select>
            </div>
                    <div class="p-one">
                      <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="select-profile-branch" required>
                        <option value=""><?php if(isset($_SESSION['studentid'])){echo $_SESSION['gender']; }?></option>
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>
                        <option value="OTHERS">Others</option>
                      </select>
                </div>
                <div class="p-one">
                    <label for="branch">Branch:</label>
                    <select name="branch" id="branch" class="select-profile-branch">
                        <option value=""><?php if(isset($_SESSION['studentid'])){echo $_SESSION['branch']; }?></option>  
                        <option value="PUC">Puc</option>
                        <option value="CSE">Cse</option>
                        <option value="ECE">Ece</option>
                        <option value="MECH">Mech</option>
                        <option value="CIVIL">Civil</option>
                        <option value="EEE">Eee</option>
                    </select>
                    </div>
                    <!-- <div class="p-one">
                    <label for="studentphno">Upload Image:</label><input type="file" id="studentphno" value="" name="userimage" required>
                </div> -->
                </div>

                <div class="profile-right-section">
                    <div>
                        <img class="profile-section-image" src="images/S170220.png" alt="">
                    </div>
                    <div class="profile-update">
                        <input type="submit" class="profile-submit" name="submit" id="update" value="update">
                    </div>
                </div>
                
                </form>
            </div>
            </div>
                </div>
                
            
        </div>
        </div>  

        </div>
    </div>
<script src="script.js"></script>
        