$(document).ready(function () {
  $("#slide-menu").click(function () {
    $(".profile-menu").slideToggle();
  });
  var $isAlpha = /^[a-zA-Z ]*$/;
  var $isValidEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  function disableBtn() {
    if ($(".error").text() != "") {
      $("#update").prop("disabled", true);
    }
  }
  function enableBtn() {
    if ($.trim($(".error").text()) == "") {
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
  $("#pass").blur(function () {
    var isError = true;
    if ($.trim($(this).val()) != "") {
      $.ajax({
        url: "/landing/validPassword",
        method: "POST",
        data: { password: $(this).val() },
        datatype: "text",
        success: function (data) {
          if (data) {
            $("#password>.error").html(data);
            isError = false;
          }
        },
      });
    }
    if (isError == true) {
      $("#update").prop("disabled", false);
    } else {
      $("#update").prop("disabled", true);
    }
  });
  $("#eye").click(function () {
    console.log($(this).attr("id"));
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
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
        $("#preview").attr("src",event.target.result);
      };
      reader.readAsDataURL(file);
    }
  });
});
