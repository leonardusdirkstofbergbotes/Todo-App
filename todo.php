<?php 
  session_start();
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $surname= $_SESSION['surname'];
  $pic = $_SESSION['pic'];
  $email = $_SESSION['email'];
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
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.bootstrap-v4.min.css">
  <script src="https://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>

  <script src="script/todo.js"></script>
</head>
<body>
  <div class="navbar">
  <img id="logo" src="img/logo.png">
      <p id="drop"><b><?php echo $name ?></b><img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>" id="userpic"></p> 
        <div class="dropdown" id="me"> 
          <img src="user_uploads/<?php if ($pic != NULL) {echo $pic;} else { echo "user.png"; }?>"> 
          <b><?php echo $name." ".$surname; ?></b> 
          <small><?php echo $email; ?></small> 
          <a href="login.php">log out</a> 
        </div>
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
        <textarea name="description" rows="6" pattern=".{5,1000}" id="are"></textarea>  
        <div class="pick">
            <input type="date" name="date" min = "<?php  echo date('Y-m-d'); ?>" id='wha'>
            <div id="palette" onclick="color(this)"></div>
        </div>
        <div class="add_button">
          <button type="submit" class="clickme add" onclick="create()"><img src="icons/add.png" title="Add note"></button>
        </div>
      </form>
    </div>
    
    <div class="form_controls"> 
      <button type="button" id="clickme">Create a New Note</button>
      </div>
      <p id="sort" onclick="sort()"><img src="icons/sort.png"></p> 
  <div>

  <div class="note_wrapper" id="dragme">
    <ul class="notewrap" id="sortable">
      <!-- Ajax will render the returned notes in here -->
    </ul>
  </div>

<script>

function color(elm) {
  bee = event.target;
  mee = $(bee).attr("aria-label");
  console.log(mee);
  window.value = mee;

}
$('#palette').kendoColorPalette({
      columns: 8,
      tileSize: 25,
      palette: [
        '#e66400', '#24408f', '#48c51c', '#1ca4cd',
        '#f0e10f', '#d6d4e0', '#b8a9c9', '#622569'
        ]
    });

function cancel() {
  $('#edit_data').hide(300);
}

$("#clickme").click(function(){
  $('#edit_here').empty();
      $('#edit_here').hide();
      $("#clickme").hide();
      $("#createnew").show(300);
      $("#createnew").addClass("shadow");
      $(window).scrollTop(0);
    });
    
function create() {
  event.preventDefault(); 
  let formData = {
    title: document.getElementById("place").value,
    description: document.getElementById("are").value,
    date: document.getElementById("wha").value,
    noteID: document.getElementById("ide").value,
    color: window.value
  };
    $.ajax({
      type: 'post',
      url:  './queries/create_note.php', /*action */
      data: formData,
      success: function(data) {
        $('#sortable').append(data);
        $('#createnew').hide(500);
        document.getElementById('createnew').reset();
        $('#clickme').show();
      }
    })
     

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
    $("#createnew").hide();
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
    let formData = {
    title: document.getElementById("place").value,
    description: document.getElementById("are").value,
    date: document.getElementById("wha").value,
    color: window.value
  }; 
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

  function sort() {
  $.ajax({
    url:  './queries/sort.php',
    success: function(data) {
      $("#sortable").empty();
      $('#sortable').append(data);
    }
  })
}
</script>
</body>
</html>