<?php
    $email = $_POST['user_email'];
    $pass = $_POST['user_password1'];

    require "../db/dbconnect.php";
    $check = "SELECT * FROM users WHERE users.email = \"$email\"";
    $verified = "SELECT * FROM users WHERE users.email = \"$email\" AND users.verified = 1";
    $doublecheck = "SELECT * FROM users WHERE users.email = \"$email\" AND users.password = \"$pass\"";
    
    $exist = $conn->query($check);

    if ($exist->num_rows > 0) { /* User exists */
        $veri = $conn->query($verified);
        if ($veri->num_rows > 0) { /* User is verified */
            $pass = $conn->query($doublecheck);
            if ($pass->num_rows > 0) { /* Everything is correct */
                $record = $pass->fetch_assoc();
                session_id('signed');
                session_start();
                $_SESSION['pic'] = $record['pic'];
                $_SESSION['name'] = $record['name'];
                $_SESSION['surname'] = $record['surname'];
                $_SESSION['id'] = $record['id'];
                header("Location: ../index.php");
            } else if ($pass->num_rows == 0) { /* Password is incorrect */
                header("Location: ../login.php? pass= wrong");
            }
        } else if ($veri->num_rows == 0) { /* User is not verified */
            header("Location: ../login.php? verified= no");
        }
    } else if ($exist->num_rows == 0) { /* User doesn't exist */
        header("Location: ../login.php? notexist= no");
    }
?>