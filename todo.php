<?php 
  session_start();
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $surname= $_SESSION['surname'];
  $pic = $_SESSION['pic'];
  $email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="css/styles.css">
  <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>

</head>
<body>
  <div class="navbar">
      <p id="drop"><img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>" id="userpic"></p>
        <div class="dropdown" id="me">
          <img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>">
          <b><?php echo $name." ".$surname; ?></b>
          <small><?php echo $email; ?></small>
          <div id="spacer"><button>Change details</button></div>
          <a href="login.php">log out</a>
        </div>
  </div>

<script>
  $("#me").hide();
  $("#drop").click(function(){
    $("#me").toggle(500)
  });
</script>

</body>
</html>