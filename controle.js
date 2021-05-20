const submit = document.getElementById('submit');
const username = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const designation = document.getElementById('designation');
const mobileno = document.getElementById('mobileno');
submit.disabled = true;
function verifyPassword() {  
    var pw = document.getElementById("password").value;  
    //check empty password field  
    if(pw == "") {  
       document.getElementById("message").innerHTML = "**Fill the password please!";  
       return false;  
    }  
     
   //minimum password length validation  
    if(pw.length < 8) {  
       document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
       return false;  
    }  
    
  //maximum length of password validation  
    if(pw.length > 15) {  
       document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
       return false;  
    } else {  
         
    }  
    return true;
  }  
function emailIsValid (email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}
function register() {
    const username = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password= document.getElementById('password').value;
    const designation= document.getElementById('designation').value;
    const mobileno = document.getElementById('mobileno').value;
    if (((true===emailIsValid(email))) && (true===verifyPassword(password)) && (username != '') && (mobileno != '') && (designation != '')){
         submit.disabled = false;
    }
     else {
         submit.disabled = true;
    }
}
username.addEventListener('input', () => {
    
    register();
})
email.addEventListener('input', () => {
    
    register();
})

password.addEventListener('input', () => {
   
    register();
})
designation.addEventListener('input', () => {
   
  register();
})
mobileno.addEventListener('input', () => {
   
  register();
})