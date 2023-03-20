$(document).ready(function(){
  $("#slide-menu").click(function(){
    $(".profile-menu").slideToggle();
  });
  $("#eye").click(function(){
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });
});