$(document).ready(function(){
  $("#slide-menu").click(function(){
    $(".profile-menu").slideToggle();
  });
  var $isAlpha = /^[a-zA-Z ]*$/;
  var $isValidEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  function disableBtn() {
    if($(".error").text() != ""){
      $("#update").prop("disabled", true);
    }
  }
  function enableBtn() {
    if($(".error").text() == ""){
      $("#update").prop("disabled", false);
    } 
  }
  $("#fName>input").blur(function () {
    if (!$isAlpha.test($(this).val())) {
      $("#fName>.error").html("* only alphapets are allowed.");
      disableBtn();
    } else {
      $("#fName>.error").html("");
      enableBtn();
    }
  });
  $("#lName>input").blur(function () {
    if (!$isAlpha.test($(this).val())) {
      $("#lName>.error").html("* only alphapets are allowed.");
      disableBtn();
    } else {
      $("#lName>.error").html("");
      enableBtn();
    }
  });
  $("#emailId>input").blur(function () {
    if ($(this).val() != "" && !$isValidEmail.test($(this).val())) {
      $("#emailId>.error").html("* not a valid Email Id.");
      disableBtn();
    } else {
      $("#emailId>.error").html("");
      enableBtn();
    }
  });
  $("#pass").keyup(function () {
    $.ajax({
      url: "/landing/validPassword",
      method: "POST",
      data: { password : $(this).val() },
      datatype: "text",
      success: function (data) {
        if(data){
          console.log(data);
          $("#password>.error").html(data);
          disableBtn();
        }
        else{
          console.log(data);
          $("#password>.error").html(data);
          
        }
      },
    });
    enableBtn();
  });
  $("#eye").click(function(){
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });
  $("#file-upload-btn").click(function(){
    $("#file-upload-input").click();
  });
});