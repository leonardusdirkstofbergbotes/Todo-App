$(document).ready(function() { 
  $("#createnew").hide(); 
  $("#me").hide(); 
  $("#drop").click(function(){ 
    $("#me").toggle(500) 
  }); 
  $('.dropdown2').hide();
  $("#sort").click(function(){
    $('.dropdown2').toggle(500);
  });
  $.ajax({
    url: './queries/load_notes.php',
    success: function(data) {
      $('#sortable').append(data);
    }
  })
    $( function() {
      $( "#sortable" ).sortable();
      $( "#sortable" ).disableSelection();
    } );  
    
$("#cancel").click(function(){
  $("#createnew").hide(300);
  $("#clickme").show(300);
});
  }); 
  
  
  