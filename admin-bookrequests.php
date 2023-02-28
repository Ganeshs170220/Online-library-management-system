<?php
include("connect.php");
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
      .requests{
  background-color: #c8c3e450;
  border-start-end-radius: 20px;
  border-end-end-radius: 20px;
}
.user-profile{
  line-height: 70px;
  color: white;
}
.hr{
    margin-top: 10px;
}
.pending-status{
  display: inline;
}
.apre{
  display: flex;
  padding-left: 25px;

}
.Approve{
  background-color: #2B7A0B;
  color: white;
}
.Reject{
  width: 80px;
  background-color: #D2001A;
  color: white;
}
button{
  width: 100%;
  padding: 5px;
  margin: 2px;
  font-family: 'poppins';
  border: transparent;
  border-radius: 20px;
  font-weight: 500;
  cursor: pointer;
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
          <a href="admin-bookrequests.php" class="user-banner-icon-data requests"><i class="bi bi-pencil-square icon"></i>Requests</a>
          <a href="checkin.php" class="user-banner-icon-data"><i class="bi bi-bag-check-fill icon"></i>Checkin</a>
          <a href="checkout.php" class="user-banner-icon-data"><i class="bi bi-bag-dash-fill icon"></i>Checkout</a>
          <!-- <a href="#" class="user-banner-icon-data"><i class="bi bi-person-circle icon"></i>Student Registration</a> -->
        </div>
    </div>
    <div class="user-banner-right">
      <div class="user-banner-right-data">
        <h2>Student Book Requests</h2>
      </div>
      <hr class="hr">
      <div class="searchbooks">
        <!-- <form action="" method="post"> -->
        <!-- <div class="searchbooks"> -->

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
          $query2 = "SELECT * FROM `bookapply` WHERE `status`='' ";
          $result2 = mysqli_query($conn,$query2);
          if (mysqli_num_rows($result2)) {
          //  $selectthebook = $_SESSION['selectthebook'];
          //  $studentid = $_SESSION['studentid'];
          while($rowss=mysqli_fetch_array($result2)){
            // $_SESSION['status']= $rowss['status'];
            $_SESSION['id'] = $rowss['id'];
            // $_SESSION['studentname'] = $rowss['']
                  if($rowss['status']==''){
                        ?>
                        <td><?php echo $rowss['studentid']; ?></td>
                                    <td><?php echo $rowss['studentname']; ?></td>
                                    <td><?php echo $rowss['aadharid']; ?></td>
                                    <td><?php echo $rowss['studentphno']; ?></td>
                                    <td><?php echo $rowss['selectthebook']; ?></td>
                              
                        <td> 
                          
                          <!-- <form method="POST"> -->
                          <div class="apre">
                          <a href="approve.php?id=<?php echo $rowss['id']?>"><button class="Approve" type="submit" name='submit1' value="<?php $rowss['id']?>" >Approve</button></a>
                        <a href="reject.php?id=<?php echo $rowss['id']?>"><button class="Reject" type="submit" name ='submit2' value="<?php $rowss['id']?>">  Reject</button></a>
                      </div>
                     
                      </td>
                      <!-- </form> -->
                      <?php
                      
          
         ?>
                      
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
      // echo $_SESSION['s'];
          
          ?>
          <!-- <td></td> -->
          </table>
          

<!-- </div> -->
        <!-- </form> -->
      </div>
    </div>
    </div>
<script src="script.js"></script>
<script>
  function myClickFunc(id){
    console.log('Row ID:',id);
  }
</script>
  </body>
</html>

