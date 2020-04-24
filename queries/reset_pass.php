<?php 
    $res_email = $_POST['reset_email'];
    
    require "../db/dbconnect.php";
    $check = "SELECT * FROM users WHERE users.email = \"$res_email\"";
    $exist = $conn->query($check);

if ($exist->num_rows > 0) { /* User exists */ 
    header("Location: reset_email.php? email=$res_email");
} else { /* User doesn't exist */ 
    header("Location: ../reset_password.php? notexists=yes");
}
?>