const modalReturn = document.querySelector('#modal_return_main');
const modalDelivery = document.querySelector('#modal_delivery_main');
const body = document.querySelector('body');

body.addEventListener('click', (e)=> {
    if(e.target.classList.contains('modalBtn')){
        modalDelivery.style.display ='block';
    }
})

// kad uzsidarytu grazinimo modalas
modalDelivery.addEventListener('click', (e)=>{
    if(e.target.classList.contains('modal_exit')){
        modalDelivery.style.display = 'none';
    }
    
    });