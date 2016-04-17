$( document ).ready(function(){
    $('.button-collapse').sideNav();    // for mobile navigation menu
    $('select').material_select();      // for <select> tags
    $('.modal-trigger').leanModal();    // for modals boxes
    $('.parallax').parallax();          // for the parallax sections
    $('.modal').css({'overflow-x':'hidden'}); // get rid of horizontal scroll on login modal
    $('.modal').css({'overflow-y':'hidden'}); // get rid of vertical scroll on login modal
});