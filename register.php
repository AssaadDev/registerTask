<?php
$error = '';
if(isset($_GET['data'])){
    $checkdata = $_GET['data'];
    if($checkdata == 'empty'){
        $error = "<p style='color:red;'>All fields are required!</p>";
    }
    if($checkdata == 'wrong'){
        $error = "<p style='color:red;'>Your password does not match!</p>";
    }
    if($checkdata == 'email'){
        $error = "<p style='color:red;'>Your email already exist!</p>";
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/styleReg.css">
    <title>My db project</title>
</head>
<body>
    <div class="tire">
        <h1>Here you can register!</h1>
        <form action="php/regi.php" method="POST">

            <input type="text" name="name" id="name" placeholder="enetr your name..">
            <input type="text" name="surname" id="surname" placeholder="enter your surname..">
            <input type="email" name="mail" id="mail" placeholder="enetr your email..">
            <input type="number" name="phone" id="phone" placeholder="enetr your phone number..">
            <input type="password" name="pass" id="pass" placeholder="enter your password...">
            <input type="password" name="passConf" id="passConf" placeholder="please confirn your password.."><span><?php echo $error; ?></span>
            <input type="submit" class="xSub" name="submit" value="Register">
        </form>
    </div>
</body>
</html>

