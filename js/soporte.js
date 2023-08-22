bd = [];

bd.datos = {
    ssid: 'ETB',
    password: '12345678',
    estado: 'Inactivo',
    sesionActiva: false,
    encriptacion: '',
    servSecundarios: false,
    tv: {
        estado: 'Suspendido'
    }
}
let identificadorLogs = 1;

bd.log = [];
// EstructuraLog = {
//     fechaInicio: '08, 06, 2020',
//     fechaFin: '08, 06, 2020',
//     comando: 'ACC_BTN_REAPROVIONAR_SERVICIOS',
//     descripcion: 'Reaprovisionar Servicios',
//     tipoComando: 'Estado Plataforma',
//     Respuesta: 'Response: OK',
// }


let estadoConsulta = false;
let estadoEquipos = false;
let estadoReaproInfra = false;
let estadoReaproTv = false;
let estadoReaproInternet = false;
let estadoReaproLineaTele = false;
let estadoReaproOnt = false;
let estadoConsultaIn = false;
let estadoConsultaOnt = false;
let estadoConsultaInfra = false;
let estadoPqr = false;
let estadoLog = false;
let sidebarSoporte = document.querySelector('.sidebar-soporte');
let estadodrownprueba = false;


function itemInfoSoporte(contenedor){
    contenedor = document.getElementById(contenedor);
    contenedor.classList.forEach(element=>{
        if(element == 'hide-body'){
            $(contenedor).removeClass('hide-body');
        }else{
            $(contenedor).addClass('hide-body');
        }

    })
}

document.getElementById('close-vecino').addEventListener('click', event=>{
    estadoConsulta = false;
    $('#modal-consulta-vecinos').removeClass('deshide');
    document.getElementById("modal-body-soporte").style['overflow-y'] = "scroll";
    window.scrollTo(0,0)
    ocultarHablador();
})

document.getElementById('btn-consul-equipos').addEventListener('click', event=>{
    if(estadoEquipos){
        estadoEquipos = false;
        $('#modal-consulta-equipos').removeClass('deshide');
        // document.getElementById("modal-body-soporte").style['overflow-y'] = "scroll";
        // window.scrollTo(0,0)
        window.scrollTo(0,0)
    }else{
        let scrollActual = window.scrollY;
        // document.getElementById("modal-body-soporte").style['overflow-y'] = "hidden";
        $('#modal-consulta-equipos').addClass('deshide');
        estadoEquipos = true;
        document.getElementById('modal-consulta-equipos').style.top = scrollActual;
        // window.scrollTo(0,0)
    }
})
document.getElementById('close-caracte-equipo').addEventListener('click', event=>{
    estadoEquipos = false;
    $('#modal-consulta-equipos').removeClass('deshide');
    document.getElementById("modal-body-soporte").style['overflow-y'] = "scroll";
    window.scrollTo(0,0)
})

document.getElementById('action-interne').addEventListener('click', event =>{
    if(estadoReaproInternet){
        $('#dropdrown-act-internet').removeClass('deshide');
        estadoReaproInternet = false;
    }else{
        $('#dropdrown-act-internet').addClass('deshide');
        estadoReaproInternet = true;
        
    }
})
document.getElementById('action-infra').addEventListener('click', event =>{
    if(estadoReaproInfra){
        $('#dropdrown-act-infr').removeClass('deshide');
        estadoReaproInfra = false;
    }else{
        $('#dropdrown-act-infr').addClass('deshide');
        estadoReaproInfra = true;
        
    }
})
document.getElementById('action-tv').addEventListener('click', event =>{
    if(estadoReaproTv){
        $('#dropdrown-act-tv').removeClass('deshide');
        estadoReaproTv = false;
    }else{
        $('#dropdrown-act-tv').addClass('deshide');
        estadoReaproTv = true;
        
    }
})

document.getElementById('action-linea-t').addEventListener('click', event =>{
    if(estadoReaproLineaTele){
        $('#dropdrown-act-linea-t').removeClass('deshide');
        estadoReaproLineaTele = false;
    }else{
        $('#dropdrown-act-linea-t').addClass('deshide');
        estadoReaproLineaTele = true;
        
    }
})

