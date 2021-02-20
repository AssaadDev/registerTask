<?php 

    include_once "connect.php";
    
    $name = $_POST['name'];
    $sur = $_POST['surname'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $passTest = $_POST['passConf'];
    $userType = "user";
    
    $sqlCheck = "SELECT email FROM truck WHERE email = '$mail';";
    $result = mysqli_query($con,$sqlCheck);
    $test = mysqli_num_rows($result);
    if($test){
        header("Location: http://localhost:8080/task1/register.php?data=email");
        die();
    }

    if(empty($name) || empty($sur) || empty($mail) || empty($phone) || empty($pass) || empty($passTest)){
        header("Location: http://localhost:8080/task1/register.php?data=empty");
        die();
    }
    else if($pass != $passTest){
        header("Location: http://localhost:8080/task1/register.php?data=wrong");
        die();
    }else{
        $sql = "INSERT INTO truck(fname,surname,email,phone,pass,userType)VALUES('$name','$sur','$mail','$phone','$pass','$userType');";
        mysqli_query($con,$sql);    
        header("Location: http://localhost:8080/task1/index.php");

        }

    

?>