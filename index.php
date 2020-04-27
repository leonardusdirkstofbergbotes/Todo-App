<?php 
session_start();
    if (isset($_SESSION['id'])) { /* if the users session still exists in the browser memory */
        header("Location: todo.php");
    } else {
        header("Location: login.php");
    }
?>