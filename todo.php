<?php 
  session_start();
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $surname= $_SESSION['surname'];
  $pic = $_SESSION['pic'];
  $_POST['id'] = $_SESSION['id'];
  

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
  <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji+2&display=swap" rel="stylesheet">
  <script src="script/todo.js"></script>
</head>
<body>
  <div class="navbar">
      <p><b><?php echo $name ?></b><a href="login.php"><img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>" id="userpic"></a></p>
  </div>
  <div class="note_container">
    <div id="edit_here" class="create_note"> 
  <!-- Edit data comes in here -->
    </div>
    <div class="create_note">
      <form  id="createnew"> 
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
          <button type="submit" class="clickme add" onclick="create()"><img src="icons/add.png" title="Add note"></button>
        </div>
      </form>
    </div>
    <div class="form_controls"> 
      <button type="button" id="clickme">clickme to create a new note</button>
      </div>
  <div>

  <div class="note_wrapper" id="dragme">
    <ul class="notewrap" id="sortable">
      <!-- Ajax will render the returned notes in here -->
    </ul>
  </div>

<script>
$("#clickme").click(function(){
      $("#clickme").hide();
      $("#createnew").show(300);
      $("#createnew").addClass("shadow");
      $(window).scrollTop(0);
    });

function create() {
    $.ajax({
      type: 'post',
      url:  './queries/create_note.php',
      data: $("#createnew").serialize(),
      success: function(data) {
        $('#sortable').append(data);
        $('#createnew').hide();
        document.getElementById('createnew').reset();
        $('#clickme').show();
      }
    })
     event.preventDefault(); 

}

  function delete_note(elmnt) {
    var id = elmnt.id;
    $.ajax({
      type: 'post',
      url: './queries/delete.php',
      data: {noteID: id},
      success: function() {
        $("#sortable").empty();
        $.ajax({
    url: './queries/load_notes.php',
    success: function(data) {
      $('#sortable').append(data);
    }
  })
      }
    })
  }

  function edit(elm) {
    var id = elm.id;
    $.ajax({
      type: 'post',
      url: './queries/edit_note.php',
      data: {noteID: id},
      success: function(data) {
        $("#edit_here").empty();
        $('#edit_here').append(data);
        $('#edit_here').show(500);
        $("#edit_data").addClass("shadow");  
      }
    })
  }
  
  function update_note() {
    event.preventDefault(); 
    $.ajax({
      type: 'post',
      url:  './queries/alter_note.php',
      data: $("#edit_data").serialize(),
      success: function() {
        $('#edit_here').hide(300);
        $("#sortable").empty();
        $.ajax({
    url: './queries/load_notes.php',
    success: function(data) {
      $('#sortable').append(data);
      return;
    }
  })
      }

    })
  }
</script>
</body>
</html>