<?php 
  session_start();
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $surname= $_SESSION['surname'];
  $pic = $_SESSION['pic'];

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
      <p>Signed in as <b><?php echo $name." ".$surname; ?></b><a href="login.php"><img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>" id="userpic"></a></p>
  </div>

</body>
</html>