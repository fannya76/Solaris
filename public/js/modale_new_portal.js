// *******************************************************
// ********* AFFICHAGE FORMULAIRE AJOUT SALON / PORTAIL

const modale_new_portal = document.querySelector('.modale_new_portal');
const btn_new_portal = document.querySelector('.btn_new_portal');

// const body = document.body;

btn_new_portal.addEventListener('click', () => {
    console.log('ok');
    modale_new_portal.classList.add('visible');
    document.body.style.overflow = 'hidden';
})

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modale_new_portal) {
        modale_new_portal.classList.remove('visible');
        body.style.overflow = 'visible';
    }
  }





