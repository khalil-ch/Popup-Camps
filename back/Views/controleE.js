const submit = document.getElementById('submit');
const nom_E = document.getElementById('nom_E');
const description_E= document.getElementById('description_E');
submit.disabled = true;

function controleSaisieAddEvent() {
    
    const nom_E= document.getElementById('nom_E').value;
    const description_E = document.getElementById('description_E').value;
   console.log("aaaaaaaaaaaaaaa");
    if ( (description_E!="") && (nom_E!="")) {
         submit.disabled = false;
         console.log("bbbbbbbbbbbbbbb");

    }
     else {
         submit.disabled = true;
         console.log("cccccccccccccccc");

    }
}
nom_E.addEventListener('input', () => {
   console.log("bbbbbbbbbbbbbbb");
    controleSaisieAddEvent();
})

description_E.addEventListener('input', () => {
    
    controleSaisieAddEvent();
})
