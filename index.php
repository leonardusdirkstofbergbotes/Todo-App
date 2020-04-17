<?php 
session_start();
    if (isset($_SESSION['id'])) {
        header("Location: todo.php");
    } else {
        header("Location: login.php");
    }
?>