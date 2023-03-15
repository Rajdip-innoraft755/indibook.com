$(document).ready(function () {
	$("#userId>input").blur(function(){
    var userid = $(this).val();
		console.log(userid);
    $.ajax({
      url: "/home/validUser",
      method: "POST",
      data: {userId:userid},
      datatype: "text",
      success: function(result){
        $("#userId>.error").html(result);
      }
    });
  });
});
