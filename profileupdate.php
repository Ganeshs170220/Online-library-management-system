<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "olms";
$conn = mysqli_connect($server,$username,$password,$dbname);
session_start();
if(isset($_POST["submit"])){
    $studentid = $_POST["studentid"];
    $studentname = $_POST["studentname"];
    $studentphno = $_POST["studentphno"];   
    $year = $_POST["year"];
    $gender = $_POST["gender"];
    $branch = $_POST["branch"];
    $aadharid = $_POST["aadharid"];
    $sql2 = "SELECT * FROM profiledata WHERE aadharid='" . $_POST["aadharid"] . "'";
    $result2 = mysqli_query($conn, $sql2);
    echo "submit";
    if (mysqli_num_rows($result2) === 1) {
    $sql = "UPDATE `profiledata` SET studentid='$_POST[studentid]',studentname='$_POST[studentname]',studentphno='$_POST[studentphno]',year='$_POST[year]',gender='$_POST[gender]',branch='$_POST[branch]' Where studentid='$_POST[studentid]'";
    $run4 = mysqli_query($conn,$sql);
    //    echo "updated";
    $_SESSION['year']=$year;
    $_SESSION['gender']=$gender;
    $_SESSION['branch']=$branch;
}
    else{
        $sql4 =" INSERT INTO `profiledata`(`studentid`, `aadharid`, `studentname`, `studentphno`, `year`, `gender`, `branch`) VALUES ('$studentid','$aadharid','$studentname','$studentphno','$year','$gender','$branch')";
        $run4 = mysqli_query($conn,$sql4);
        $_SESSION['year']=$year;
        $_SESSION['gender']=$gender;
        $_SESSION['branch']=$branch;
        $_SESSION['studentid']=$studentid;
        $_SESSION['aadharid']=$aadharid;
        $_SESSION['studentphno']=$studentphno;
        $_SESSION['studentname']=$studentname;
    }
}
    if($run4){
        $_SESSION['profileupdate']='updated';
        header("location:profilemain.php");
        // header("Location: user.html");
        // echo '<script>alert("form updated successfully");</script>';
    }
    else{
        echo "form submission failed";
    }
?>