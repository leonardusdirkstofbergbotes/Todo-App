<?php 
    session_start();
    $id = $_GET['id'];/* it must get a id from the link that the user click */
    require "../database/dbconnect.php";


    $alter_note = "UPDATE users SET verified = 1 WHERE id = \"$id\"";
    $conn->query($alter_note);
    header("Location: ../login.php"); /* Now the user can sign in and has access to the todo page */
?>