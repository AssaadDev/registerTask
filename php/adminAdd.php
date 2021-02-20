<?php 

    include_once "connect.php";
    
    $name = $_POST['name'];
    $sur = $_POST['surname'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $passTest = $_POST['passConf'];
    $userType = $_POST['usertype'];
    
    $sqlCheck = "SELECT email FROM truck WHERE email = '$mail';";
    
    $res = mysqli_query($con,$sqlCheck);
    $test = mysqli_num_rows($res);

   if(empty($mail)){
    header("Location: http://localhost:8080/task1/dashAdmin.php?email=empty");
    die();
   }     
    if($test){
        header("Location: http://localhost:8080/task1/dashAdmin.php?email=fail");
        die();
    }else{
        $sql = "INSERT INTO truck(fname,surname,email,phone,pass,userType)VALUES('$name','$sur','$mail','$phone','$pass','$userType');";
        mysqli_query($con,$sql);
        header("Location: http://localhost:8080/task1/dashAdmin.php?add=passed");
    }

    ?>