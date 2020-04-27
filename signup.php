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
    <title>To do register</title>
    <link rel="icon" type="image/gif/png" href="icons/favicon.png" alt="Todo APP">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


    <form method="post" class="wrapper" id="signup_form" enctype="multipart/form-data">  
    <img class="sign" src="img/banner.jpg" alt="Register to use the Todo APP">

        <h1> Sign up </h1>
        <div class="input">
        <label for="fileToUpload">Profile pic </label>
        <input type="file" name="fileToUpload" id="fileToUpload" title="pick a profile picture from your computer">
        </div>
        <div class="input"> 
            <label for='user_name'>First name </label>
            <input type="text" class="input" maxlength="255" minlength="3" name="user_name" placeholder="example Joe" title="" required>
        </div>
        <div class="input"> 
            <label for='last_name'>Last name </label>
            <input type="text" class="input" maxlength="128" minlength="3" name="last_name" placeholder="example Smith" title="" required>
        </div>
        <div class="input">  
            <label for='user_email'>Email adress </label>
            <input type="email" class="input" name="user_email" maxlength="128" placeholder="example@gmail.com" title="" required>
        </div>
        <div class="input">
            <label for='user_password1'>Password </label>
            <input type="password" class="input" name="user_password1" placeholder="Must have at least 6 characters" 
                minlength="6" maxlength="50" id="p1" title="must be atleast 6 charactes long, max(50)" required>
        </div>
        <div class="input">
            <label for='user_password2' title="this MUST be the same as the above password">Confirm password </label>
            <input type="password" class="input" name="user_password2" placeholder="Must match your first password" 
                minlength="6" maxlength="50" id="p2" title="" required>
        </div>
        <div id="buttonwrap">
            <div class="sign"><button id="btn" type="submit" onclick="validate()" class="loginbut">Signup</button></div>
            <div class="login"><a href="login.php"><button type="button" class="registerbut">Login</button></a></div>
        </div>
        
    </form>
    

    
    <script>
        $(function() {                       
  $("#btn").click(function() {  /* if you click on the signup button it will add this validation alerts */
    $("input").addClass("check");
  });
   });

    function validate() { /* check if your password and confirm password matches */
        
    $("input").addClass("check");

        var p1 = document.getElementById("p1").value;
        var p2 = document.getElementById("p2").value;
        if (p1 == p2) { 
            document.getElementById("signup_form").action = "./queries/create_user.php";
        } else {
            swal("Password doesnt match!", "Try re-entering your password", "warning");
            event.preventDefault(); 
        }
        
    }
        </script>
</body>
</html>