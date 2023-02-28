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

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['aadhar_id'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $aadhar_id = validate($_POST['aadhar_id']);

    if (empty($username)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: index.php?error=Password is required");

        exit();
    }else if(empty($aadhar_id)){

        header("Location: index.php?error=Password is required");

        exit();
    
    }else{

        echo "success main";
        $sql = "SELECT * FROM logindetails WHERE username='". $_POST["username"] . "'AND password='" . $_POST["password"] . "' ";
        // $sql2 = "SELECT * FROM logindetails WHERE aadhar_id='" . $_POST["aadhar_id"] . "'";
        $result = mysqli_query($conn, $sql);
        // $result2 = mysqli_query($conn, $sql2);
        // $row=0;$row2 = 0;
        // $aadhar_id = 'aadhar_id';

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            echo "succes main2";
            
            if ($row['username'] === $username && $row['password'] === $password ) {

                // if(mysqli_num_rows($result2)===1){
                //     $row2 = mysqli_fetch_assoc($result2);

                
                if($row['aadhar_id'] === $aadhar_id)
                {
                // echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['aadhar_id'] = $row['aadhar_id'];
                header("Location: user.php");
                $aadhar_id = $_POST["aadhar_id"];
                $sql2 = "SELECT * FROM profiledata WHERE aadharid='" . $_POST["aadhar_id"] . "'";
                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) === 1) {
                $row2 = mysqli_fetch_assoc($result2);
                echo "success1";
                if($row2['aadharid'] === $aadhar_id)
                {
                    $_SESSION['studentid']=$row2['studentid'];
                    $_SESSION['aadharid']=$row2['aadharid'];
                    $_SESSION['studentphno']=$row2['studentphno'];
                    $_SESSION['studentname']=$row2['studentname'];
                    $_SESSION['year']=$row2['year'];
                    $_SESSION['gender']=$row2['gender'];
                    $_SESSION['branch']=$row2['branch'];
                    echo "success";

               
                // exit();
                }}}
                else{
                    $_SESSION['m']='error';
                    header("location:loginmain.php");
                }

            }else{
                $_SESSION['m1']='error';
                header("location:loginmain.php");
            }
    
        }else{
            $_SESSION['m1']='error';
            header("location:loginmain.php");
            exit();

        }

    }


}else{
    $_SESSION['m1']='error';
    header("location:loginmain.php");
    exit();

}


?>




</body>
</html>
