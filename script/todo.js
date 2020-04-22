$(document).ready(function() {  
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

    // $(".note").mouseenter(function(){
    //   console.log('hello');
    //   var div = $(this).children('.buttonshide');
    //   $(div).css( "visibility", "visible" );
    //   $(this).mouseleave(function() {
    //     $(div).css( "visibility", "hidden" ) 
    //   });
    // }); 
  });
  