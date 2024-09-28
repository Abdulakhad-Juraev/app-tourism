$(document).ready(function (){
    $(".phoneAreaMask").inputmask("(99) 999-99-99");
});



const openOrder = document.getElementById('openOrder');
const modal_container = document.getElementById('modal_containerOrder');
const closeOrder = document.getElementById('closeOrder');



openOrder.addEventListener('click', () => {
    modal_container.classList.add('showData');
});

closeOrder.addEventListener('click', () => {
    modal_container.classList.remove('showData');
});
