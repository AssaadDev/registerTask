<?php
session_start();

if(!isset($_SESSION['user-data'])){
  header("Location: http://localhost:8080/task1/index.php");
}



if(isset($_GET['pw'])){
  $msg = $_GET['pw'];
  if($msg == 'error'){
    echo "<script>alert('Your old password is not correct!')</script>";
  }
  if($msg == 'newerror'){
    echo "<script>alert('Your new password does not match password confirm!')</script>";
  }
  if($msg == 'field'){
    echo "<script>alert('Your have to fill all password fields to change password!')</script>";
  }
  if($msg == 'sub'){
    echo "<script>alert('Your cannot submit empty form!')</script>";
  }
}


?>


<!DOCTYPE html>
<html>
    <head>
    <title>User <?php echo $_SESSION['user-data']['fname'] ?></title>
    <link rel="stylesheet" href="css/dashAdmin.css">
    <link rel="stylesheet" href="css/userDash.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    </head>
<body>
    
<div class="sidenav">
  <a href="php/logout.php">Log out</a>
  <div class="posLight">
    <div class="light" id="lamp"></div>
    <button id="btn" class="x" value="0">Driving</button>
  </div>
</div>

<script>
jQuery(document).ready(function(){
  $('#btn').click(function() {
    var stat = $('#btn').val();
    $.post(status.php, {status: stat}, function(){
      if(stat == 0){
        $('#btn').val(1);
        $('#lamp').css({"background-color":"rgb(6, 167, 0)",
        "box-shadow" : "0px 0px 10px 5px rgb(32, 161, 32)"});
          $('#st').html("Status: Driving");
      }else{
        $('#btn').val(0);
        $('#lamp').css({"background-color":"rgb(167, 0, 0)",
        "box-shadow" : "0px 0px 10px 5px rgb(238, 100, 100)"});
        $('#st').html("Status: Pause");
      }
        
    })
  });
});


</script>

<div class="main">
  <h1>Hello <?php echo $_SESSION['user-data']['fname'] ?></h1>

  <div class="content">
      <div class="info">
          <h2>Working licence</h2>
          <div class="persInfo">
            <p>Name: <?php echo $_SESSION['user-data']['fname'] ?></p>
            <p>Surname: <?php echo $_SESSION['user-data']['surname'] ?></p>
            <p>Email: <?php echo $_SESSION['user-data']['email'] ?></p>
            <p>Phone: <?php echo $_SESSION['user-data']['phone'] ?></p>
            <p id="st">Status: <?php if($_SESSION['user-data']['status']== 0){
        echo "Pause";
      }if($_SESSION['user-data']['status']!= 0){
        echo "Driving";
      }?></p>
          </div>
      </div>
      <div class="edit">
      <h2>Edit personal info</h2>
      <form action="php/updateDB.php" method="POST">
      <div class="editPers">
      name: <input type="text" name="fname">
      surname: <input type="text" name="surname">
      phone: <input type="text" name="phone" class="spc">
      old password: <input type="password" name="oldpw">
      new password: <input type="password" name="newpw">
      confirm new password: <input type="password" name="newpwconf">

        <input type="submit" class="sub" name="sub" id="sub" value="submit">
      </div>
      </form>
    </div>
  </div>
</div>
    
  
  </div>

</body>
</html>