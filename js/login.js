document.getElementById('btn-sub-login').addEventListener('click', event =>{
    $('#modal-loading').modal('toggle');
    setTimeout(() => {
        $('#modal-loading').modal('hide');
        document.getElementById('form_login').submit();

    }, 3000);
})
function credencialesErr(){
    $( document ).ready(function() {
        $('#modal-err').modal('toggle');
    });
}