<?php
$name = $_POST['user_name'];
$surname = $_POST['last_name']; 
$pass = $_POST['user_password1'];
$email = $_POST['user_email'];
$target_dir = "../user_uploads/";
foreach ($_FILES as $file){
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    $file_name = $file["name"];
}
global $file_name;

require "../db/dbconnect.php";

$check = "SELECT * FROM users WHERE users.email = \"$email\"";
$result = $conn->query($check);

if ($result->num_rows > 0) { /* User alreayd exists - goes to LOGIN page */
    header("Location: ../login.php? exist= yes");
} else { /* User gets created */
    $create = "INSERT INTO users (name, surname, password, email, pic)
                VALUES (\"$name\", \"$surname\", \"$pass\", \"$email\", \"$file_name\");";
    $conn->query($create);  
    $result = $conn->query($check);
        $record = $result->fetch_assoc(); 
        session_start();
        $_SESSION['id'] = $record['id'];
        $_SESSION['name'] = $record['name'];
        $_SESSION['surname'] = $record['surname'];
        $_SESSION['email'] = $record['email'];
        header("Location: ../email_handler.php"); /* <--- This page will send an email to the user to verify his account */
}
?>