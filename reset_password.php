<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


    <form method="post" class="wrapper" id="signup_form" action="queries/reset_pass.php">
    <img src="img/reset.jpg">
        <h1> Reset your password </h1>
        
        <div class="input">  
            <label for='user_email'>Enter the email adress associated with your account </label>
            <input type="email" class="input" name="reset_email" placeholder="example@gmail.com" required>
        </div>
        <div id="buttonwrap">
            <div class="sign"><button id="btn" type="submit" class="resetbut">Request Reset</button></div>
            <div class="login"><a href="login.php"><button type="button" class="registerbut">Cancel</button></a></div>
        </div>
    </form>
</body>
</html>