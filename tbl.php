<?php
session_start();
if(!isset($_SESSION['user-data']))
header("Location: http://localhost:8080/task1/index.php");


if(isset($_GET['suc'])){
    $msg = $_GET['suc'];
    if($msg=="yes"){
        echo "<script>alert('User is removed!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Admin <?php echo $_SESSION['user-data']['fname'];?></title>
    <link rel="stylesheet" href="css/dashAdmin.css">
    <link rel="stylesheet" href="css/tblcss.css">
    </head>
<body>
    
<div class="sidenav">
  <a href="tbl.php">Users</a>
  <a href="dashAdmin.php">Create <small>user</small></a>
  <a href="php/logout.php">Log out</a>
</div>

<div class="main">
  <h1> Table of all emplyes </h1>
  <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Status</th>
  </tr>
  <tr></tr>
    <?php 
    include_once "php/connect.php";

    $qvr = "SELECT * FROM Truck";
    $qvr_run = mysqli_query($con, $qvr);

    if($qvr_run){
      foreach($qvr_run as $row){
        ?>
        <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['fname']; ?></td>
      <td><?php echo $row['surname']; ?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php if($row['status']== 0){
        echo "Pause";
      }if($row['status']!= 0){
        echo "Driving";
      }?></td>
      <td class="x"><a class="btn" href="php/dlt.php?delete=<?php echo $row['id']?>"><?php echo 'Remove';?></a></td>
      </tr>
      <?php
      }
    }else{
      echo "No data!";
    }
    
    ?>
</table>


</div>


</body>
</html>