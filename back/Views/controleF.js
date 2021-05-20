const submit = document.getElementById('submit');
const id = document.getElementById('id_f');
const telephone = document.getElementById('telephone_f');
const rib = document.getElementById('RIB_f');
submit.disabled = true;
function controleSaisieAjouterFournisseur() {
    
    const id = document.getElementById('id_f').value;
    const telephone = document.getElementById('telephone_f').value;
    const rib = document.getElementById('RIB_f').value;
 
    if ((id != '') && (telephone != '') && (rib != '')){
         submit.disabled = false;
    }
     else {
         submit.disabled = true;
    }
}
id.addEventListener('input', () => {
    
    controleSaisieAjouterFournisseur();
})
telephone.addEventListener('input', () => {
    
    controleSaisieAjouterFournisseur();
})

rib.addEventListener('input', () => {
   
    controleSaisieAjouterFournisseur();
})