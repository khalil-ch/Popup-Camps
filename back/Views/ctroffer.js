const submit = document.getElementById('submit');
const id = document.getElementById('id_offer');
const nom = document.getElementById('nom_offer');
const type = document.getElementById('type_offer').selectedIndex;
const duree = document.getElementById('duree_offer');

submit.disabled = true;

function controleSaisieAjouterOffer() {

    const id = document.getElementById('id_offer').value;
    const nom = document.getElementById('nom_offer').value;
    const type = document.getElementById('type_offer').selectedIndex;
    const duree = document.getElementById('duree_offer').value;
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