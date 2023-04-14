$(document).ready(function () {
  $("#send-otp").attr("disabled", true);
  var userid;
  $("#userId-input").keyup(function () {
    userid = $(this).val();
    if (userid.length != 0) {
      $.ajax({
        url: "/forgotpassword/checkuserid",
        method: "POST",
        data: { userId: userid },
        datatype: "text",
        success: function (data) {
          var isValidUser = jQuery.parseJSON(data)["isValidUser"];
          $("#userId>.error").html(isValidUser);
          console.log($("#userId>.error").html());
          if (isValidUser == "* Valid user ID.") {
            $("#send-otp").attr("disabled", false);
          }
        },
      });
    }
  });

  $("#send-otp").click(function () {
    $.ajax({
      url: "/forgotpassword/sendotp",
      method: "POST",
      data: { userId: userid },
      datatype: "text",
      beforeSend: function () {
        $(".loader").show();
      },
      success: function (data) {
        var otpSendMessage = jQuery.parseJSON(data)["otpSendMessage"];
        $("#userId>.error").html(otpSendMessage);
        $(".loader").hide();
        if (
          otpSendMessage ==
          "* OTP sent in your registered mail Id successfully"
        ) {
          $("#otp-input").attr("disabled", false);
          $("#verify-otp").attr("disabled", false);
        }
      },
    });
  });

  $("#verify-otp").click(function () {
    if ($("#otp-input").val().length != 0) {
      $.ajax({
        url: "/forgotpassword/verifyotp",
        method: "POST",
        data: { otp: $("#otp-input").val() },
        datatype: "text",
        beforeSend: function () {
          $(".loader").show();
        },
        success: function (data) {
          $(".loader").hide();
          var verifyOtp = jQuery.parseJSON(data)["verifyOtp"];
          $("#otp>.error").html(verifyOtp);
          if (verifyOtp == "* correct otp") {
            $("#pass").attr("disabled", false);
            $("#reset-password").attr("disabled", false);
          }
        },
      });
    }
  });

  $("#pass").click(function () {
    alert(
      "Password should be 8-15 character and contains \n atleast 1 uppcase \n atleast 1" +
      "lowercase \n atleast 1 special character(@,#.$,?,!,%,&) \n atleast 1 number"
    );
  });
  $("#reset-password").click(function () {
    if ($("#pass").val().length != 0) {
      $.ajax({
        url: "/forgotpassword/reset",
        method: "POST",
        data: { userid: userid , password: $("#pass").val() },
        datatype: "text",
        beforeSend: function () {
          $(".loader").show();
        },
        success: function (data) {
          var resetPassword = jQuery.parseJSON(data)["resetPassword"];
          $(".loader").hide();
          $("#password>.error").html(resetPassword);
        },
      });
    }
  });

  $("#eye").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });
});
