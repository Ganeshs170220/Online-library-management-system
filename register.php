<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "olms";
$conn = mysqli_connect($server,$username,$password,$dbname);
session_start();
if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $aadharid = $_POST["aadharid"];

        $sql = "INSERT INTO adminlogindetails (`username`,`password`,`aadharid`) values ('$username','$password','$aadharid')";
        $run = mysqli_query($conn,$sql);
        if($run){
            // header("Location: user.html");
            $_SESSION['registersuccess']="data submitted successfully";
            header("location:loginmain.php");
          
    }
    else{
        $_SESSION['registerdataerror']='dataerror';
        header("location:adminregister.php");
        // echo "<script>alert('error in data')</script>";
    }
    }
    else{
        $_SESSION['registerdataerror']='dataerror';
        header("location:adminregister.php");
        // echo "<script>alert('error in data')</script>";
    }


?>

