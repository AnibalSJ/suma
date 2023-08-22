let idAudioRepro = 0;
let audios = [
    ["En este espacio debemos ingresar el usuario asignado y la contraseña correspondiente","a"], // Login 0
    ['a','a'], // Dashboard 1
    ['a','a'], // Orden 2
    ['Aquí encontraremos la lista de los pasos que conforman Aseguramiento, además el paso en el que se encuentre actualmente','Aquí se encuentra información de la red, como por ejemplo la NAP', 'En esta función podrás ver la localización de la NAP o actualizar la página.', 'En el primer paso puede consultar información sobre el acceso de red, además de algunas funciones como por ejemplo la ubicación de la NAP. La parte inferior encuentra el botón acceso en donde encontrará información de los servicios'], // Paso 1  3
    ['En este paso, podremos cambiar la ONT instalada, acceder a Soporte eficiente con el botón de la derecha que dice SN1, a su vez, como adicionar un SVA con el botón "Venta SVAs"','En este apartado podremos cambiar la ONT en caso de ser necesario, así que ingresaremos a la lista desplegable que está a la derecha de la ONT y seleccionamos el serial de la ONT a cambiar, a su vez, el motivo. Con el segundo botón verde, podremos normalizar la ONT, en caso de que sea necesario.'], // Paso 2  4
    ['En soporte eficiente, podremos realizar soporte en línea, lo cual ejecuta actividades, evitando el escalamiento a otras áreas. Tengamos en cuenta que un semáforo en rojo significa debemos ejecutar consultas y acciones según el producto, sí, se encuentra color verde, significa que los servicios están normalizados', 
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
    ], // ? Soporte Eficiente 5

    ['El técnico tiene la posibilidad de realizar ventas SVA. Hay que tener en cuenta que las adiciones de Wifi Plus tipo 1 y MESH, genera una orden de trámite de adición SVA y lo llevará para que gestione la orden',
    'Aquí adiciona 50mbs al plan, si opta por esta alternativa, no puede elegir 100mbps.', 
    'Aquí adiciona 100mbs al plan, si opta por esta alternativa, no puede elegir 50mbps.', 
    'Aquí adicionar los puntos cableados, puede agregar un total de siete. Pero tenga en cuenta la disponibilidad de los puertos.', 
    'Aquí adiciona la oferta "Wifi Plus Tipo 1", en caso de que elija esta alternativa no podrá seleccionar una opción "MESH".', 
    'Aquí adiciona la oferta "MESH Tipo 2", en caso de que elija esta alternativa no podrá seleccionar las opciones "WIFI PLUS", "MESH TRES" y "MESH Adicional"', 
    'Aquí adiciona la oferta "MESH Tipo 3", en caso de que elija esta alternativa no podrá seleccionar las opciones "WIFI PLUS" y  "MESH  DOS" ', 
    'Aquí adiciona la oferta "MESH Adicional", en caso de que elija esta alternativa no podrá seleccionar las opciones "WIFI PLUS"  y  "MESH  DOS" '], // ? Adicion SVA 6
    ['Aquí visualiza información sobre el acceso de red y productos, además de ello, en la sección acceso de red encontremos el nuevo serial de la ONT a instalar, al darle siguiente, encontraremos una confirmación del proceso que gestionamos en el paso dos','Aquí recopila los cambios a efectuar en el paso dos, en caso de que desee continuar con esa configuración de click en "Aceptar"'], // Paso 3  7 
    ['En este paso debemos activar los servicios instalados, tenga en cuenta que si no se realiza esta activación los servicios no funcionarán y no lo dejará continuar con la orden, después de activar los servicios damos click en siguiente para continuar con el Módulo contacto de visita','a'], // Paso 4  8
    ['Aquí encontrará la información detallada sobre los servicios a su vez como el estado de este en plataforma, el cual será representado por semáforos, posterior a esto, daremos siguiente, tenga en cuenta que es un paso de no retorno y que todos los semáforos deben estar de color verde.','a'], // Paso 5  9
    ['Aquí se registra todo el material utilizado durante el proceso, a su vez como la cantidad que se usó. Con el botón de color azul se agregarán más ítems para registrar todo el material utilizado.',
    'Debe registrar los códigos resolutivos que represente el problema presentado, para esto seleccione las causales pertinentes en las listas desplegables.', 
    'Debe registrar las observaciones que se han generado durante el proceso, es necesario que se hagan las mismas.', 
    'Recopila la información sobre el inventario registrado con el que cuenta el técnico', 'Se elige la Actividad próxima a realizar'], // Paso 6  10
    ['Aquí debe dar click sobre el cliente al cual se le va a generar la boleta, para iniciar el diligenciamiento de la misma.',
    'Se sube el mapa de calor creado por el técnico', 
    'Permite adicionar los espacio de la casa del cliente, con el objetivo de verificar la conectividad y estabilidad en estos espacios', 
    'Permite adicionar los dispositivos adicionales del cliente, con el objetivo de parametrizar su uso de la conexión y si fue configurado por el técnico, puede agregar tantos como sean necesarios.',
    'El cliente debe diligenciar su firma correspondiente.', 
    'Es necesario guardar todos los cambios realizados de la boleta para poder continuar con el siguiente paso.'], // Paso 7  11
    ['Aquí encuentra el detalle de la orden y así daría por finalizado el proceso de aseguramiento'], // Paso 8  12
    ['Aquí encuentra el detalle de las actividades finalizadas'], // Ordenes Completadas 13
    // !! Aprovisinamiento
    ['Como se puede evidenciar en la parte superior, la orden ha cambiado a aprovisionamiento para gestionar la adicción de los SVA, debemos seleccionar los seriales de los equipos preseleccionados y continuar con el botón siguiente.'], // Paso 2 14
    ['En este caso, no es necesario activar ningún servicio, por lo que continuaremos con el paso siguiente para dar paso al módulo de visitas.'],  // Paso 4 15
    ['Si se instaló un punto cableado, selecciona el botón al lado de la pregunta, que debe quedar activo. Posterior a ello llené los apartados referentes a la instalación.', 
    'El técnico debe firmar, acreditando que entrego el servicio'],  // Paso 7 16
    ['Aquí encontrará el detalle de la orden, al darle al botón finalizar, regresará a la orden inicial para continuar el procedimiento de Aseguramiento'], // Paso 8 17
    // Aprovisionamiento
    // Modulo visita
    ['En este apartado se valida los datos del titular o los datos del cliente que esté representando al titular, a su vez se envía un código SMS para autentificar su veracidad, el código SMS para el simulador es "N9OVVI".'], //  18
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
