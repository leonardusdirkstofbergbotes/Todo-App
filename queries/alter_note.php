<?php
    $noteID = $_POST['noteID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $color = $_POST['color'];
    require "../db/dbconnect.php";
    $alter_note = "UPDATE notes SET title = \"$title\", description = \"$description\", dueDate = \"$date\", color = \"$color\" WHERE noteID = $noteID";
    $conn->query($alter_note);
?>
