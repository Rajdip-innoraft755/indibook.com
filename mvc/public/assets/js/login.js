$(document).ready(function () {
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
  $("#userId>input").keyup(function(){
    $("#userId>.error").css('display','none');
  });
  $("#eye").click(function(){
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });
  if($.cookie("cookie-policy") != "accept" ){
    $(".cookie-policy").fadeIn(500);
  }
  $(".cookie-button").click(function(){
    if($(this).attr("id") == "accept-cokkie") {
      $.cookie("cookie-policy","accept",{path: '/', expires: 15/1440 }); 
      // 0.2395 is for store it for 15 mins and it calculates as per GMT 
    }
    else {
      $.cookie("cookie-policy","decline",{path: '/', expires: 15/1440 });
    }
    $(".cookie-policy").fadeOut();
  });

});
