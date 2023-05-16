let idAudioRepro = 0;
let audios = [
    ['a','a'], // Login
    ['a','a'], // Dashboard
    ['a','a'], // Orden
    ['a','a'], // Paso 1
    ['a','a'], // Paso 2
    ['a','a'], // Paso 2 Soporte Eficiente
    ['a','a'], // Paso 3
    ['a','a'], // Paso 4
    ['a','a'], // Paso 5
    ['a','a'], // Paso 6
    ['a','a'], // Paso 7
    ['a','a'], // Paso 8
]

let audioR = false;
function alertAudio(idAudio, idimg, array, textE){

    idAudio = document.getElementById(idAudio);

    if(!audioR){
        idAudio.play();
        idAudio.currentTime = 0;
        idAudioRepro = idAudio;
        audioR = !audioR;

        cambioParlanteE(idimg);
        $(idAudio).one('ended', desaparecerHablador);
    }else{
        // alert('pausar audio')
        idAudioRepro.pause();
        idAudioRepro.currentTime = 0;
        idAudioRepro = idAudio;
        idAudio.play()
        cambioParlanteE(idimg)
        $(idAudio).one('ended', desaparecerHablador)
    }
    hablador(array, textE)

function desaparecerHablador(){
    setTimeout(() => {
        $('#alert-flotante').removeClass("etb-flotant-active");
    }, 2000);
}
}
function hablador(array, textE){
    $('#text-msg-hab').empty();
    $('#alert-flotante').addClass("etb-flotant-active");

    document.getElementById('mensaje-parlante').style.display = "block";
    $('#mensaje-parlante').addClass('msg-waite');
    setTimeout(() => {
        $('#mensaje-parlante').removeClass('msg-waite');
        document.getElementById('text-msg-hab').appendChild(document.createTextNode(audios[array][textE]))
    }, 700);
}
function habladorText(text){
    $('#text-msg-hab').empty();
    $('#alert-flotante').addClass("etb-flotant-active");
    document.getElementById('mensaje-parlante').style.display = "block";
    $('#mensaje-parlante').addClass('msg-waite');

    setTimeout(() => {
        $('#mensaje-parlante').removeClass('msg-waite');
        document.getElementById('text-msg-hab').appendChild(document.createTextNode(text))
    }, 700);

}
function cambioParlanteE(idimg){
    document.getElementById(idimg).src = "./assets/img/Group 11.svg";
    document.getElementById(idimg).style.animation = 'none';
}



