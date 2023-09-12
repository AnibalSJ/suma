document.getElementById('btn_edit_s').addEventListener('click', event=>{
    $('#solicitante').empty();
    let nameSolicitante = document.getElementById('tdname').dataset.name;
    let opt = document.createElement('option');
    opt.textContent = nameSolicitante;
    opt.value = nameSolicitante;
    opt.selected;

    document.getElementById('solicitante').appendChild(opt);
    $('#con_solicitant').addClass('hide_bo');
})
document.getElementById('btn_soli').addEventListener('click', event=>{
    $('#con_solicitant').removeClass('hide_bo');

})
document.getElementById('flujo-btn').addEventListener('click', event =>{
    $(document).ready(function() {
        $('#modal-flujo').modal('toggle')
    });
})
document.getElementById('btn-close-flujo').addEventListener('click', event=>{
    $( document ).ready(function() {
    $('#modal-flujo').modal('hide')
    });
    
})