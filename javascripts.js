window.addEventListener("mouseup", function(event){
  var login = document.getElementById("openlogin");
  if (event.target == login) {
    login.style.display = "none";
   }
});

window.addEventListener("mouseup", function(event){
  var editProfile = document.getElementById("open-edit-profile");
  if (event.target == editProfile) {
    editProfile.style.display = "none";
   }
});

function showpw() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function check_pw() {
  if (document.getElementById('registerpw').value ==
        document.getElementById('repeatpw').value) {
          return true;
  } else {
    event.preventDefault(); 
    alert('Password do not match, please try again');
    returnToPreviousPage();
    return false;
  }
  
}



