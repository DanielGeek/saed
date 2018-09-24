$(document).ready(function () {
    
  $( ".brochas" ).hide();
  
  $('.capacitacion' ).click(function () {
    $( "#h4-capacitacion" ).slideToggle('slow');
    $( "#brocha-capacitacion" ).slideToggle( "slow" );
  });

  $('.asesoria' ).click(function () {
    $( "#h4-asesoria" ).slideToggle('slow');
    $( "#brocha-asesoria" ).slideToggle( "slow" );
  });

  $('.aplicacion' ).click(function () {
    $( "#h4-aplicacion" ).slideToggle('slow');
    $( "#brocha-aplicacion" ).slideToggle( "slow" );
  });
  

});