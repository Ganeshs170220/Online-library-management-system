<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "olms";
$conn = mysqli_connect($server,$username,$password,$dbname);
session_start();
if(isset($_POST['submit'])){
    $studentid = $_POST["studentid"];
    $studentname = $_POST["studentname"];
    $aadharid = $_POST["aadharid"];
    $_SESSION['aadharid']=$_POST["aadharid"];
    $studentphno = $_POST["studentphno"];
    $selectthebook = $_POST["selectthebook"]; 
    
    if($studentid=="" && $studentname=="" && $aadharid="" && $studentphno = "" && $selectthebook = "")
    {
        $_SESSION['error']="fill all fields";
        header("location:apply.php");
       
    }   
    else if ((isset($_POST['studentid']) && !empty(($_POST['studentid']))) && (isset($_POST['studentname']) && !empty(($_POST['studentname'])))&& (isset($_POST['aadharid']) && !empty(($_POST['aadharid']))) && (isset($_POST['studentphno']) && !empty(($_POST['studentphno']))) && (isset($_POST['selectthebook']) && !empty(($_POST['selectthebook']))))
    {
        // echo "success";
        $aadharid = $_POST["aadharid"];
        $studentid = $_POST["studentid"];
        $sql = "SELECT * FROM profiledata WHERE aadharid='$aadharid' AND studentid='$studentid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            echo "success";
            $row = mysqli_fetch_assoc($result);
            echo "success";
            if($row['aadharid'] === $aadharid && $row['studentid'] === $studentid && $row['studentname'] === $studentname && $row['studentphno'] === $studentphno)
                {
                    // $_SESSION['uniqueid']=$row['id'];
                    // echo "success";
                    $_SESSION['studentid']=$row['studentid'];
                    $_SESSION['studentname']=$row['studentname'];
                    $_SESSION['aadharid']=$row['aadharid'];
                    $_SESSION['studentphno']=$row['studentphno'];
                    $studentid = $_POST["studentid"];
                    $studentname = $_POST["studentname"];
                    $aadharid = $_POST["aadharid"];
                    $studentphno = $_POST["studentphno"];
                    $selectthebook = $_POST["selectthebook"]; 

        
        $sql = "INSERT INTO bookapply (`studentid`,`studentname`,`aadharid`,`studentphno`,`selectthebook`) values ('$studentid','$studentname','$aadharid','$studentphno','$selectthebook')";
        $run = mysqli_query($conn,$sql);
        if($run){
            // header("Location: user.html");
            $_SESSION['status']="book request submitted,kindly check your status";
            $_SESSION['studentid']=$row['studentid'];
            $_SESSION['selectthebook'] = $row['selectthebook'];
            header("location:apply.php");
        // echo "<script>alert('book request successfull')</scrip>";

        // echo "<script>alert('book applied succesfully')</script>";
    }
    else{
        $_SESSION['bookdataerror']='dataerror';
        header("location:apply.php");
        // echo "<script>alert('error in data')</script>";
    }
}}}
else{
    $_SESSION['error']='dataerror';
    header("location:apply.php");
    echo "<script>alert('not')</script>";
}}
else{
   $_SESSION['dataerror']='error';
        header("location:apply.php");
        echo "<script>alert('not')</script>";
}
?>