document.getElementById('btn-consul-internet').addEventListener('click', event =>{
    if(estadoConsultaIn){
        $('#dropdrown-act-consulta-interne').removeClass('deshide');
        estadoConsultaIn = false;
    }else{
        $('#dropdrown-act-consulta-interne').addClass('deshide');
        estadoConsultaIn = true;
    }
})

document.getElementById('btn-consul-infra').addEventListener('click', event =>{
    if(estadoConsultaInfra){
        $('#dropdrown-act-consulta').removeClass('deshide');
        estadoConsultaInfra = false;
    }else{
        $('#dropdrown-act-consulta').addClass('deshide');
        estadoConsultaInfra = true;
    }
})

document.getElementById('btn-consul-ont').addEventListener('click', event =>{
    if(estadoConsultaOnt){
        $('#dropdrown-act-consulta-ont').removeClass('deshide');
        estadoConsultaOnt = false;
    }else{
        $('#dropdrown-act-consulta-ont').addClass('deshide');
        estadoConsultaOnt = true;
    }   
})
document.getElementById('action-ont').addEventListener('click', event =>{
    if(estadoReaproOnt){
        $('#dropdrown-act-ont').removeClass('deshide');
        estadoReaproOnt = false;
    }else{
        $('#dropdrown-act-ont').addClass('deshide');
        estadoReaproOnt = true;
    }
})


function modalExitoSoporte(textTitulo, contenidoText, tituloMain){
    if(tituloMain){
        $('#tittle-main-exit').empty();
    }else{
        $('#tittle-main-exit').empty();
        document.getElementById('tittle-main-exit').appendChild(document.createTextNode('ACC_BTN_'));
    }
    $('#titulo-alerta-corr').empty();
    document.getElementById('titulo-alerta-corr').appendChild(document.createTextNode(textTitulo))
    if(contenidoText == false){
        $('#contenido-alerta-cor').empty();
        document.getElementById('contenido-alerta-cor').appendChild(document.createTextNode('Se procederá a refrescar los semáforos'))
    }else{
        $('#contenido-alerta-cor').empty();
        // document.getElementById('contenido-alerta-cor').appendChild(document.createTextNode(contenidoText))
    }
        $(document).ready(function() {
        $('#modal-reapro-serv').modal('toggle')
    });
    var today = new Date();
 
    // obtener la fecha y la hora
    var now = today.toLocaleString();
    // Logs
    tempLog = {
        id: identificadorLogs,
        fechaInicio: now,
        fechaFin: now,
        comando: `ACC_BTN_${textTitulo}`,
        descripcion: textTitulo,
        tipoComando: 'Estado Plataforma',
        Respuesta: 'Response: OK',
    }
    identificadorLogs = identificadorLogs + 1;
    bd.log.push(tempLog);
}

