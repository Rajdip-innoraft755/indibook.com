$(document).ready(function () {
  $("#userId>input").keyup(function(){
    $("#userId>.error").css('display','none');
  });
	$("#userId>input").blur(function(){
    $("#userId>.error").css('display','block');
    var userid = $(this).val();
    if(userid.length != 0){
      $.ajax({
        url: "/home/validUser",
        method: "POST",
        data: {userId:userid},
        datatype: "text",
        success: function(result){
          $("#userId>.error").html(result);
        }
      });
    }
  });
  $("#eye").click(function(){
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });
});
