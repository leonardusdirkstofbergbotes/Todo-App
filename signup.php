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


    <form method="post" class="wrapper" id="signup_form" enctype="multipart/form-data">  
    <img class="sign" src="img/banner.jpg">

        <h1> Sign up </h1>
        <div class="input">
        <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="input"> 
            <label for='user_name'>First name </label>
            <input type="text" class="input" maxlength="30" minlength="3" name="user_name" placeholder="example Joe" required>
        </div>
        <div class="input"> 
            <label for='last_name'>Last name </label>
            <input type="text" class="input" maxlength="30" minlength="3" name="last_name" placeholder="example Smith" required>
        </div>
        <div class="input">  
            <label for='user_email'>Email adress </label>
            <input type="email" class="input" name="user_email" placeholder="example@gmail.com" required>
        </div>
        <div class="input">
            <label for='user_password1'>Password </label>
            <input type="password" class="input" name="user_password1" placeholder="Must have at least 6 characters" minlength="6" maxlength="30" id="p1" required>
        </div>
        <div class="input">
            <label for='user_password2'>Confirm password </label>
            <input type="password" class="input" name="user_password2" placeholder="Must match your first password" minlength="6" maxlength="30" id="p2" required>
        </div>
        <div id="buttonwrap">
            <div class="sign"><button id="btn" type="submit" onclick="validate()" class="loginbut">Signup</button></div>
            <div class="login"><a href="login.php"><button type="button" class="registerbut">Login</button></a></div>
        </div>
        
    </form>
    

    
    <script>
        $(function() {                       
  $("#btn").click(function() {
    $("input").addClass("check");
  });
   });

    function validate() {
        
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