document.getElementById('btn-transferencia').addEventListener('click', event =>{
    modalExitoSoporte('TRANSFERENCIA INMEDIATA', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('DIMPU'))
    label.appendChild(document.createElement('br'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('tel: +5760155579455'));

    document.getElementById('contenido-alerta-cor').appendChild(label);
    document.getElementById('contenido-alerta-cor').appendChild(p);

})

document.getElementById('btn-consul-ping').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_PING', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-una-colums');

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('SuccessCount'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('5'));
    divModal.appendChild(label);
    divModal.appendChild(p);


    label = document.createElement('label');
    label.appendChild(document.createTextNode('FailureCount'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('0'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('MinimumResponseTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('5'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('MaximumResponseTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('11'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('AverageResponseTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('8'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    document.getElementById('contenido-alerta-cor').appendChild(divModal);


})

document.getElementById('btn-validar-serv').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_PING', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-two-colums');

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('SuccessCount'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('5'));
    divModal.appendChild(label);
    divModal.appendChild(p);


    label = document.createElement('label');
    label.appendChild(document.createTextNode('FailureCount'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('0'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('MinimumResponseTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('3'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('MaximumResponseTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('11'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('AverageResponseTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('7'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    document.getElementById('contenido-alerta-cor').appendChild(divModal);


})

document.getElementById('btn-consul-ping_lan').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('PING LAN CLIENTE LAN CLIENTE'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('URL o IP: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    input = document.createElement('input');
    input.type = "text";
    input.value = "https://www.google.com/";
    // input.placeholder = "4 Digitos";
    input.setAttribute('id', 'ip')
    document.getElementById('con-modal-ont-sopo').appendChild(input)


    $('.btn-ont-sopo').addClass('btn-ping-search');
    let btn = document.querySelector('.btn-ping-search');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        $('#modal-serv-ont-act').modal('hide')
            modalExitoSoporte('ACC_BTN_CAMBIO_ESTADO_REDWIFI', true, true);
            document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
            let divModal = document.createElement('div');
            $(divModal).addClass('con-two-colums');
        
            let label = document.createElement('label');
            label.appendChild(document.createTextNode('SuccessCount'))
            label.style.color = "#F36F31";
            label.style.fontWeight = "bold";
            let p = document.createElement('p');
            p.style.fontWeight = "600";
            p.style.color = "#46b8da";
            p.appendChild(document.createTextNode('5'));
            divModal.appendChild(label);
            divModal.appendChild(p);
        
        
            label = document.createElement('label');
            label.appendChild(document.createTextNode('FailureCount'))
            label.style.color = "#F36F31";
            label.style.fontWeight = "bold";
            p = document.createElement('p');
            p.style.fontWeight = "600";
            p.style.color = "#46b8da";
            p.appendChild(document.createTextNode('0'));
            divModal.appendChild(label);
            divModal.appendChild(p);
        
            label = document.createElement('label');
            label.appendChild(document.createTextNode('MinimumResponseTime'))
            label.style.color = "#F36F31";
            label.style.fontWeight = "bold";
            p = document.createElement('p');
            p.style.fontWeight = "600";
            p.style.color = "#46b8da";
            p.appendChild(document.createTextNode('3'));
            divModal.appendChild(label);
            divModal.appendChild(p);
        
            label = document.createElement('label');
            label.appendChild(document.createTextNode('MaximumResponseTime'))
            label.style.color = "#F36F31";
            label.style.fontWeight = "bold";
            p = document.createElement('p');
            p.style.fontWeight = "600";
            p.style.color = "#46b8da";
            p.appendChild(document.createTextNode('11'));
            divModal.appendChild(label);
            divModal.appendChild(p);
        
            label = document.createElement('label');
            label.appendChild(document.createTextNode('AverageResponseTime'))
            label.style.color = "#F36F31";
            label.style.fontWeight = "bold";
            p = document.createElement('p');
            p.style.fontWeight = "600";
            p.style.color = "#46b8da";
            p.appendChild(document.createTextNode('7'));
            divModal.appendChild(label);
            divModal.appendChild(p);
        
            document.getElementById('contenido-alerta-cor').appendChild(divModal);
    })
})

document.getElementById('btn-lan').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_LAN', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-two-colums');

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('DHCP Lease'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('86400'));
    divModal.appendChild(label);
    divModal.appendChild(p);


    label = document.createElement('label');
    label.appendChild(document.createTextNode('DHCP Enabled'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('Encendido'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('Router_IP_Address '))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('192.168.0.1'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('Router Subnet Mask'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('255.255.255.0'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('DHCP_Min_Address'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('192.168.0.3'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('DHCP_Max_Address'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('192.168.0.253'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    document.getElementById('contenido-alerta-cor').appendChild(divModal);
})

document.getElementById('btn-wan').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_WAN', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-two-colums');

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('WAN_Enabled'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('Encendido'));
    divModal.appendChild(label);
    divModal.appendChild(p);


    label = document.createElement('label');
    label.appendChild(document.createTextNode('IP'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('186.30.45.252'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('Usuario PPPOE'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('SR-35962439'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('Estado Conexion'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('Connected'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('DNS'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('200.75.51.132,200.75.51.133'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    document.getElementById('contenido-alerta-cor').appendChild(divModal);
})

document.getElementById('btn-equipos-con').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_WAN', true, true);   
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-uno-colums');
    
    let divEquipo = document.createElement('div');
    $(divEquipo).addClass('con-equipo');
    let p = document.createElement('p');
    p.appendChild(document.createTextNode('192.168.0.3'))
    divEquipo.appendChild(p)
    let img = document.createElement('img');
    img.src = "./assets/img/laptop.svg";
    divEquipo.appendChild(img)
    p = document.createElement('p');
    p.appendChild(document.createTextNode('Samsung'))
    divEquipo.appendChild(p)
    
    divModal.appendChild(divEquipo);
    document.getElementById('contenido-alerta-cor').appendChild(divModal);
})

document.getElementById('btn-alepo').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_PING', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-two-colums');

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('SessionExpiryTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('2022-08-13 23:22:08.0'));
    divModal.appendChild(label);
    divModal.appendChild(p);


    label = document.createElement('label');
    label.appendChild(document.createTextNode('StartDateTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('2022-08-12 10:21:58.0'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('UserID'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('1-KC03IGK'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('InterimSessionTime'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('86400'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('UserIP'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('186.30.173.146'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    label = document.createElement('label');
    label.appendChild(document.createTextNode('NASIdentifier'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode('BOCUJUM96001'));
    divModal.appendChild(label);
    divModal.appendChild(p);

    document.getElementById('contenido-alerta-cor').appendChild(divModal);


})



document.getElementById('change-name-ont').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });
    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Cambiar Nombre'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Nombre de RED WIFI (SSID): '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 1 a 32 caracteres";
    input.setAttribute('id', 'namessid')
    document.getElementById('con-modal-ont-sopo').appendChild(input)
    $('.btn-ont-sopo').addClass('btn-change-name');
    let btn = document.querySelector('.btn-change-name');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        canssid = verificacionlenght(document.getElementById('namessid'));
        if(canssid){
            $( document ).ready(function() {
                $('#modal-serv-ont-act').modal('hide')
                modalExitoSoporte('WIFI (Red)', true, true);
                // document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
                bd.datos.ssid = document.getElementById('namessid').value;
                $('#Nombre-red-ont-so').empty();
                document.getElementById('Nombre-red-ont-so').appendChild(document.createTextNode(bd.datos.ssid));
            });
        }else{
            alert('Complete todos los campos');
            // $( document ).ready(function() {
            //     $('#modal-verif').modal('toggle')
            // });
        }
    })
})
document.getElementById('change-name-wifi').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });
    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('CONSULTA WIFI RED'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Nombre de RED WIFI (SSID): '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 1 a 32 caracteres";
    input.setAttribute('id', 'namessid')
    document.getElementById('con-modal-ont-sopo').appendChild(input)
    $('.btn-ont-sopo').addClass('btn-change-name');
    let btn = document.querySelector('.btn-change-name');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        canssid = verificacionlenght(document.getElementById('namessid'));
        if(canssid){
            $( document ).ready(function() {
                $('#modal-serv-ont-act').modal('hide')
                modalExitoSoporte('WIFI (Red)', true, true);
                document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
                bd.datos.ssid = document.getElementById('namessid').value;
                $('#Nombre-red-ont-so').empty();
                document.getElementById('Nombre-red-ont-so').appendChild(document.createTextNode(bd.datos.ssid));
            });
        }else{
            alert('Complete todos los campos');
            // $( document ).ready(function() {
            //     $('#modal-verif').modal('toggle')
            // });
        }
    })
})

document.getElementById('change-pass-ont').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Cambiar Contraseña'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Clave WIFI: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 8 a 63 caracteres";
    input.setAttribute('id', 'pass')
    document.getElementById('con-modal-ont-sopo').appendChild(input)


    $('.btn-ont-sopo').addClass('btn-change-pass');
    let btn = document.querySelector('.btn-change-pass');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        canssid = verificacionlenghtCondi(document.getElementById('pass'), 8, 63);
        if(canssid){
            $( document ).ready(function() {
                $('#modal-serv-ont-act').modal('hide')
                modalExitoSoporte('WIFI (clave)', true, true);
                document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
                bd.datos.password = document.getElementById('pass').value;
            });
        }else{
            alert('Complete todos los campos');
            // $( document ).ready(function() {
            //     $('#modal-verif').modal('toggle')
            // });
        }
    })
})

document.getElementById('change-pass-wifi').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Cambiar Contraseña'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Clave WIFI: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 8 a 63 caracteres";
    input.setAttribute('id', 'namessid')
    document.getElementById('con-modal-ont-sopo').appendChild(input)


    $('.btn-ont-sopo').addClass('btn-change-pass');
    let btn = document.querySelector('.btn-change-pass');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        canssid = verificacionlenghtCondi(document.getElementById('namessid'), 8, 63);
        if(canssid){
            $( document ).ready(function() {
                $('#modal-serv-ont-act').modal('hide')
                modalExitoSoporte('WIFI (clave)', true, true);
                document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
                bd.datos.password = document.getElementById('namessid').value;
            });
        }else{
            alert('Complete todos los campos');
        }
    })
})

