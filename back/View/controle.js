const submit = document.getElementById('submit');
const lib = document.getElementById('lib');
const prix = document.getElementById('prix');
const qt = document.getElementById('qt');
submit.disabled = true;
function controleSaisieAjouterProduit() {
    
    const lib = document.getElementById('lib').value;
    const prix = document.getElementById('prix').value;
    const qt = document.getElementById('qt').value;
 
    if ((prix != '') && (qt != '') && (lib != '')){
         submit.disabled = false;
    }
     else {
         submit.disabled = true;
    }
}
lib.addEventListener('input', () => {
    
    controleSaisieAjouterProduit();
})
qt.addEventListener('input', () => {
    
    controleSaisieAjouterProduit();
})

prix.addEventListener('input', () => {
   
    controleSaisieAjouterProduit();
})