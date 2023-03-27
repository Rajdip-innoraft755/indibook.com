$(document).ready(function(){
  if(localStorage.getItem("theme") == "dark"){
    $(document.body).addClass("dark-theme");
    $("#theme").addClass("fa-rotate-180");
  }
  $("#theme").click(function(){
    console.log("hi");
    $(document.body).toggleClass("dark-theme");
    if($(document.body).attr("class")=="dark-theme"){
      localStorage.setItem("theme","dark");
    }
    else{
      localStorage.setItem("theme","light");
    }
    $(this).toggleClass("fa-rotate-180");
  });

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
  $(".user").on("click",function(){
    console.log($(this).attr("id"));
    $.ajax({
      url: "/landing/user",
      method: "POST",
      data: { userId : $(this).attr("id") },
      datatype: "text",
      success: function (data) {
      },
    });
  });

  
});