$(document).ready(function () {
  $("#send-otp").attr("disabled", true);
  var userid;
  $("#userId-input").keyup(function () {
    userid = $(this).val();
    if (userid.length != 0) {
      $.ajax({
        url: "/home/validUser",
        method: "POST",
        data: { userId: userid },

        datatype: "text",
        success: function (result) {
          $("#userId>.error").html(result);
          if (result == "* valid user ID.") {
            $("#send-otp").attr("disabled", false);
          }
        },
      });
    }
  });

  $("#send-otp").click(function () {
    // $("#userId>.error").css("display", "block");
    $.ajax({
      url: "/home/forgotpassword/sendmail",
      method: "POST",
      data: { userId: userid },
      datatype: "text",
      beforeSend: function () {
        $(".loader").show();
      },
      success: function (result) {
        $("#userId>.error").html(result);
        $(".loader").hide();
        if (result == "* OTP sent in your registered mail Id successfully") {
          $("#otp-input").attr("disabled", false);
          $("#verify-otp").attr("disabled", false);
        }
      },
    });
  });

  $("#verify-otp").click(function () {
    // console.log($("#otp-input").val());
    if ($("#otp-input").val().length != 0) {
      $.ajax({
        url: "/home/forgotpassword/verifyotp",
        method: "POST",
        data: { otp: $("#otp-input").val() },
        datatype: "text",
        beforeSend: function () {
          $(".loader").show();
        },
        success: function (result) {
          $(".loader").hide();
          $("#otp>.error").html(result);
          if (result == "* correct") {
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
        url: "/home/forgotpassword/reset",
        method: "POST",
        data: { password: $("#pass").val() },
        datatype: "text",
        beforeSend: function () {
          $(".loader").show();
        },
        success: function (result) {
          $(".loader").hide();
          $("#password>.error").html(result);
        },
      });
    }
  });

  $("#eye").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });
  if(localStorage.getItem("theme") == "dark"){
    $(document.body).addClass("dark-theme");
    $("#theme-btn").addClass("fa-rotate-180");
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
    $("#theme-btn").toggleClass("fa-rotate-180");
  });
});
