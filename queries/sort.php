<?php
        session_start();
        $id = $_SESSION['id'];
        $pull = "SELECT * FROM notes WHERE notes.user = $id ORDER BY title ASC";
?>
