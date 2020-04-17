<?php 
    if (isset($_SESSION)) {
        session_destroy();  
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


    <form method="post" class="wrapper" id="signup_form" action="queries/check_user.php">
    <img src="img/signup_banner.jpg">
        <h1> Log in </h1>
        
        <div class="input">  
            <label for='user_email'>Email adress </label>
            <input type="email" class="input" name="user_email" placeholder="example@gmail.com" required>
        </div>
        <div class="input">
            <label for='user_password1'>Password </label>
            <input type="password" class="input" name="user_password1" placeholder="Must have at least 6 characters" minlength="6" maxlength="30" id="p1" required>
        </div>
        <div id="buttonwrap">
            <div class="sign"><button id="btn" type="submit" class="loginbut">Login</button></div>
            <div class="login"><a href="signup.php"><button type="button" class="registerbut">Register</button></a></div>
        </div>
        
    </form>
    
    <script>
        $(function() {                       
  $("#btn").click(function() {
    $("input").addClass("check");
  });
   });
        </script>
</body>
</html>