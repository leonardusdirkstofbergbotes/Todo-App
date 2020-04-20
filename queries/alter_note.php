<?php
    session_start();
    $userID = $_SESSION['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $color = $_POST['color'];
    $old_note = $_GET['oldnote'];

    echo $userID." ".$title." ".$description." ".$date." ".$old_note;

    require "../db/dbconnect.php";


    $alter_note = "UPDATE notes SET title = \"$title\", description = \"$description\", dueDate = \"$date\", color = \"$color\" WHERE user = \"$userID\" AND title = \"$old_note\"";
    $conn->query($alter_note);
    header("Location: ../todo.php");
?>
