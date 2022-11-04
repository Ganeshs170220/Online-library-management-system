<?php
session_start();

if(isset($_SESSION['rsuccess'])){
  echo "<script>alert('Registration successfull')</script>";
  unset($_SESSION['registersuccess']);
}
if(isset($_SESSION['registererror'])){
  echo "<script>alert('all fields are required')</script>";
  unset($_SESSION['registererror']);
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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <style>
      .error {
        text-align: center;
      }
      h4{
        padding-top: 10px;
        color: red;
      }
      .bi-exclamation-triangle-fill{
        color: red;
        padding-right: 3px;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="logo">
          <a href="index.html">OLMS</a>
        </div>
        <!--------------------------------------- navigation bar starts here--------------------- -->
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="aboutus.html"> About us</a></li>
            <li><a href="#"> Contact us</a></li>
            <li><a href="#" class="register-nav-link"> Admin Login
            </a></li>
          </ul>
        </nav>
        <!--------------------------------------- navigation bar ends here--------------------- -->
      </header>
    </div>
    <!--------------------------------------- banner starts here--------------------- -->
    <div class="banner">
      <div class="bannerleft">
        <div class="banner-image"></div>
      </div>
      <div class="bannerright">
        <div class="bannerright2">
        <h3>Welcome to OLMS!</h3>
        <h2>Register to continue OLMS</h2>
        <form action="register.php" method="POST" class="user">
          <div class="login">
            <input
              type="email"
              name="username"
              placeholder="Email Address*"
              required
            />
          </div>
          <div class="pass">
            <input
              class="password"
              type="password"
              name="password"
              id="password"
              placeholder="Password*"
              required
            /><i class="bi bi-eye-slash" id="toggle"></i>
          </div>
          <div class="AadharID">
            <input
              type="text"
              name="aadharid"
              placeholder="Aadhar ID*"
              required
            />
          </div>
          <div class="login-submit">
            <input
              type="submit"
              name="submit"
              value="Register"
              class="submit-button"
            />
          </div>
          <div class="register">
            Alrady have an account<a href="adminloginmain.php" class="registerlink"
              ><u>Login</u></a
            >
          </div>
        </form>
      </div>
      </div>
    </div>
    
    <!---------------------------------------footer starts here--------------------- -->
    <div class="footer">
      <div class="allrights">&copy; All Rights Reserved 2022.</div>
      <div class="rgukt">
        Rajiv Gandhi University of Knowledge Technologies, Srikakualm.
      </div>
    </div>
    <!---------------------------------------footer ends here--------------------- -->
    <!--------------------------------------- banner ends here--------------------- -->
    <script src="script.js"></script>
   
  </body>
</html>
