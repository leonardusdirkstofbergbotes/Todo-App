<?php 
    session_start();
    $userID = $_SESSION['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $color = $_POST['color'];


    require "../db/dbconnect.php";


    $create_note = "INSERT INTO notes (user, title, description, dueDate, color) 
                    VALUES (\"$userID\", \"$title\", \"$description\", \"$date\", \"$color\");";
    $conn->query($create_note);
    header("Location: ../todo.php");
?>