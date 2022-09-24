<?php
session_start();
?>

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
if($conn){
    echo "connection successful";
}
else {
    echo "connection failed";
}
if(isset($_POST['submit'])){
    $name = $_POST["username"];
    $user_password = $_POST["password"];
    $aadhar_id = $_POST["aadhar_id"];    
$sql = "INSERT INTO logindetails (`username`,`password`,`aadhar_id`) values ('$name','$user_password','$aadhar_id')";
$run = mysqli_query($conn,$sql);
    if($run){
        $_SESSION['registersuccess']='success';
        header("Location: loginmain.php");
        // echo "form submission successful";
    }
    else{
        $_SESSION['registerfailed']='failed';
        header("Location: studentregister.php");
        // echo "form submission failed";
    }

    $_SESSION['registersuccess']='success';
    header("Location: loginmain.php");
}
else{
    $_SESSION['registerfailed']='failed';
        header("Location: studentregister.php");
}
?>
    
</body>
</html>
