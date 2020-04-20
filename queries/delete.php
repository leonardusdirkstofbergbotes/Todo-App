<?php
    include "../db/dbconnect.php";
    print_r($_POST);
    $title = $_POST['title'];
    $delete_note = "DELETE FROM notes WHERE title = \"$title\"";
    $conn->query($delete_note);
    header("Location: ../todo.php"); 

?>