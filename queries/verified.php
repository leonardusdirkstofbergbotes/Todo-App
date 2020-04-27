<?php 
    $id = $_GET['id'];
    
    require "../db/dbconnect.php";

    $alter_note = "UPDATE users SET verified = 1 WHERE id = \"$id\"";
    $conn->query($alter_note);
    header("Location: ../login.php");
?>