<?php
session_start();
if(!isset($_SESSION['user-data']))
header("Location: http://localhost:8080/task1/index.php");

?>
<?php
$errmsg = '';
if(isset($_GET['email'])){
  $err = $_GET['email'];
    if($err == 'empty'){
      $errmsg = "<script>alert('you must enter your email')</script>";
    }
    if($err == 'fail'){
      $errmsg = "<script>alert('that email is already in database')</script>";
    }
}if(isset($_GET['add'])){
  $msg = $_GET['add'];
  if($msg = 'add'){
    $errmsg = "<script>alert('You\'ve adde user successfully')</script>";
  }
}


?>

<!DOCTYPE html>
<html>
    <head>
    <title>Admin <?php echo $_SESSION['user-data']['fname'];?></title>
    <link rel="stylesheet" href="css/dashAdmin.css">
    <link rel="stylesheet" href="css/adminReg.css">
    </head>
<body>
    
<div class="sidenav">
  <a href="tbl.php">Users</a>
  <a href="dashAdmin.php">Create <small>user</small></a>
  <a href="php/logout.php">Log out</a>
</div>

<div class="main">
  <h1>Hello Admin <?php echo $_SESSION['user-data']['fname'];?></h1>
<?php echo $errmsg; ?>
    <form action="php/adminAdd.php" method="POST">
        <input type="text" name="name" id="name" placeholder="enetr name..">
        <input type="text" name="surname" id="surname" placeholder="enter surname..">
        <input type="email" name="mail" id="mail" placeholder="enetr email..">
        <input type="number" name="phone" id="phone" placeholder="enetr phone number..">
        <input type="password" name="pass" id="pass" placeholder="enter password...">
        <input type="password" name="passConf" id="passConf" placeholder="please confirm password..">
        <input type="text" name="usertype" id="usertype" placeholder="enetr usertype (user/admin)">
        <input type="submit" class="xSub" name="submit" value="Add user">
    </form>
  
  </div>

</body>
</html>