document.getElementById('change-all-ont').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Cambiar Nombre y Contraseña'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Nombre de Red (SSID): '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 1 a 32 caracteres";
    input.setAttribute('id', 'namessid')
    document.getElementById('con-modal-ont-sopo').appendChild(input)

    label = document.createElement('label');
    label.appendChild(document.createTextNode('Clave WIFI: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 8 a 63 caracteres";
    input.setAttribute('id', 'passw')
    document.getElementById('con-modal-ont-sopo').appendChild(input)


    $('.btn-ont-sopo').addClass('btn-change-name');
    let btn = document.querySelector('.btn-change-name');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        canssid = verificacionlenght(document.getElementById('namessid'));
        canpass = verificacionlenghtCondi(document.getElementById('passw'), 8, 63);
        if(canssid && canpass){
            $( document ).ready(function() {
                $('#modal-serv-ont-act').modal('hide')
                modalExitoSoporte('Cambiar nombre y contraseña', true, true);
                bd.datos.ssid = document.getElementById('namessid').value;
                bd.datos.password = document.getElementById('passw').value;
                $('#Nombre-red-ont-so').empty();
                document.getElementById('Nombre-red-ont-so').appendChild(document.createTextNode(bd.datos.ssid));
                // document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
            });
        }else{
            alert('Complete todos los campos');
            // $( document ).ready(function() {
            //     $('#modal-verif').modal('toggle')
            // });
        }
    })
})
document.getElementById('change-all-wifi').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Cambiar Nombre y Contraseña'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Nombre de Red (SSID): '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 1 a 32 caracteres";
    input.setAttribute('id', 'namessid')
    document.getElementById('con-modal-ont-sopo').appendChild(input)

    label = document.createElement('label');
    label.appendChild(document.createTextNode('Clave WIFI: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 8 a 63 caracteres";
    input.setAttribute('id', 'passssid')
    document.getElementById('con-modal-ont-sopo').appendChild(input)


    $('.btn-ont-sopo').addClass('btn-change-name');
    let btn = document.querySelector('.btn-change-name');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        canssid = verificacionlenght(document.getElementById('namessid'));
        canpass = verificacionlenghtCondi(document.getElementById('passssid'), 8, 63);
        if(canssid && canpass){
            $( document ).ready(function() {
                $('#modal-serv-ont-act').modal('hide')
                modalExitoSoporte('Cambiar nombre y contraseña', true, true);
                bd.datos.ssid = document.getElementById('namessid').value;
                bd.datos.password = document.getElementById('passssid').value;
                $('#Nombre-red-ont-so').empty();
                document.getElementById('Nombre-red-ont-so').appendChild(document.createTextNode(bd.datos.ssid));
                // document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
            });
        }else{
            alert('Complete todos los campos');
            // $( document ).ready(function() {
            //     $('#modal-verif').modal('toggle')
            // });
        }
    })
})

