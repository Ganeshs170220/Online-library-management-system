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
        if (mysqli_num_rows($result2) === 1) {
            $row2 = mysqli_fetch_assoc($result2);
            if($row2['aadharid'] === $aadharid)
                {
                    // $_SESSION['aadhar_id'] = $row2['aadhar_id'];

    $sql = "UPDATE `profiledata` SET studentid='$_POST[studentid]',studentname='$_POST[studentname]',studentphno='$_POST[studentphno]',year='$_POST[year]',gender='$_POST[gender]',branch='$_POST[branch]' Where studentid='$_POST[studentid]'";
    $run = mysqli_query($conn,$sql);
    $year = $_SESSION['year'];
    }
    else{
        echo "<script>alert('invalid details');</script>";
    }
    if($run){
        $_SESSION['profileupdate']='updated';
        header("location:profilemain.php");
        // header("Location: user.html");
        // echo '<script>alert("form updated successfully");</script>';
    }
    else{
        echo "form submission failed";
    }
}}
else{
    echo "connecion failed";
}
?>

