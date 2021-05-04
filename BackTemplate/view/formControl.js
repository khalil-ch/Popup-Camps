function verif() {
    var errors = "<ul>";
    var nomCamping = document.querySelector('#nomCamping').value;
    var prix = document.querySelector('#prix').value;
    var emplacement = document.querySelector('#emplacement').value;
    var description = document.querySelector('#description').value
    var duree = document.querySelector('#duree').value
    var proprietaire = document.querySelector('#proprietaire').value;


    if (nomCamping.charAt(0) < 'A' || nomCamping.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors += "<li>Le nom doit commencer par une lettre Majuscule </li>";
    }
    if (emplacement.charAt(0) < 'A' || emplacement.charAt(0) > 'Z') {
        errors += "<li>Le prenom doit commencer par une lettre Majuscule </li>";
    }
    if (proprietaire.charAt(0) < 'A' || proprietaire.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors += "<li>Le nom doit commencer par une lettre Majuscule </li>";
    }

    if (prix >10 || prix.length != 2) {
        errors += "<li>Note invalide </li>";
    }

    if (description.length > '50') {
        errors += "<li>Description trop longue</li>";
    }
    if (duree < 1) {
        errors += "<li> Veuillew choisir nombre de jours</li>";
    };

    if (errors !== "<ul>") {
        document.querySelector('#erreur').style.color = 'red';
        errors += "</ul>"
        document.getElementById('erreur').innerHTML = errors;
        return false;
    } else {
        var msg = "Ajout avec succees ";

        alert(msg);
    }
    console.log("inside js file");
    alert("hellp");


}