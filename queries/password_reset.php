<?php 
    $email = $_GET['email'];
    $pass = $_POST['pass1'];

    require "../db/dbconnect.php";
    $alter_pass = "UPDATE users SET password = \"$pass\" WHERE email = \"$email\"";
    $conn->query($alter_pass);
    header("Location: ../login.php");
?>