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
  $("#file-upload-btn").click(function () {
    $("#file-upload-input").click();
  });
  $("#file-upload-input").change(function () {
    console.log("hi");
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
  $("#show-btn").click(function(){
    console.log("hi");
    // $(".loader").show();
    $.ajax({
      url: "landing/loadmore",
      beforeSend : function(){
        $(".loader").show();
      },
      success: function (data) {
        $(".loader").hide();
        console.log("success");
      }
    });
  });
  
});