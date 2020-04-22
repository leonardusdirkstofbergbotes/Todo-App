<?php
    require "../db/dbconnect.php";
    $noteid = $_POST['noteID'];
    $delete_note = "DELETE FROM notes WHERE noteID = \"$noteid\"";
    $conn->query($delete_note);
?>