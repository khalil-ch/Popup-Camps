const submit = document.getElementById(submitCreate);

submit.addEventListener('submit', () => {
    const lib = document.getElementById(lib);
    const prix = document.getElementById(prix);
    const qt = document.getElementById(qt);
    if ( false===(prix.isInteger()) || false===(qt.isInteger()))
    {
        alert('Libelle , Prix et Quantite doit etre un nombre');
        }

})