$(function(){
  $("#login").click(function(e){
    e.preventDefault();
      var email = $("#email").val();
      var password = $("#password").val();

      var status = true;
      // for email
      if(email == ""){
        $("#email").css("border", "red");
        $("#emailErr").text("Please Enter Email").css("color", "red");
        status = false;
      }else {
        $("#email").css("border", "");
        $("#emailErr").text("").css("color", "");
      }

      // for password
      if(password == ""){
        $("#password").css("border", "red");
        $("#passwordErr").text("Please Enter Password").css("color", "red");
        status = false;
      }else{
        $("#password").css("border", "");
        $("#passwordErr").text("").css("color", "");
      }

      if(status==true){

        $("#myform").submit();
       
      }
    });
});
