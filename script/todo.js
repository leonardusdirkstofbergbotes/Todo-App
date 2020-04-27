$(document).ready(function() {  /* when the document loads for the first time */
  $("#createnew").hide(); 
  $("#me").hide(); 
  $("#drop").click(function(){ /*dropdown profile details menu */
    $("#me").toggle(500) 
  }); 
  $.ajax({ /* loads all the notes from the signed in user */
    url: './queries/load_notes.php',
    success: function(data) {
      $('#sortable').append(data);
    }
  })
    $( function() { /* makes the notes draggable */
      $( "#sortable" ).sortable();
      $( "#sortable" ).disableSelection();
    } );  
    
$("#cancel").click(function(){
  $("#createnew").hide(300);
  $("#clickme").show(300);
});
  }); 
  
  
  