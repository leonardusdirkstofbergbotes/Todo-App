<?php 
    session_start();
    $id = $_GET['id'];/* it must get a id from the link that the user click */
    require "../db/dbconnect.php";


    $alter_note = "UPDATE users SET verified = 1 WHERE id = \"$id\"";
    $conn->query($alter_note);
    header("Location: ../login.php");
?>