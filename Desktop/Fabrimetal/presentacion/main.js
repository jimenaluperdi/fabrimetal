$(document).ready(function () {

    $('#buttoncarp').click(function () {
        $('#carp').show();
        $('#metal').hide();
        $('#plancha').hide();
    });

    $('#buttonmetal').click(function () {
        $('#metal').show();
        $('#carp').hide();
        $('#plancha').hide();
    });

    $('#buttonplancha').click(function () {
        $('#plancha').show();
        $('#carp').hide();
        $('#metal').hide();
    });

    $(window).scroll(function () {
        var topPos = $(this).scrollTop();
        // console.log(topPos);
        if (topPos > 900) {
            $(".cajaRight").addClass("right");
            $('.cajaLeft').addClass('left');
            $(".cajaRight2").addClass("right2");
            $('.cajaLeft2').addClass('left2');
            $(".cajaRight3").addClass("right3");
            $('.cajaLeft3').addClass('left3');
        }
    });
});