document.getElementById('btn-consulta-name-wifi').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_PING', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-two-colums');

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('NombreRed'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode(bd.datos.ssid));
    divModal.appendChild(label);
    divModal.appendChild(p);

    document.getElementById('contenido-alerta-cor').appendChild(divModal);
})

document.getElementById('btn-consulta-estado-wifi').addEventListener('click', event =>{
    modalExitoSoporte('CON_BTN_INT_PING', true, true);
    document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
    let divModal = document.createElement('div');
    $(divModal).addClass('con-two-colums');

    let label = document.createElement('label');
    label.appendChild(document.createTextNode('EstadoRed'))
    label.style.color = "#F36F31";
    label.style.fontWeight = "bold";
    let p = document.createElement('p');
    p.style.fontWeight = "600";
    p.style.color = "#46b8da";
    p.appendChild(document.createTextNode(bd.datos.estado));
    divModal.appendChild(label);
    divModal.appendChild(p);

    document.getElementById('contenido-alerta-cor').appendChild(divModal);
})

document.getElementById('change-estado-wifi-ont').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Cambiar Estado WIFI'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Clave WIFI: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let select = document.createElement('select');
    select.setAttribute('id', 'estado-red-select');
    let valores = ['Activar', 'Inactivar'];
    addselect(valores, select);
    document.getElementById('con-modal-ont-sopo').appendChild(select)


    $('.btn-ont-sopo').addClass('btn-change-estado-wifi');
    let btn = document.querySelector('.btn-change-estado-wifi');
    btn.addEventListener('click', event=> {
        ocultarHablador();

        $('#modal-serv-ont-act').modal('hide')
        modalExitoSoporte('Estado Red', true, true);
        bd.datos.estado = document.getElementById('estado-red-select').value == 'Activar' ? 'Encendido' : 'Inactivo';
        $('#semaforo-estado').removeClass(bd.datos.estado == 'Encendido' ? 'semaforo-error' : 'semaforo-co')
        $('#semaforo-estado').addClass(bd.datos.estado == 'Encendido' ? 'semaforo-co' : 'semaforo-error');
        $('#estado-red').empty();
        document.getElementById('estado-red').appendChild(document.createTextNode(bd.datos.estado == 'Encendido' ? 'Activo' : 'Inactivo'))
    })
})

