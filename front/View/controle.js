function verif() {
    var errors = "<ul>";
    var type = document.querySelector('#type_f').value;
    var tel = document.querySelector('#telephone_f').value;
    var RIB = document.querySelector('#RIB_f').value;
    if (type.charAt(0) < 'A' || type.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors += "type needs to start with an upper case";
    }
    if (tel.substring(0, 1) != '7' || tel.length != 8) {
        errors += "Phone number needs to be consisted of 8 numbers";
    }
    if (RIB.substring(0, 1) != '13' || RIB.length != 14) {
        errors += "RIB needs to be consisted of 14 numbers";
    }

    if (errors !== "<ul>") {
        document.querySelector('#erreur').style.color = 'red';
        errors += "</ul>"
        document.getElementById('erreur').innerHTML = errors;
        return false;
    } else {
        var msg = "welcome " 

        alert(msg);
    }


}