function validate(){
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var error_message = document.getElementById("error_message");
  
  var text;
  if(username.length < 15){
    text = "Please Enter valid Username";
    error_message.innerHTML = text;
    return false;
  }

  if(password.length < 8){
    text = "Password is too short";
    error_message.innerHTML = text;
    return false;
  }
  // if(email.indexOf("@") == -1 || email.length < 6){
  //   text = "Please Enter valid Email";
  //   error_message.innerHTML = text;
  //   return false;
  // }
  // if(message.length <= 140){
  //   text = "Please Enter More Than 140 Characters";
  //   error_message.innerHTML = text;
  //   return false;
  // }
  alert("Form Submitted Successfully!");
  return true;
}