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
$server = "localhost";
$username = "root";
$password = "";
$dbname = "olms";
$conn = mysqli_connect($server,$username,$password,$dbname);

session_start();
if($_POST['submit']){
    $name = $_POST['username'];
    $password = $_POST['password'];
    $aadhar_id = $_POST["aadhar_id"];    
    // $passwordConfirm = $_POST['repassword'];
    $data = $_POST;
        $sql=mysqli_query($conn,"SELECT * FROM logindetails where username='$name' AND password='$password'");
        if(mysqli_num_rows($sql)>0)
        {
            // echo "Email Id Already Exists"; 
            $_SESSION['Emailexists']= "Email Id Already Exists";
            header("location:studentregister.php");
            // exit;
        }
        else{
        $name = $_POST["username"];  
        $pattern = "^[s]+([0-9]{6})*@+\brguktsklm.ac.in\b^";  
        if (!preg_match ($pattern, $name) ){  
            // $ErrMsg = "Email is not valid.";  
            // echo $ErrMsg;  
            $_SESSION['errmsg']="Email is not valid";
            header("location:studentregister.php");
        } 
        else{
        if(mysqli_num_rows($sql)<=0){
            $query = "INSERT INTO logindetails (`username`,`password`,`aadhar_id`) values ('$name','$password','$aadhar_id')";
            $data = mysqli_query($conn,$query);
            if($data){
                // echo "Data Inserted into Database";
                $_SESSION['registrationsuccess']= "registration successful";
                header("location:loginmain.php");
            }
            else{
                $_SESSION['refailed']= "registration failed";
                header("location:studentregister.php");

            }

        }
        else{
            $_SESSION['refailed']= "registration failed";
            header("location:studentregister.php");
        }
    }}}


?>
    
</body>
</html>

