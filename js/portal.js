let btn_modal_visita = document.getElementById('btn-modal-visita');
btn_modal_visita.addEventListener('click', () =>{
    $( document ).ready(function() {
        $('#modal-visita').modal('toggle')
    });
})

let search = document.getElementById('search');
search.addEventListener('click', () =>{
    console.log('si');
    let table_search = document.getElementById('table_search');
    table_search.style.display = 'block';
})