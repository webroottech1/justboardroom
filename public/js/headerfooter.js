$(document).ready(function () {

    $('.header-link .user-profile-pic').click(function(){
            $(this).toggleClass('show');
            $('.header-link .user-profile-pic .dropdown-menu').toggleClass('show');
    });



    jQuery('.header-link .nav-item .nav-link').hover(function(){
        $(this).addClass('nav-link-hover');
        }, function(){
        $(this).removeClass('nav-link-hover');
      });

    var btns = jQuery('.header-link .nav-link')
    btns.each(function (index){
        var href = jQuery( this ).attr('href');
        if(href == window.location.pathname){
            jQuery( this ).addClass('active');
            jQuery( this ).parent().addClass('active');

        }
    });

});
