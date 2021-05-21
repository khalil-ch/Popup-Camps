const submit = document.getElementById('submit');
const id_f = document.getElementById('id_f');
const telephone_f = document.getElementById('telephone_f');
const RIB_f = document.getElementById('RIB_f');
submit.disabled = true;
function verifyTEL() {  
    var telephone_f = document.getElementById("telephone_f").value;  
    //check empty field  ||tel length 8 numbers 
    if(telephone_f = "" || telephone_f.length != 8) {  
       //document.getElementById("telephone_f").innerHTML = "**Fill the number please!";  
       console.log (telephone_f);

       return false;  
    }     
    else {  
	     return true;
    }  
  
  }  
  function verifyRIB() {  
    var RIB_f= document.getElementById("RIB_f").value;  
    //check empty field  
    if(RIB_f == "" || RIB_f.length != 14) {  
       document.getElementById("RIB_f").innerHTML = "**Fill the number please!";  
       return false;  
    }  
     

    
    else {  
	       return true;
    }  

  }  
function controleSaisieAjouterFournisseur() {
    
    const id_f = document.getElementById('id_f').value;
    const telephone_f = document.getElementById('telephone_f').value;
    const RIB_f = document.getElementById('RIB_f').value;
    //const submit= document.getElementById('submit').value;
   console.log("aaaaaaaaaaaaaaa");
    if ( true==verifyTEL() && (true==verifyRIB()) && (id_f!="")) {
         submit.disabled = false;
         console.log("bbbbbbbbbbbbbbb");

    }
     else {
         submit.disabled = true;
         console.log("cccccccccccccccc");

    }
}
telephone_f.addEventListener('input', () => {
   console.log("bbbbbbbbbbbbbbb");
    controleSaisieAjouterFournisseur();
})

id_f.addEventListener('input', () => {
    
    controleSaisieAjouterFournisseur();
})

RIB_f.addEventListener('input', () => {
   
    controleSaisieAjouterFournisseur();
})
