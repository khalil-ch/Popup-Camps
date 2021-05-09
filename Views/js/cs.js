
function test(){
    'id_offer' = id_offer;
    'nom_offer'= nom_offer;
    var a = "@";
    var pt = ".";
    if( id_offer === 0 || nom_offer === 0)
    {
        alert("Verify your ID Or Name ");
    }
    else{
        if (pwd.length < 8) {
            alert("Your Id must at least Have 4 characters");
        }

       else {
                var prenom = login.substring(0,login.indexOf(pt) );
                var nom = login.substring(login.indexOf(pt) + 1,login.indexOf(a));
                alert('Your Offer is registered successfully ' ) ;
                window.location="index.html";
            }
        }
    }
}