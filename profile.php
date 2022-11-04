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
if(isset($_POST["submit"])){
    $studentid = $_POST["studentid"];
    $aadharid = $_POST["aadharid"];
    $studentname = $_POST["studentname"];
    $studentphno = $_POST["studentphno"];   
    $year = $_POST["year"];
    $gender = $_POST["gender"];
    $branch = $_POST["branch"];
$sql = "INSERT INTO `profiledata` (`studentid`,`aadharid`,`studentname`,`studentphno`,`year`,`gender`,`branch`) values ('$studentid','$aadharid','$studentname','$studentphno','$year','$gender','$branch')";
$run = mysqli_query($conn,$sql);
    if($run){
        header("Location: user.html");
        echo "form submission successful";
    }
    else{
        echo "form submission failed";
    }
}
else{
    echo "connecion failed";
}
?>

