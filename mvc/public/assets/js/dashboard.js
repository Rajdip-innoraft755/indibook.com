$(document).ready(function(){
  $(".react").click(function(){
    $(this).toggleClass("fa-regular fa-solid");
  });
  $(".comment-btn").click(function(){
    $(this).toggleClass("fa-regular fa-solid");
    $(".comment-section").toggleClass("show hide");
  });
  $("#slide-menu").click(function(){
    $(".profile-menu").slideToggle();
  });
  $("#posContent").focus();
  $("#postContent").blur(function(){
    if($("#postContent").val().length == 0){
      $("#postBtn").prop("disabled",true);
    }
    else{
      $("#postBtn").prop("disabled",false);
    }
  });
});