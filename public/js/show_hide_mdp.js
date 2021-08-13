// ***************** AFFICHER / MASQUER LE MOT DE PASSE ***************

const mdp = document.getElementById('mdp');
const red_eye = document.querySelector('.fa-eye-slash');
const green_eye = document.querySelector('.fa-eye');

red_eye.addEventListener('click', () => {
    red_eye.style.display = 'none';
    green_eye.style.display = 'inline';
    mdp.setAttribute('type','text');
})

green_eye.addEventListener('click', () => {
    green_eye.style.display = 'none';
    red_eye.style.display = 'inline';
    mdp.setAttribute('type','password');
})

// ****************** MESSAGE D'ERREUR PERSONNALISé si MOT DE PASSE moins de 8 caractères ***************//

mdp.oninvalid = function(event) {
    event.target.setCustomValidity('Le mot de passe doit contenir au moins 8 caractères');
}



