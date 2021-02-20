<?php

include_once "connect.php";

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM Truck WHERE ID = $id");
}

header("Location: http://localhost:8080/task1/tbl.php?suc=yes");
?>