<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password?</title>
    <link rel="icon" type="image/gif/png" href="icons/favicon.png" alt="Todo APP">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
/* These are sweetalerts that will popup based on a condition to notify the user of what happened in the backend */
if (isset($_GET['notexists'])) {
    echo '<script type="text/javascript">
        $(document).ready(function(){
            swal({
                position: "top-end",
                type: "info",
                icon: "error",
                title: "This user doesnt exist",
                text: "try entering your exact email adress",
                button: true,
                timer: 2500
            })
        });
    </script> '; 
} else if (isset($_GET['request'])) {
    echo '<script type="text/javascript">
        $(document).ready(function(){
            swal({
                position: "top-end",
                type: "info",
                icon: "success",
                title: "Reset email has been sent",
                text: "please check your email",
                button: true,
                timer: 2500
            })
        });
    </script> '; 
} /* sweetalerts END */
?>

    <form method="post" class="wrapper" id="signup_form" action="queries/reset_pass.php">
    <img src="img/reset.jpg" alt="Would you like to reset your password?">
        <h1>Reset your password</h1>
        <div class="input">  
            <label for='reset_email'>Enter the email adress associated with your account </label>
            <input type="email" class="input" name="reset_email"title="Enter the email adress that you registered with"
             placeholder="example@gmail.com" required>
        </div>
        <div id="buttonwrap">
            <div class="sign"><button id="btn" type="submit" class="resetbut">Request Reset</button></div>
            <div class="login"><a href="login.php"><button type="button" class="registerbut">Cancel</button></a></div>
        </div>
    </form>
    
</body>
</html>