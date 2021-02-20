<?php
include_once "connect.php";
session_start();

$name = $_POST['fname'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$oldpw = $_POST['oldpw'];
$newpw = $_POST['newpw'];
$newpwconf = $_POST['newpwconf'];

$ID = $_SESSION['user-data']['id'];
$pw = $_SESSION['user-data']['pass'];

if(isset($_POST['sub'])){
    if(empty($name) && empty($surname) && empty($phone) && empty($oldpw) && empty($newpw) && empty($newpwconf)){
        header("Location: http://localhost:8080/task1/dashUser.php?pw=sub");
        die();
    }
if(!empty($name)){
    $sql = "UPDATE truck SET fname = '$name' WHERE id = '$ID';";
    mysqli_query($con,$sql);
}
if(!empty($surname)){
    $sql = "UPDATE truck SET surname = '$surname' WHERE id = '$ID';";
    mysqli_query($con,$sql);
}
if(!empty($phone)){
    $sql = "UPDATE truck SET phone = '$phone' WHERE id = '$ID';";
    mysqli_query($con,$sql);
}

if(!empty($oldpw) && !empty($newpw) && !empty($newpwconf)){

if($oldpw!=$pw){
    header("Location: http://localhost:8080/task1/dashUser.php?pw=error");
    die();
}else if($newpw!=$newpwconf){
    header("Location: http://localhost:8080/task1/dashUser.php?pw=newerror");
    die();
}else{
    $sql = "UPDATE truck SET pass = '$newpw' WHERE id = '$ID';";
    mysqli_query($con,$sql);
}
}else if((empty($oldpw) && empty($newpw) && !empty($newpwconf))||(empty($oldpw) && !empty($newpw) && empty($newpwconf))||(!empty($oldpw) && empty($newpw) && empty($newpwconf)) || (empty($oldpw) && !empty($newpw) && !empty($newpwconf))||(!empty($oldpw) && empty($newpw) && !empty($newpwconf))||(!empty($oldpw) && !empty($newpw) && empty($newpwconf))){
    header("Location: http://localhost:8080/task1/dashUser.php?pw=field");
    die();
}

header("Location: http://localhost:8080/task1/index.php?succ=yes");
}

?>