document.getElementById('change-encryp-ont').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Cambiar Tipo Encriptación'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Password: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)

    let input = document.createElement('input');
    input.type = "text";
    input.placeholder = "De 8 a 32 caracteres";
    input.setAttribute('id', 'pass')
    document.getElementById('con-modal-ont-sopo').appendChild(input)

    label = document.createElement('label');
    label.appendChild(document.createTextNode('Modo Encriptación: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    let select = document.createElement('select');
    let valores = ['AES', 'TKIP', 'TKIP + AES'];
    addselect(valores, select);
    select.setAttribute('id', 'encrypt')
    document.getElementById('con-modal-ont-sopo').appendChild(select)


    $('.btn-ont-sopo').addClass('btn-change-encrip');
    let btn = document.querySelector('.btn-change-encrip');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        canssid = verificacionlenghtCondi(document.getElementById('pass'), 8, 32);
        if(canssid){
            $( document ).ready(function() {
                $('#modal-serv-ont-act').modal('hide')
                modalExitoSoporte('Cambiar Tipo Encriptación', true, true);
                // document.getElementById('tittle-main-exit').appendChild(document.createTextNode('Consulta: '));
                bd.datos.password = document.getElementById('pass').value;
                bd.datos.encriptacion = document.getElementById('encrypt').value;
                $('#encrypt-table').empty();
                document.getElementById('encrypt-table').appendChild(document.createTextNode(document.getElementById('encrypt').value));
            });
        }else{
            alert('Complete todos los campos');
        }
    })
})

document.getElementById('btn-reset-codigo').addEventListener('click', event=>{
    $(document).ready(function() {
        $('#modal-serv-ont-act').modal('toggle')
    });

    $('#con-modal-ont-sopo').empty();
    $('#tittle-ont-sop').empty();
    document.getElementById('tittle-ont-sop').appendChild(document.createTextNode('Reset CÃ³digo Secreto'));
    let label = document.createElement('label');
    label.appendChild(document.createTextNode('Código Secreto: '))
    document.getElementById('con-modal-ont-sopo').appendChild(label)
    
    input = document.createElement('input');
    input.type = "number";
    input.placeholder = "4 Digitos";
    input.setAttribute('id', 'code-secrect')
    document.getElementById('con-modal-ont-sopo').appendChild(input)


    $('.btn-ont-sopo').addClass('btn-code-change');
    let btn = document.querySelector('.btn-code-change');
    btn.addEventListener('click', event=> {
        ocultarHablador();
        modalExitoSoporte('Reset Código Secreto', false, true)
        $('#modal-serv-ont-act').modal('hide')
    })
})

document.getElementById('btn-norm-subs-id').addEventListener('click', event=>{

    // $('#modal-serv-ont-act').modal('hide')
    modalExitoSoporte('Normalizar Estado Subscriber ID', false, true);
    bd.datos.tv.estado = "Activo"; 

    $('#semaforo-estado-tv').addClass(bd.datos.tv.estado == 'Activo' ? 'semaforo-co' : 'semaforo-error');
    $('#semaforo-estado-tv').removeClass(bd.datos.tv.estado == 'Activo' ? 'semaforo-error' : 'semaforo-co');
    $('#estado-tv').empty();
    document.getElementById('estado-tv').appendChild(document.createTextNode(bd.datos.tv.estado == 'Activo' ? 'Activo' :   'Suspendido'))
})

