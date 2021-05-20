const submit = document.getElementById('submit');
const idem = document.getElementById('idem');
const idmanager = document.getElementById('idmanager');
const name = document.getElementById('name');
const mobileno = document.getElementById('mobileno');
const designation = document.getElementById('designation');
submit.disabled = true;
function verifyidem() {  
    var idem = document.getElementById("idem").value;  
    //check empty password field  
    if(idem == "") {  
       document.getElementById("idem").innerHTML = "**Fill the password please!";  
       return false;  
    }  
     
   //minimum password length validation  
    if(idem.length != 8) {  
       document.getElementById("idem").innerHTML = "**Password length must be atleast 8 characters";  
       return false;  
    }  
    

    return true;
  }  
  function verifyidmanager() {  
    var idem = document.getElementById("idmanager").value;  
    //check empty password field  
    if(idem == "") {  
       document.getElementById("idmanager").innerHTML = "**Fill the password please!";  
       return false;  
    }  
     
   //minimum password length validation  
    if(idem.length != 8) {  
       document.getElementById("idmanager").innerHTML = "**Password length must be atleast 8 characters";  
       return false;  
    }  
    

    return true;
  }  

function addemployee() {
    const name = document.getElementById('name').value;
    const idem = document.getElementById('idem').value;
    const idmanager = document.getElementById('idmanager').value;
    const mobileno= document.getElementById('mobileno').value;
    const designation= document.getElementById('designation').value;
    if (((true===verifyidem(idem)))  && (true===verifyidmanager(idmanager)) && (name != '') && (designation != '') && (mobileno != '')){
         submit.disabled = false;
    }
     else {
         submit.disabled = true;
    }
}
idem.addEventListener('input', () => {
    
    addemployee();
})
idmanager.addEventListener('input', () => {
   
    addemployee();
})
name.addEventListener('input', () => {
    
    addemployee();
})

mobileno.addEventListener('input', () => {
   
    addemployee();
})
designation.addEventListener('input', () => {
   
    addemployee();
})