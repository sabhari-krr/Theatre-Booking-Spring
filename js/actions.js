$(document).ready(function () {
  $("#register").hide();
  $("#login").hide();
  $("#login-toggler").click(function () {
  $("#register").hide("slow");
  $("#login").show("slow");

  });
  $("#register-toggler").click(function () {
  $("#login").hide("slow");
  $("#register").show("slow");


  });
});
