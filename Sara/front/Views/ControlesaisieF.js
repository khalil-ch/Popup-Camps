const submit = document.getElementById('submit');
const id_f = document.getElementById('id-f');
const telephone_f = document.getElementById('telephone_f');
const RIB_f = document.getElementById('RIB_f');

submit.disabled = true;
function controleSaisieAjouterFournisseur() {
    
    const id_f = document.getElementById('id_f').value;
    const telephone_f = document.getElementById('telephone_f').value;
    const RIB_f = document.getElementById('RIB_f').value;

 
    if ((id_f != '') && (telephone_f != '') && (RIB_f != '') ){
         submit.disabled = false;
    }
     else {
         submit.disabled = true;
    }
}
id_f.addEventListener('input', () => {
    
    controleSaisieAjouterFournisseur();
})
telephone_f.addEventListener('input', () => {
    
    controleSaisieAjouterFournisseur();
})

RIB_f.addEventListener('input', () => {
   
    controleSaisieAjouterFournisseur();
})