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
    <img id="logo" src="img/logo.png">
      <p id="drop"><img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>" id="userpic"></p>
        <div class="dropdown" id="me">
          <img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>">
          <b><?php echo $name." ".$surname; ?></b>
          <small><?php echo $email; ?></small>
          <div id="spacer"><button>Change details</button></div>
          <a href="login.php">Log out</a>
        </div>
  </div> <!-- Navbar ends -->

  <div class="note_container">
  
  <div class="create_note">
  
  <?php 
if (isset($_GET['notetitle'])) {

  $title = $_GET['notetitle'];
  $description = $_GET['description'];
  $dateDue = $_GET['dueDate'];
  $color = $_GET['color'];
  
  $edit_area = "<form method=\"post\" action=\"methods/alter_note.php? oldnote=$title\" class=\"update\"> 
                    <input type=\"text\" name=\"title\" value=\"$title\">
                  <label for=\"description\">Note details</label>
                    <textarea name=\"description\" rows=\"10\">$description</textarea>   
                  <label for=\"color\">Choose your color </input>
                    <input type=\"color\" name=\"color\" value=$color>       
                  <label for=\"date\">Due date </label>
                    <input type=\"date\" name=\"date\" min=".date('Y-m-d')."><br>
                  <div class=\"update_button\">
                    <button type=\"button\" class=\"clickme\"><img src=\"icons/update.png\" title=\"Add note\" class=\"upd\"></button>
                  </div>
                </form>";

 
   echo $edit_area;
 }
?> 
      
    <form method="post" action="tables/notes.php" id="createnew"> 
    <div class="close">
      <button type="button" class="clickme" id='cancel'><img src="icons/cancel.png" title="Close"></button>
    </div>
      <label for="title">Title</label>
      <input type="text" name="title" pattern=".{2,40}" id="place">
      <label for="description">Note details</label>
      <textarea name="description" rows="10" pattern=".{5,1000}"></textarea>  
      <div class="pick">
          <input type="date" name="date" min = "<?php  echo date('Y-m-d'); ?>">
          <input type="color" name="color" value="#ffffff">    
      </div>
      <div class="add_button">
        <button type="submit" class="clickme add"><img src="icons/add.png" title="Add note"></button>
      </div>
    </form>
  </div>
  <div class="form_controls"> 
    <button type="button" id="clickme">clickme to create a new note</button>
    </div>
<div>

<div class="note_wrapper" id="dragme">

<?php 
  if (isset($_GET['pull'])) {
  
  } else { 
    echo "<form method=\"post\" action=\"methods/sort.php\" class=\"block\">
        <button type=\"submit\" class=\"clickme\" id=\"sort\"><img src=\"icons/sort.png\" title=\"Sort alphabetically\"></button>
      </form>";
  }

?>

  <ul class="notewrap" id="sortable">


<?php 
require "db/dbconnect.php";
if(isset($_GET['pull'])){
  $pull = $_GET['pull'];
  $pull_data = $conn->query($pull);    

} else {
$pull = "SELECT * FROM notes WHERE notes.user = $id";
$pull_data = $conn->query($pull); }

global $pull_data;
$n = 1;
if ($pull_data->num_rows > 0) {
    while ($data = $pull_data->fetch_assoc()) {
        $title = $data['title'];
        $color = $data['color'];
    echo "<li style=\"background-color:$color;\">";
      echo "<form method=\"post\" action=\"methods/delete.php\" class=\"note\" id=\"$n\">";
        echo "<input type=\"hidden\" name=\"title\" value=\"$title\">";
        echo "<h1>".$title."</h1>";
        echo "<hr>";
        echo "<br><br>".nl2br($data['description'])."</p>";
        echo "<div class=\"buttonshide\" id=\"$n\">";
          echo "<a href=\"methods/edit_note.php? title=$title\"<buttun type=\"button\" class=\"clickme edit\"><img src=\"icons/edit.png\" title=\"Edit note\"></button></a>";
          echo "<button class=\"clickme delete\"><input type=\"hidden\" name=\"title\" value=\"$title\"><img src=\"icons/close.png\" title=\"DELETE note\"></button>"; 
        echo "</div>";
      echo "</form>";
    echo "</li>";
    $n++;
  }}
?>
</ul>
</div>


<script>
$(document).ready(function() {  
  $("#me").hide();
  $("#drop").click(function(){
    $("#me").toggle(500)
  });
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();       
  $("#createnew").hide();
  $("#clickme").click(function(){
    $(this).hide();
    $("#createnew").addClass("shadow");
    $(window).scrollTop(0);
    $("#createnew").show(300);
    $('input[type="date"]').show();
  });

  $("#cancel").click(function(){
    $("#createnew").hide(300);
    $("#clickme").show(300);
  })

  $(".note").mouseenter(function(){
    var div = $(this).children('.buttonshide');
    $(div).css( "visibility", "visible" );
    $(this).mouseleave(function() {
      $(div).css( "visibility", "hidden" ) 
    });
  }); 
});
</script>

</body>
</html>