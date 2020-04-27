<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="icon" type="image/gif/png" href="icons/favicon.png" alt="Todo APP">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <form method="post" class="wrapper" id="reset_form">
    <img src="img/reset.jpg">
        <h1> Reset your password </h1>
        <div class="input">  
            <label for='password1'>Enter your new password</label>
            <input type="password" class="input" name="pass1" id="p1" required>
            <label for='password2'>Confirm new password </label>
            <input type="password" class="input" name="pass2" id="p2" required>
        </div>
        <div id="buttonwrap">
            <div class="sign"><button id="btn" type="submit" class="resetbut" onclick="validate()">Reset password</button></div>
        </div>
    </form>

<script>
    function validate() { /* check if your new password and confirm password matches */
        $("input").addClass("check"); /* adds validation alert once you click on the Reset password button */ 
        var p1 = document.getElementById("p1").value;
        var p2 = document.getElementById("p2").value;
        if (p1 == p2) { 
            document.getElementById("reset_form").action = "./queries/password_reset.php? email=<?php echo $_GET['email']; ?>";
        } else if (p1 != p2) { 
            console.log('not a match');
            swal("Password doesnt match!", "Try re-entering your password", "warning");
            event.preventDefault(); /* prevents the form from reseting */ 
        }
    }
</script>

</body>
</html>