const submit = document.getElementById('submit');
const id = document.getElementById('id_promo');
const nom = document.getElementById('nom_promo');
const type = document.getElementById('type_promo').selectedIndex;
const duree = document.getElementById('duree_promo');

submit.disabled = true;

function controleSaisieAjouterOffer() {

    const id = document.getElementById('id_promo').value;
    const nom = document.getElementById('nom_promo').value;
    const type = document.getElementById('type_promo').selectedIndex;
    const duree = document.getElementById('duree_promo').value;
    idInt = parseInt(id);
    dureeInt = parseInt(duree);
    typeInt = parseInt(type);
    if ((idInt >= 1) && (nom != '') && (type >= 1) && (dureeInt>=1)){
        submit.disabled = false;
    }
    else {
        submit.disabled = true;
    }
}

id.addEventListener('input', () => {

    controleSaisieAjouterOffer();
})
nom.addEventListener('input', () => {

    controleSaisieAjouterOffer();
})


duree.addEventListener('input', () => {

    controleSaisieAjouterOffer();
})