<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "olms";
$conn = mysqli_connect($server,$username,$password,$dbname);
session_start();
if(isset($_POST['submit'])){
    $books = $_POST["books"];
    if($books == "")
    {
        $_SESSION['error']="fill the field";
        header("location:booksentermain.php");
    }   
    else if ((isset($_POST['books']) && !empty(($_POST['books']))))
    {
        $books = $_POST["books"];
        $sql = "INSERT INTO books (`books`) values ('$books')";
        $run = mysqli_query($conn,$sql);
        if($run){
            // header("Location: user.html");
            $_SESSION['bookstatus']="data submitted successfully";
            // $_SESSION['studentid']=$row['studentid'];
            header("location:booksentermain.php");
        // echo "<script>alert('book request successfull')</scrip>";

        // echo "<script>alert('book applied succesfully')</script>";
    }
    }
    else{
        $_SESSION['bookdataerror']='dataerror';
        header("location:booksentermain.php");
        // echo "<script>alert('error in data')</script>";
    }
}
    else{
        $_SESSION['bookdataerror']='dataerror';
        header("location:booksentermain.php");
        // echo "<script>alert('error in data')</script>";
    }


?>

