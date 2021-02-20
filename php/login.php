<?php 
session_start();
include_once "connect.php";

$email = $_POST['email'];
$pass = $_POST['pass'];


if(empty($email)||empty($pass)){
    header("Location: http://localhost:8080/task1/index.php?data=empty");
    exit();
}


$sqlTest = "SELECT * FROM truck WHERE  email = '$email' AND pass = '$pass';";

$result = mysqli_query($con,$sqlTest);

$test = mysqli_num_rows($result);
$userData = mysqli_fetch_assoc($result);
$_SESSION['user-data']=$userData;
if($test>0){
    
    if($_SESSION['user-data']['userType'] == 'admin'){
        header("Location: http://localhost:8080/task1/dashAdmin.php");
    }else{
        header("Location: http://localhost:8080/task1/dashUser.php");
    }
}else{
    header("Location: http://localhost:8080/task1/index.php?data=wrong");
    session_destroy();
    exit();
}



?>