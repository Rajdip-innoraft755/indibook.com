$(document).ready(function(){

  $(".loader").fadeOut(2000);
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
  $("#postContent").blur(function(){
    if($("#postContent").val().length == 0){
      $("#postBtn").prop("disabled",true);
    }
    else{
      $("#postBtn").prop("disabled",false);
    }
  });
  $("#file-upload-btn").click(function () {
    $("#file-upload-input").click();
  });
  $("#file-upload-input").change(function () {
    var file = $(this).get(0).files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function (event) {
        $("#preview").css("display","block");
        $("#preview").attr("src",event.target.result);
      };
      reader.readAsDataURL(file);
    }
  });
  var x = 2;
  $(".show-btn").click(function(){
    $(".post-section:nth-child(" + x + ")").css("display","block");
    var stop = $(this).attr("id");
    console.log(stop);
    $("#"+stop).css("display","none");
    x++;
  });
});
