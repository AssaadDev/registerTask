<?php
session_start();
include_once "php/connect.php";


if(isset($_POST['status'])){
    $val = $_POST['status'];
    $ide = $_SESSION['user-data']['id'];


$sql = "UPDATE Truck SET status = '$val' WHERE id = '$ide';";

mysqli_query($con,$sql);

}



?>