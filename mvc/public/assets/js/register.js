$(document).ready(function () {
  var $isAlpha = /^[a-zA-Z ]*$/;
  var $isValidPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/;
  var $isValidEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  function disableBtn() {
    $("#signUp").prop("disabled", true);
    $("#signUp").addClass("disabled");
  }
  function enableBtn() {
    $("#signUp").prop("disabled", false);
    $("#signUp").removeClass("disabled");
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
  $("#password>input").keyup(function () {
    if (!$isValidPassword.test($(this).val())) {
      $("#password>.error").css("color", "red");
      $("#password>.error").html("Weak Password");
      disableBtn();
    } else {
      $("#password>.error").css("color", "green");
      $("#password>.error").html("Strong Password");
      enableBtn();
    }
  });
  $("#eye").click(function(){
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });
  $("#userId>input").blur(function () {
    var userid = $(this).val();
    $.ajax({
      url: "/home/availableUser",
      method: "POST",
      data: { userId: userid },
      datatype: "text",
      success: function (html) {
        $("#userId>.error").html(html);
      },
    });
    console.log($("#userId>.error").html());
    if($("#userId>.error").val() == "* User Id not available"){
      console.log($("#userId>.error").text());
      disableBtn();
    }
    else{
      enableBtn();
    }
  });
});
