<?php
include("connect.php");
$id=$_GET['id'];
$sql4 = "UPDATE `bookapply` SET status = 'no' where id = '$id'";
$run4 = mysqli_query($conn,$sql4);
header('Location:admin-bookrequests.php');
?>