// Sidebar
let elementsSidebar = document.getElementsByClassName('ico-element-sidebar-so');
let itemSidebar = document.getElementsByClassName('item-sidebar-sop');
for (let i = 0; i < elementsSidebar.length; i++) {
        elementsSidebar[i].addEventListener('mouseover', event => {
        $(itemSidebar[i]).addClass('item-sop-show');
    })
    elementsSidebar[i].addEventListener('mouseout', event => {
        $(itemSidebar[i]).removeClass('item-sop-show');
    })
}
function AbrirModalConsulta(idModal){
    if(estadoPqr){
        estadoPqr = false;
        $(`#${idModal}`).removeClass('deshide');
        document.getElementById("modal-body-soporte").style['overflow-y'] = "scroll";
        window.scrollTo(0,0)
        sidebarSoporte.style.display = "grid";
        ocultarHablador();
    }else{
        document.getElementById("modal-body-soporte").style['overflow-y'] = "hidden";
        $(`#${idModal}`).addClass('deshide');
        estadoPqr = true;
        window.scrollTo(0,0)
        sidebarSoporte.style.display = "none";
    }
}
function modalLog(idModal){
    if(estadoLog){
        estadoLog = false;
        $(`#${idModal}`).removeClass('deshide');
        document.getElementById("modal-body-soporte").style['overflow-y'] = "scroll";
        window.scrollTo(0,0);
        sidebarSoporte.style.display = "grid";
        $('#tbody-log').empty();
        $('#con-sopo-log').addClass('hide-body');
        
        ocultarHablador();
    }else{
        document.getElementById("modal-body-soporte").style['overflow-y'] = "hidden";
        $(`#${idModal}`).addClass('deshide');
        estadoLog = true;
        window.scrollTo(0,0)
        sidebarSoporte.style.display = "none";
        $('#tbody-log').empty();
        let tr = document.createElement('tr');
        let td = document.createElement('td');

        bd.log.forEach(element=>{
            tr = document.createElement('tr');
            td = document.createElement('td');
            td.appendChild(document.createTextNode(element['fechaInicio']))
            tr.appendChild(td);

            td = document.createElement('td');
            td.appendChild(document.createTextNode(element['fechaFin']))
            tr.appendChild(td);

            td = document.createElement('td');
            td.appendChild(document.createTextNode(element['comando']))
            tr.appendChild(td);

            td = document.createElement('td');
            td.appendChild(document.createTextNode(element['descripcion']))
            tr.appendChild(td);

            td = document.createElement('td');
            td.appendChild(document.createTextNode(element['tipoComando']))
            tr.appendChild(td);

            td = document.createElement('td');
            td.appendChild(document.createTextNode(element['Respuesta']))
            tr.appendChild(td);
            
            console.log(tr);
            document.getElementById('tbody-log').appendChild(tr);
        })
    }
}
document.getElementById('btn-session-actived').addEventListener('click', event =>{
    bd.datos.sesionActiva = true;
    $('#sesionActiva').empty();
    document.getElementById('sesionActiva').appendChild(document.createTextNode('SR-21490464'));
    $('#semafaro-sesion').addClass(bd.datos.sesionActiva ? 'semaforo-co' : 'semaforo-error');
})
document.getElementById('btn-norm-se-secun').addEventListener('click', event =>{
    bd.datos.servSecundarios = true;
    // $('#sesionActiva').empty();
    // document.getElementById('sesionActiva').appendChild(document.createTextNode('SR-21490464'));
    $('#semaforo-serv-secundarios').addClass(bd.datos.servSecundarios ? 'semaforo-co' : 'semaforo-error');
})

document.getElementById('btn-norm-tel-modem').addEventListener('click', event =>{
    bd.datos.servSecundarios = true;
    // $('#sesionActiva').empty();
    // document.getElementById('sesionActiva').appendChild(document.createTextNode('SR-21490464'));
    $('#semaforo-tel-modem').addClass(bd.datos.servSecundarios ? 'semaforo-co' : 'semaforo-error');
})


document.getElementById('action-prueba-d').addEventListener('click', event =>{
    if(estadodrownprueba){
        $('#dropdrown-act-prueba').removeClass('deshide');
        estadodrownprueba = false;
    }else{
        $('#dropdrown-act-prueba').addClass('deshide');
        estadodrownprueba = true;
    }
})

