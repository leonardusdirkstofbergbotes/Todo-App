$(document).ready(function() { 
  $("#createnew").hide(); 
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
    })

    // $(".note").mouseenter(function(){
    //   console.log('hello');
    //   var div = $(this).children('.buttonshide');
    //   $(div).css( "visibility", "visible" );
    //   $(this).mouseleave(function() {
    //     $(div).css( "visibility", "hidden" ) 
    //   });
    // }); 
  }) 
  