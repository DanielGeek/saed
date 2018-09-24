//funcion para cambiar de color el fondo del navbar combinando css
$(function (){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
        $('.gtco-nav').addClass("white");
        $(".nav_a").addClass("green");
        } else {
        $(".gtco-nav").removeClass("white");
        $(".nav_a").removeClass("green");
        }
    });
});