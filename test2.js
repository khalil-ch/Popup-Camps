const update = document.getElementById("update");

update.addEventListener('click', () => {
    const qt = document.getElementById('qt');
    const lib = document.getElementById('lib');
    const prix = document.getElementById('prix');  
    if(isNaN(qt) ||  isNaN(prix)){
        alert('libelle et prix doit etre un nombre');
    }
})