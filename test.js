const createSubmit = document.getElementById('submitCreate');

createSubmit.addEventListener('click', (e) => {
    e.preventDefault();
    const qt = document.getElementById('qt').value;
    const prix = document.getElementById('prix').value;
    if(isNaN(qt) ||  isNaN(prix)){
        alert('libelle et prix doit etre un nombre');
    }
})
