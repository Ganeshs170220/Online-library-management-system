<?php
session_start();
unset($_SESSION['studentid']);
header('location:loginmain.php');


?>