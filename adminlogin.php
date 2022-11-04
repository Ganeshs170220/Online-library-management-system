<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

session_start(); 
include "connect.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['aadharid'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $aadharid = validate($_POST['aadharid']);

    if (empty($username)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: index.php?error=Password is required");

        exit();
    }else if(empty($aadharid)){

        header("Location: index.php?error=Password is required");

        exit();
    
    }else{

        
        $sql = "SELECT * FROM adminlogindetails WHERE username='". $_POST["username"] . "'AND password='" . $_POST["password"] . "' ";
        // $sql2 = "SELECT * FROM logindetails WHERE aadhar_id='" . $_POST["aadhar_id"] . "'";
        $result = mysqli_query($conn, $sql);
        // $result2 = mysqli_query($conn, $sql2);
        // $row=0;$row2 = 0;
        // $aadhar_id = 'aadhar_id';

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            
            if ($row['username'] === $username && $row['password'] === $password ) {

                // if(mysqli_num_rows($result2)===1){
                //     $row2 = mysqli_fetch_assoc($result2);
                if($row['aadharid'] === $aadharid)
                {
                // echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['aadharid'] = $row['aadharid'];

                header("Location: admin.php");
                // exit();
                }
                else{
                    $_SESSION['amaadhar']='error';
                    header("location:adminloginmain.php");
                }
            
            
            }
            }else{
                $_SESSION['amudetails']='error';
                header("location:adminloginmain.php");
            }
    
        }


    }
else{
    $_SESSION['m1']='error';
    header("location:adminloginmain.php");
    exit();

}


?>




</body>
</html>
