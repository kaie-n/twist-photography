/*!
* Twist Photography SG
* Code licensed under the Apache License v2.0.
* For details, see http://www.apache.org/licenses/LICENSE-2.0.
*/

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    $('a.page').bind('click', function (event) {


        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $('#portfolio').offset().top
        }, 500, 'easeInOutExpo');
         event.preventDefault();
        $('.grid').addClass("hide");
        $('.portfolio-gallery').removeClass("active")
        $($anchor.attr('href')).removeClass("hide");
        $(this).parent().addClass("active");

    });

});




// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top',
    offset: 51
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function () {
    $('.navbar-toggle:visible').click();
});

$(window).load(function () {
    // PAGE IS FULLY LOADED  
    // FADE OUT YOUR OVERLAYING DIV
    $('#overlay').fadeOut();
    // photogallery at lightbox
    $(".portfolio-hover").click(function () {
        document.getElementsByTagName('html')[0].style.overflowY = 'hidden';
        //document.getElementById('navigation').style.marginRight = "17px";
        //$("nav").addClass('margin-right-17');
    });
    $(".btn").click(function () {
        document.getElementsByTagName('html')[0].style.overflowY = 'scroll';
        //document.getElementById('navigation').style.marginRight = "0px";
        //$("nav").removeClass('margin-right-17');
    });
    $(".close-modal").click(function () {
        document.getElementsByTagName('html')[0].style.overflowY = 'scroll';
        //document.getElementById('navigation').style.marginRight = "0px";
        //$("nav").removeClass('margin-right-17');
    });
});

// wow doge animation
new WOW().init();


baguetteBox.run('.gallery', {
    animation: 'fadeIn'

});