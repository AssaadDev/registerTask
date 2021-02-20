<?php
$erMsg = '';
if(isset($_GET['data'])){
    $errData = $_GET['data'];

    if($errData == 'empty'){
        $erMsg = "you must fill all fileds!";
    }else if($errData == 'wrong'){
        $erMsg = "ops you are not one of us";
    }
}
if(isset($_GET['succ'])){
    $sucmsg = $_GET['succ'];
    if($sucmsg == 'yes'){
        echo '<script>alert("You updated your profile successfully, please log in with your new info. ")</script>';
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Truck mania</title>
    <link rel="stylesheet" href="css/indexStyle.css">
</head>

<body>
    <span style="font-size: 40px;color:red;font-weight: bolder;"><?php echo $erMsg ?></span>
    <h1>Truck mania</h1>
    <form action="php/login.php" method="POST">
        <div class="div1">
            <input type="email" name="email" placeholder="Enter your eMail..">
            <input type="password" name="pass" placeholder="Enter your password..">
        </div>
        <div class="div2">
            <input type="submit" name="sub" value="Log in">
            <a href="register.php">Register</a>
        </div>
    </form>

</body>

</html>