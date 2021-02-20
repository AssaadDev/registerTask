<?php
    session_start();

    header("Location: http://localhost:8080/task1/index.php");
    session_destroy();
?>