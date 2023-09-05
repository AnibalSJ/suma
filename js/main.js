let idAudioRepro = 0;
let audios = [
    ["En este espacio debemos ingresar el usuario asignado y la contraseña correspondiente","a"], // Login 0
    ['En soporte de primer nivel, podremos realizar soporte en línea, lo cual ejecuta actividades, evitando el escalamiento a otras áreas. Tengamos en cuenta que un semáforo en rojo significa debemos ejecutar consultas y acciones según el producto, sí, se encuentra color verde, significa que los servicios están normalizados', 
    'Aquí encontrarás los datos del cliente como teléfono, nombre del cliente, estado de la cuenta de facturación y estado de cuenta de servicio', 
    'Aquí se encuentra la información del inventario: Equipos Instalados, Tecnología, Central, etc. A su vez, él tiene la posibilidad de ejecutar ciertas acciones en la parte inferior', 
    'Se identifica de color rojo con el icono de peligro, al dar click sobre este, podremos obtener información sobre los equipos NAP en el perímetro, con el objetivo de identificar si existe una falla masiva no reportada', 
    'Se identifica de color azul, al dar click sobre este puede visualizar algunas imágenes sobre el equipo instalado', 
    'Se identifica de color naranja, en este se encuentra acciones en el menú que se desplegará en la parte inferior del botón, y se efectuarán dando click sobre estas opciones. Algunas de las acciones son "Reset de Modem", "Reinicio de fábrica", "Reaprovisionar servicios", los cuales refrescarán los semáforos de infraestructura de acceso', 
    'Aquí se encuentra la información de la línea telefónica, en donde se encontrará los parámetros, los estados y el servicio con el que cuenta el cliente, A su vez, él tiene la posibilidad de ejecutar ciertas acciones en la parte inferior', 
    'Línea telefónica cuenta con algunas consultas tales como ‘Validad Conectividad’ y ‘transferencia inmediata’, las cuales brindan información acerca de la calidad del servicio', 
    'Se identifica de color naranja, en este se encuentra acciones en el menú que se desplegará en la parte inferior del botón, y se efectuarán dando click sobre estas opciones. Algunas de las acciones son "Normalizar los servicios", "Reset el # de teléfono configurado en el Modem", etc.', 
    'Aquí se encuentra la información sobre el servicio de televisión, en donde se encontrará los parámetros, los estados y el servicio con el que cuenta el cliente, A su vez, él tiene la posibilidad de ejecutar ciertas acciones en la parte inferior', 
    'Cuenta con algunas acciones como "Normalizar el estado susbcriber ID", "Reset de la clave parental" y reaprovisionar los servicios de televisión, esto refrescará y normalizará los servicios.',
    'Aquí se encuentra la información sobre el servicio de Internet, en donde se encontrará los parámetros, los estados y el servicio con el que cuenta el cliente, A su vez, él Técnico tiene la posibilidad de ejecutar ciertas acciones y consultas que se encuentran en la parte inferior.',
    'El módulo Internet cuenta con algunas consultas tales como “Nombre red WIFI” y “Estado de red WIFI”, etc.',
    'Cuenta con algunas acciones como "Normalizar usuario de Navegación", "Normalizar velocidades" etc.',
    'Aquí se encuentra la información sobre la ONT, en donde se encontrará los parámetros, los estados y el servicio con el que cuenta el cliente, A su vez, él tiene la posibilidad de ejecutar ciertas acciones y consultas que se encuentran en la parte inferior.',
    'Ajustes WIFI ONT, cuenta con algunas consultas tales como “Equipos conectados” y “ALEPO”, etc.',
    'Cuenta con algunas acciones como "Cambiar tipo de encriptación, "Cambiar estado WIFI" etc.'
    ], // ? Soporte Eficiente 1
    ['Se muestran los datos del cliente', 
    'Se muestra la información referente al producto contratado',
    'Se muestra la información sobre el soporte que se va a brindar',
    'Se muestra la información referente a la factura del servicio',
    'Se muestra la información de la pqr si está creada y si no, se muestra un formulario para crear la pqr',
    'Se da click en la lupa para ver los solicitantes disponibles',
    'Se verifica todos los datos del solicitante y luego se da click en editar',
    'Se verifica todos los datos y se actualiza cualquier dato necesario, se autoriza el manejo de los datos y se da click en guardar',
    'Se da click al botón después de completar todo el formulario y tener el solicitante para crear la pqr',
    'Aquí se encuentra la información de la pqr que se acabó de crear'
    ]
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

}
function desaparecerHablador(){
    setTimeout(() => {
        $('#alert-flotante').removeClass("etb-flotant-active");
    }, 2000);
}
function ocultarHablador(){
    $('#alert-flotante').removeClass("etb-flotant-active");
}
function hablador(array, textE){
    // clearInterval(efectuarTexto);
    $('#text-msg-hab').empty();
    $('#alert-flotante').addClass("etb-flotant-active");

    document.getElementById('mensaje-parlante').style.display = "block";
    $('#mensaje-parlante').addClass('msg-waite');
    efectuarTexto = setTimeout(() => {
        $('#mensaje-parlante').removeClass('msg-waite');
        let textoFinal = dividirText(audios[array][textE])

        var typed = new Typed('#text-msg-hab', {
            strings: textoFinal,
            typeSpeed: 30,
        });


    }, 700);
}
function habladorText(text){
    $('#text-msg-hab').empty();
    $('#alert-flotante').addClass("etb-flotant-active");
    document.getElementById('mensaje-parlante').style.display = "block";
    $('#mensaje-parlante').addClass('msg-waite');

    setTimeout(() => {
        $('#mensaje-parlante').removeClass('msg-waite');
        let textoFinal = dividirText(text)
        console.log(textoFinal);

        var typed = new Typed('#text-msg-hab', {
            strings: textoFinal,
            typeSpeed: 45,
        });
    }, 700);

}
function cambioParlanteE(idimg){
    document.getElementById(idimg).src = "./assets/img/img-audios/etbUsed.svg";
    document.getElementById(idimg).style.animation = 'none';
}

function dividirText(textoInicial){
    let lengthText = textoInicial.length;
    let texto = textoInicial;
    let contador = 1;
    let textoFinal = [];
    let posicion = 0;
    let tempText = '';

    for(let i = 0; i < lengthText; i++){
        if(contador >= 100){
            if(texto.charAt(i) != ' '){
                tempText = tempText + texto.charAt(i);
            }else{
                tempText = tempText + texto.charAt(i);
                textoFinal[posicion] = tempText;
                
                posicion = posicion + 1;
                contador = 0; 
                tempText = '';
            }
        }else if(i == (lengthText - 1)){
            
            tempText = tempText + texto.charAt(i);
            textoFinal[posicion] = tempText;

            posicion = posicion + 1;
            contador = 0; 
            tempText = '';

        }else{
            tempText = tempText + texto.charAt(i);
        }

        contador = contador + 1;
    }   

    return textoFinal;
}
function verificacionlenght(textarea){
    if(textarea.value.length >= 1 && textarea.value != '' && textarea.value != ' '){
        return true;
    }else{
        return false;
    }
}
function verificacionlenghtCondi(textarea, minimo, maximo){
    if(textarea.value.length >= minimo && textarea.value != '' && textarea.value != ' ' && textarea.value.length < maximo){
        return true;
    }else{
        return false;
    }
}