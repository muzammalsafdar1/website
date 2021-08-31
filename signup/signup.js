$(document).ready(function(){
  let $first_regex = /^[A-Za-z ]{3,}$/;
  $('#first_name').on('keyup keydown', function(){
    var first_name = $('#first_name').val();
    if(first_name.match($first_regex)){
       $('#firstname_msg').html("");
    }else{
      $('#firstname_msg').html("atleast 3 character required");
    }
  });
      // for last name field
      let $last_regex = /^[A-Za-z ]{3,}$/;
  $('#last_name').on('keyup keydown', function(){
    var last_name = $('#last_name').val();
    if(last_name.match($last_regex)){
       $('#lastname_msg').html("");
    }else{
      $('#lastname_msg').html("atleast 3 character required");
    }
  });

      // password
      let $password_regex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z])[a-zA-Z0-9]{8,30}$/;
  $('#pwd').on('keyup keydown', function(){
    var password = $('#pwd').val();
    if(password.match($password_regex)){
       $('#pass_msg').html("");
    }else{
      $('#pass_msg').html("atleast 8 character required with atleast of small one capital and one number and no space");
    }
  });

     // retype password
     let $re_password_regex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z])[a-zA-Z0-9]{8,30}$/;
  $('#re_pwd').on('keyup keydown', function(){
    var password = $('#re_pwd').val();
    if(password.match($re_password_regex)){
       $('#repass_msg').html("");
    }else{
      $('#repass_msg').html("atleast 8 character required with atleast of small one capital and one number and no space");
    }
  });
  // match

  if($('#re_pwd').on('focusout', function(){
    if($('#pwd').val()==$('#re_pwd').val()){
      $('#repass_msg').html("");
      
    }else{
      $('#repass_msg').html("password doesnot match");  
    }
  })){

  }
  // phone number
  let $phone_regex = /^[0-9]{8,15}$/;
  $('#phone').on('focus keyup keydown', function(){
    var phone = $('#phone').val();
    if(phone.match($phone_regex)){
      $('#phone_mgs').html("");
    }else{
      $('#phone_mgs').html("at least 8 numbers no letters.")
    }if($('#phone').on('focusout',function(){
      $('#phone_mgs').html("");
    })){

    }
  });

 

});