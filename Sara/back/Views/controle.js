function verif() {
    var errors = "<ul>";
    var telephone_f = document.querySelector('#telephone_f').value;
    var RIB_f = document.querySelector('#RIB_f').value;
    if (type.charAt(0) < 'A' || type.charAt(0) > 'Z') {
        errors += "type needs to start with an upper case";
    }
    if (telephone_f.substring(0, 1) != '7' || telephone_f.length != 8) {
        errors += "Phone number needs to be consisted of 8 numbers";
    }
    if (RIB_f.substring(0, 1) != '13' || RIB_f.length != 14) {
        errors += "RIB needs to be consisted of 14 numbers";
    }

    if (errors !== "<ul>") {
        document.querySelector('#erreur').style.color = 'red';
        errors += "</ul>";
        document.getElementById('erreur').innerHTML = errors;
        return false;
    } else {
        var msg = "welcome ";

        alert(msg);
    }


}