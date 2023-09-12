<?php 
    include('seguridad.php');
    include('DB/db.php');
    
    $cliente = $_GET['cliente'];
    $sql = "select tipo_documento, documento, nombre, apellido, cuenta.estado, num_facturacion, telefono_fijo  from usuario
    inner join cuenta
    on titular = usuario.id
    where documento = $cliente";
    $datosCliente = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/portal.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/reportarfalla.css">
    <link href="./assets/fontawesome-free-6.4.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/fontawesome-free-6.4.0-web/css/brands.css" rel="stylesheet">
    <link href="./assets/fontawesome-free-6.4.0-web/css/solid.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/soporte.css">
    <link rel="shortcut icon" href="./assets/img/ETBblue.svg">

    <title>ETB - Portal</title>
</head>
<body>
    <div class="container-genre">
        <?php 
            include('./components/infoAudios.php');
            include('./components/sidebar.php');
            include('./components/navbar.php');
        ?>

        <div class="main-principal-portal" id="main-co">
        <?php
        if(mysqli_num_rows($datosCliente) > 0){
            foreach ($datosCliente as $row){
                $cliente = $row['nombre'] . ' ' . $row['apellido'];
                $documentoCiente =  $row['documento'];
                ?>
                <div class="con-sp-n">
                    <div class="header-p">
                        <div class="info-u">
                            <label for="">Cliente</label>
                            <label for="">Número de Documento</label>
                            <p><?php echo $row['nombre'] . ' ' . $row['apellido'] ?></p>
                            <p><?php echo $row['documento'] ?></p>
                        </div>
                    </div>
                    <div class="content-p" id="content-s-main"> 
                        <table class="table-general table-sopor" style="width: 400px;">
                            <tr>
                                <th>Semaforo</th>
                                <th>PLATINO <br> Recurrente: Si</th>
                                <th>Cantidad</th>
                            </tr>
                            <tr class="row-bl">
                                <td><div class="semaforo semaforo-error"></div></td>
                                <td>PQR NIVEL 1</td>
                                <td>2</td>
                            </tr>
                        </table>

                        <h4>
                            <img src="./assets/img/img-audios/etbUnoN.svg" alt="parlante-audio-etb" class="img-audio" id="img_general_sf" onclick="alertAudio('au_general_sf', 'img_general_sf', 1, 0)">

                            <audio id="au_general_sf" controls class="audio" style="display: none;">
                                <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">
                            </audio> 
                            Soporte Primer Nivel</h4>

                        <!-- Items -->
                                <div class="soportepn">
                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-sopo-info')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                INFORMACIÓN</h5>
                                            <img src="./assets/img/img-audios/etbDosA.svg" alt="parlante-audio-etb" class="img-audio" id="img_info_sf" onclick="alertAudio('au_info_sf', 'img_info_sf', 1, 1)">
                                            <audio id="au_info_sf" controls class="audio" style="display: none;">
                                                <source type="audio/wav" src="./assets/audio/soporte/au_info_sf.mp3">
                                            </audio>
                                        </div>
                                        <div class="body-items-inf">
                                            <div class="contet" id="con-sopo-info">
                                                <label style="grid-column: 1/4;">Teléfono</label>
                                                <p  style="grid-column: 1/4;"><?php echo $row['telefono_fijo'] ?></p>

                                                <label for=""  style="grid-column: 4/7; grid-row:1/2;">Nombre Suscriptor</label>
                                                <p id="nombre-ti" style="grid-column: 4/7; grid-row:2/3;"><?php echo $row['nombre'] . ' ' . $row['apellido'] ?></p>

                                                <label for="" style="grid-column: 1/4;">Estado Cuenta facturación</label>
                                                <p style="grid-column: 1/4;"><?php echo $row['estado'] ?></p>

                                                <label for="" style="grid-column: 4/7; grid-row:3/4;">Estado Cuenta Servicio</label>
                                                <p style="grid-column: 4/7; grid-row:4/5;"><?php echo $row['estado'] ?></p>

                                                <label for="" class="sub-info-so" style="grid-column: 2/3;">INC Falla Masiva</label>
                                                <p  class="sub-info-so"  style="grid-column: 3/7;">Dato no existente</p>

                                                <label for="" class="sub-info-so" style="grid-column: 3/4;">Fecha Creacion FM</label>
                                                <p  class="sub-info-so" style="grid-column: 4/7;">Dato no existente</p>

                                                <label for="" class="sub-info-so" style="text-align: right;">TES</label>
                                                <p  class="sub-info-so" style="padding-left: 50px;">Dato no existente</p>

                                                <label for="" class="sub-info-so" style="grid-column: 4/7; padding-left: 20px;">Cantidad INC Relacionados</label>
                                                <p  class="sub-info-so">Dato no existente</p>

                                                <label for="" class="sub-info-so" style="grid-column: 5/7;">Grupo Asignado INC Falla Masiva</label>
                                                <p  class="sub-info-so" style="grid-column: 1/3;">Dato no existente</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-sopo-prueba-ra')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                PRUEBA RÁPIDA DE VERIFICACIÓN</h5>
                                            <img src="./assets/img/img-audios/etbTresN.svg" alt="parlante-audio-etb" class="img-audio" id="img_pruebaver_sf" onclick="alertAudio('img_pruebaver_sf', 'img_pruebaver_sf', 5, 2)">
                                            <audio id="au_pruebaver_sf" controls class="audio" style="display: none;">
                                                <source type="audio/wav" src="./assets/audio/Paso 1/643358c519b8e527766907_JCRbpcWn.mp3">
                                            </audio>
                                        </div>
                                        <div class="body-items-inf item-larg">
                                            <div class="contet con-tree-colms" id="con-sopo-prueba-ra">
                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>MEDIO DE ACCESO</th>
                                                            <th>ESTADO DE PLATAFORMAS</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Estado Modem</td>
                                                                <td class="info__sem">UP <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Potencia</td>
                                                                <td class="info__sem">-22.292 <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table" style="grid-column: 1/2;">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>MODEM</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Serial</td>
                                                                <td>ZTE</td>
                                                                <td class="info__sem">#NOTFOUND <div class="semaforo semaforo-error"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table" style="grid-column: 1/2;">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>ATRIBUTO</th>
                                                            <th style="min-width: 400px;">PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>IP ACS</td>
                                                                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ESTADO ACS</td>
                                                                <td>Inactivo</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table" style="grid-column: 2/3; grid-row:1/2">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>INTERNET</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMAS</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Velocidad Bajada</td>
                                                                <td>500M</td>
                                                                <td class="info__sem">500M <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Velocidad Subida</td>
                                                                <td>500M</td>
                                                                <td class="info__sem">500M <div class="semoforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table" style="grid-column: 2/3; grid-row:2/3">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>TELEVISIÓN</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Estado</td>
                                                                <td>Activo</td>
                                                                <td class="info__sem">Activo <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table" style="grid-column: 2/3; grid-row:3/4">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>SVA</th>
                                                            <th>SERIAL INVENTARIO</th>
                                                            <th>SERIAL PLATAFORMA</th>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="con-table" style="grid-column: 3/4; grid-row:1/2">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>VOZ</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMAS</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Estado linea ACS</td>
                                                                <td>-</td>
                                                                <td class="info__sem">Up <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Estado Línea IMS</td>
                                                                <td>Activo</td>
                                                                <td class="info_sem">Activo</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table" style="grid-column: 3/4; grid-row:2/3">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>STB</th>
                                                            <th>SERIAL INVENTARIO</th>
                                                            <th>MAC INVENTARIO</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>1- <br>KC031WJ; <br>1- <br>КСОЗІНН</td>
                                                                <td>21500821467UD9260509) <br> 21500821467UF6238665</td>
                                                                <td>OC565C03 <br> OC565C03</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="items-actions-soporte">
                                                    <button style="background: #FF5E00;" id="action-prueba-d">Acciones <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbCuatroA.svg" alt="parlante-audio-etb" class="img-audio" id="img_act_in_sf" onclick="alertAudio('au_act_in_sf', 'img_act_in_sf', 5, 5)">
                                                    <audio id="au_act_in_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte">
                                                    </audio>

                                                    <button style="background: #00A7CC;"><i class="fa-solid fa-rotate" style="color: #ffffff;"></i></button>
                                                    <div class="dropdrown-act" id="dropdrown-act-prueba">
                                                        <label for="" onclick="modalExitoSoporte('RESET_MODEM', false, false), habladorText('Esto ejecutará un proceso interno, el cual reiniciará el modem.')">Reset de Modem</label>
                                                        <label for="" onclick="modalExitoSoporte('REINICIO DE FABRICA', false, false), habladorText('Esto ejecutará un proceso interno, el cual reiniciará la configuraón de fabrica.')">Reinicio de Fábrica</label>
                                                        <label for="" onclick="modalExitoSoporte('REAPROVISIONAR_SERVICIOS', false, false), habladorText('Esto ejecutará un proceso interno, Normalizará todos los servicios, por consiguiente todos los semaforos serán refrescados.')">Reaprovisionar Servicios</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-sopo-infro')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                INFRAESTRUCTURA ACCESO</h5>
                                            <img src="./assets/img/img-audios/etbCincoN.svg" alt="parlante-audio-etb" class="img-audio" id="img_infra_sf" onclick="alertAudio('au_infra_sf', 'img_infra_sf', 1, 2)">
                                            <audio id="au_infra_sf" controls class="audio" style="display: none;">
                                                <source type="audio/wav" src="./assets/audio/soporte/au_infra_sf.mp3">
                                            </audio>
                                        </div>
                                        <div class="body-items-inf item-larg">
                                            <div class="contet hide-body con-tree-colms" id="con-sopo-infro">
                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>EQUIPOS DE ACCESO</th>
                                                            <th>INVENTARIO</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Fabricante</td>
                                                                <td>ZTE</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hostname</td>
                                                                <td>BOCUZTC60116G03</td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>Central</td>
                                                                <td>CENTRAL CUNI</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Puerto OLT</td>
                                                                <td>PON PORTIO</td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>NAP</td>
                                                                <td>NICU31_G46:8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>VLAN ACCESO</td>
                                                                <td>84</td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>VLAN INTERNET</td>
                                                                <td>2838</td>
                                                            </tr>
                                                            <tr>
                                                                <td>UV INTERNET</td>
                                                                <td>300</td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>VLAN VOZ</td>
                                                                <td>60</td>
                                                            </tr>
                                                            <tr>
                                                                <td>VOIP IP</td>
                                                                <td>IP 10.211.232.145</td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>VLAN TV</td>
                                                                <td>531</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>MODEM</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Marca</td>
                                                                <td>ZTE</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Modelo</td>
                                                                <td>ZTE-F680-1FXS</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>Serial</td>
                                                                <td>ZTEGD0348FB8</td>
                                                                <td class="dell-sem">ZTEGD0348FBB <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mac</td>
                                                                <td>7426FFESE7EE</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>Versión Firmware</td>
                                                                <td>V6.0.22</td>
                                                                <td>1-1-2-1</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>SEÑAL</th>
                                                            <th>PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                        <tr class="row-bl">
                                                            <td>Estado Modem</td>
                                                            <td>UP</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Potencia</td>
                                                            <td class="dell-sem">-22.220 <div class="semaforo semaforo-co"></div></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="items-actions-soporte six__actions">

                                                    <button style="background: #00C2DF;" id="btn-consul-equipos" onclick="habladorText('Muestra algunas imágenes sobre la ONT instalada')">Imagen del Equipo</button>
                                                    <img src="./assets/img/img-audios/etbSeisA.svg" alt="parlante-audio-etb" class="img-audio" id="img_img__ont_sf" onclick="alertAudio('au_img__ont_sf', 'img_img__ont_sf', 1, 4)">
                                                    <audio id="au_img__ont_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_img__ont_sf.mp3">
                                                    </audio>
                                                    <span></span>
                                                    <button style="background: #FF5E00;" id="action-infra">Acciones <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbSieteN.svg" alt="parlante-audio-etb" class="img-audio" id="img_act_pruebaver_sf" onclick="alertAudio('au_act_pruebaver_sf', 'img_act_pruebaver_sf', 1, 5)">
                                                    <audio id="au_act_pruebaver_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_act_in_sf.mp3">
                                                    </audio>

                                                    <button style="background: #00A7CC;"><i class="fa-solid fa-rotate" style="color: #ffffff;"></i></button>

                                                    <div class="dropdrown-act" id="dropdrown-act-infr">
                                                        <label for="" onclick="modalExitoSoporte('RESET_MODEM', false, false), habladorText('Esto ejecutará un proceso interno, el cual reiniciará el modem.')">Reset de Modem</label>
                                                        <label for="" onclick="modalExitoSoporte('REINICIO DE FABRICA', false, false), habladorText('Esto ejecutará un proceso interno, el cual reiniciará la configuraón de fabrica.')">Reinicio de Fábrica</label>
                                                        <label for="" onclick="modalExitoSoporte('REAPROVISIONAR_SERVICIOS', false, false), habladorText('Esto ejecutará un proceso interno, Normalizará todos los servicios, por consiguiente todos los semaforos serán refrescados.')">Reaprovisionar Servicios</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-sopo-inter')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                INTERNET</h5>
                                                <img src="./assets/img/img-audios/etbOchoA.svg" alt="parlante-audio-etb" class="img-audio" id="img_it_sf" onclick="alertAudio('au_it_sf', 'img_it_sf', 1, 11)">
                                                <audio id="au_it_sf" controls class="audio" style="display: none;">
                                                    <source type="audio/wav" src="./assets/audio/soporte/au_it_sf.wav">
                                                </audio>
                                        </div>
                                        <div class="body-items-inf">
                                            <div class="contet hide-body con-tree-colms" id="con-sopo-inter">
                                                <div class="con-cards-soporte" style="grid-column: 1/4;">

                                                    <div class="cards-soporte">
                                                        <h2>Fabricante ONT</h2>
                                                        <p>ALCATEL</p>
                                                    </div>
                
                                                    <div class="cards-soporte">
                                                        <h2>Tipo Servicio</h2>
                                                        <p>Sin IP Fija</p>
                                                    </div>

                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>ESTADOS</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMAS</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Velocidad Bajada</td>
                                                                <td>300M</td>
                                                                <td class="dell-sem">300M<div class="semaforo semaforo-co"></div></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Velocidad Subida</td>
                                                                <td>300M</td>
                                                                <td class="dell-sem">300M<div class="semaforo semaforo-co"></div></td>
                                                            </tr>

                                                            <tr class="row-bl">
                                                                <td>Sesión Activa ACS</td>
                                                                <td>SR-21490464</td>
                                                                <td class="dell-sem"><span id="sesionActiva">#NOTFOUNDBO#</span><div class="semaforo semaforo-error" id="semafaro-sesion"></div></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Última conexión ACS</td>
                                                                <td>-</td>
                                                                <td class="dell-sem">2023-04-02T16:26:10<div class="semaforo semaforo-co"></div></td>
                                                            </tr>

                                                            <tr class="row-bl">
                                                                <td>VLAN Internet</td>
                                                                <td>-</td>
                                                                <td class="dell-sem">Activo<div class="semaforo semaforo-co"></div></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Usuario PPPOE ACS</td>
                                                                <td>SR-21490464</td>
                                                                <td class="dell-sem">SR-21490464<div class="semaforo semaforo-co"></div></td>
                                                            </tr>

                                                            <tr class="row-bl">
                                                                <td>DHCP Estado</td>
                                                                <td>-</td>
                                                                <td class="dell-sem">Activo<div class="semaforo semaforo-co"></div></td>
                                                            </tr>

                                                            
                                                        </tbody>
                                                    </table>  
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>SERVICIOS ADICIONALES</th>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>  
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>PAQUETES IP</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMAS</th>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>  
                                                </div>

                                                <div class="items-actions-soporte items__actions_four">
                                                    <button style="background: #FF5E00;" id="action-interne">Acciones <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbNueveN.svg" alt="parlante-audio-etb" class="img-audio" id="img_act_it_sf" onclick="alertAudio('au_act_it_sf', 'img_act_it_sf', 1, 13)">
                                                    <audio id="au_act_it_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_act_it_sf.wav">
                                                    </audio>
                                                    
                                                    <div class="dropdrown-act drowndown__fon" id="dropdrown-act-internet">
                                                        <label for="" onclick="modalExitoSoporte('INT_NORMUSER', false, false), habladorText('Permite sincronizar el usuario de acuerdo a la información de inventario')" id="btn-session-actived">Normalizar Usuario Navegación</label>
                                                        <label for="" onclick="modalExitoSoporte('Normalizar Velocidades', false, true), habladorText('Permite sincronizar las velocidades de acuerdo a la ordén')">Normalizar Velocidades</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar estado(Cliente)</label>
                                                        <label for="">CAMBIO SEGMENTO RED LAN DE ONT O MODEM</label>
                                                        <label for="" onclick="modalExitoSoporte('CAMBIO_ESTADO_REDWIFI', false, false), habladorText('Permite generar un cambio de estado de la red wifi en las plataformas')">CAMBIO ESTADO DE RED WIFI</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Apertura de puertos</label>
                                                        <label for="" onclick="modalExitoSoporte('INT_NORMUSER', false, false), habladorText('Sobrescribe los valores guardados en ACS en la ONT/CPE')">Reaprovisionar Servicio - ACS</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Reconfiguración Puerto 3</label>
                                                    </div>


                                                    <button style="background: #00A7CC;" id="btn-consul-internet">Consultas  <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_consultas_it_sf" onclick="alertAudio('au_consultas_it_sf', 'img_consultas_it_sf', 1, 12)">
                                                    <audio id="au_consultas_it_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_consultas_it_sf.wav">
                                                    </audio>

                                                    <div class="dropdrown-act" id="dropdrown-act-consulta-interne">
                                                        <label for="" id="btn-consul-ping" onclick="habladorText('El sistema de manera interna, hace un ping a una página web y brinda las estadisticas del diagnostico generadas en busca de corroborar la estabuilidad y velocidad de la conexión.')">PING</label>
                                                        <label for="" id="btn-consul-ping_lan" onclick="habladorText('Debe ingresar el URL de una página web, para que se generé un diagnostico ping con la red y así conocer las estadisticas generadas en busca de corroborar la estabuilidad y velocidad de la conexión.')">PING LAN CLIENTE</label>
                                                        <label for="" id="btn-lan" onclick="habladorText('Proporciona información sobre la red LAN')">LAN</label>
                                                        <label for="" id="btn-wan" onclick="habladorText('Proporciona información sobre la red WAN')">WAN</label>
                                                        <label for="" id="btn-equipos-con" onclick="habladorText('Proporciona información sobre los dispositivos conectados a la red')">Equipos Conectados</label>
                                                        <label for="" id="change-name-wifi" onclick="habladorText('Permite cambiar el nombre de la red (SSID), debe tener un minimo de un caracter hasta 32 caracteres')">WIFI (Red)</label>
                                                        <label for="" id="change-pass-wifi" onclick="habladorText('Permite cambiar la clave de la red, debe tener un minimo de ocho caracter hasta 63 caracteres')">WIFI (clave)</label>
                                                        <label for="" id="change-all-wifi" onclick="habladorText('Permite cambiar el nombre de la red (SSID) y clave')">WIFI (Red y clave)</label>
                                                        <label for="" id="btn-alepo" onclick="habladorText('Permite conocer información sobre la sesión establecida por cada modem. Información como La IP asociada al cliente, fecha y hora de inicio y el equipo por el se conecta')">ALEPO</label>
                                                        <label for="" id="btn-consulta-name-wifi" onclick="habladorText('Permite visualizar el nombre asociado a la red wifi del cliente')">NOMBRE DE RED WIFI</label>
                                                        <label for="" id="btn-consulta-estado-wifi" onclick="habladorText('Permite validar el estado de la red wifi')">ESTADO DE RED WIFI</label>
                                                    </div>

                                                    <button style="background: #00A7CC;"><i class="fa-solid fa-rotate" style="color: #ffffff;"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-sopo-ajustes-wifi')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                Ajustes WIFI (ONT)</h5>
                                            <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_aw_sf" onclick="alertAudio('au_aw_sf', 'img_aw_sf', 1, 14)">
                                            <audio id="au_aw_sf" controls class="audio" style="display: none;">
                                                <source type="audio/wav" src="./assets/audio/soporte/au_aw_sf.wav">
                                            </audio>
                                        </div>
                                        <div class="body-items-inf">
                                            <div class="contet hide-body con-tree-colms" id="con-sopo-ajustes-wifi">
                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>ESTADOS</th>
                                                            <th>PLATAFORMAS</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Estado WIFI</td>
                                                                <td class="dell-sem"><span id="estado-red"></span> <div class="semaforo" id="semaforo-estado"></div></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Canal</td>
                                                                <td class="dell-sem">Automático <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>SSID Visible</td>
                                                                <td class="dell-sem">Activo <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Potencia WIFI</td>
                                                                <td class="dell-sem">100 <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>DHCP Estado</td>
                                                                <td class="dell-sem">Activo <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>DHCP Lease Time (dd:HH:mm:ss)</td>
                                                                <td class="dell-sem">01:00:00:00 <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr class="row-bl">
                                                                <td>DHCP Router IP</td>
                                                                <td class="dell-sem">192.168.0.1 <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>HOSTNAME</th>
                                                            <th>IpAddress</th>
                                                            <th>MACaddress</th>
                                                            <th>SerialAP</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr>
                                                                <td>Archer_CS</td>
                                                                <td class="dell-sem" style="color: var(--orange-etb);">192.168.0.3 <img src="./assets/img/laptop.svg" alt=""></td>
                                                                <td>84-d8-1b-1e-a3-33</td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>ESTADOS</th>
                                                            <th>PLATAFORMAS</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Protocolo WIFI</td>
                                                                <td class="dell-sem">b,g,n <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Nombre Red WIFI</td>
                                                                <td class="dell-sem"><span id="Nombre-red-ont-so"></span> <div class="semaforo semaforo-co"></div></td>
                                                            </tr>

                                                            <tr class="row-bl">
                                                                <td>TKIPandAESEncryption</td>
                                                                <td class="dell-sem"><span id="encrypt-table">Encriptación WIFI</span><div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="items-actions-soporte items__actions_four" style="border-top: 0px;">
                                                    <button style="background: #FF5E00;" id="action-ont">Acciones <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_act_aw_sf" onclick="alertAudio('au_act_aw_sf', 'img_act_aw_sf', 1, 16)">
                                                    <audio id="au_act_aw_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_act_aw_sf.wav">
                                                    </audio>

                                                    <div class="dropdrown-act drowndown__fon" id="dropdrown-act-ont">
                                                        <label for="" id="change-name-ont" onclick="habladorText('Permite cambiar el nombre de la red (SSID), debe tener un minimo de un caracter hasta 32 caracteres')">Cambiar Nombre</label>
                                                        <label for="" id="change-pass-ont" onclick="habladorText('Permite cambiar la clave de la red, debe tener un minimo de ocho caracter hasta 63 caracteres')">Cambiar Contraseña</label>
                                                        <label for="" id="change-all-ont" onclick="habladorText('Permite cambiar el nombre de la red (SSID) y clave')">Cambiar Nombre y Contraseña</label>
                                                        <label for="" id="change-estado-wifi-ont" onclick="habladorText('Permite cambiar el estado wifi, debe selecionar el estado requerido en la lista desplegable')">Cambiar Estado WIFI</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Cambiar Estado de Red Visible</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar Canal</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar Potencia</label>
                                                        <label for="" id="change-encryp-ont" onclick="habladorText('Permite cambiar el tipo de encriptación, para esto es necesario que incgrese la nueva contraseña y el tipo de encriptación requerida')">Cambiar Tipo Encriptación</label>
                                                        <label for="" onclick="habladorText('Sobrescribe los valores guardados en ACS en la ONT/CPE')">Reaprovisionar Servicio - ACS</label>
                                                    </div>


                                                    <button style="background: #00A7CC;" id="btn-consul-ont">Consultas  <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_consultas_aw_sf" onclick="alertAudio('au_consultas_aw_sf', 'img_consultas_aw_sf', 1, 15)">
                                                    <audio id="au_consultas_aw_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_consultas_aw_sf.wav">
                                                    </audio>

                                                    <div class="dropdrown-act" id="dropdrown-act-consulta-ont">
                                                        <label for="">PING</label>
                                                        <label for="">PING LAN CLIENTE</label>
                                                        <label for="">LAN</label>
                                                        <label for="">WAN</label>
                                                        <label for="">Equipos Conectados</label>
                                                        <label for="">WIFI (Red)</label>
                                                        <label for="">WIFI (clave)</label>
                                                        <label for="">WIFI (Red y clave)</label>
                                                        <label for="">ALEPO</label>
                                                        <label for="">NOMBRE DE RED WIFI</label>
                                                        <label for="">ESTADO DE RED WIFI</label>
                                                    </div>

                                                    <button style="background: #00A7CC;"><i class="fa-solid fa-rotate" style="color: #ffffff;"></i></button>
                                                </div>

                                                <div class="con-divisor-item con-tree-colms" style="grid-column: 1/4;">
                                                    <h3>Ajustes WIFI 5.0</h3>
                                                </div>

                                                    <div class="con-table">
                                                        <table class="table-general table-sopor">
                                                            <tr>
                                                                <th>ESTADOS</th>
                                                                <th>PLATAFORMAS</th>
                                                            </tr>
                                                            <tbody>
                                                                <tr class="row-bl">
                                                                    <td>Estado WIFI (5.0)</td>
                                                                    <td class="dell-sem">Activo<div class="semaforo semaforo-co"></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Canal (5.0)</td>
                                                                    <td class="dell-sem">Automatico<div class="semaforo semaforo-co"></div></td>
                                                                </tr>
                                                                <tr class="row-bl">
                                                                    <td>SSID Visible (5.0)</td>
                                                                    <td class="dell-sem">Activo<div class="semaforo semaforo-co"></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Potencia WIFI (5.0)</td>
                                                                    <td class="dell-sem">100<div class="semaforo semaforo-co"></div></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="con-table">
                                                        <table class="table-general table-sopor">
                                                            <tr>
                                                                <th>ESTADOS</th>
                                                                <th>PLATAFORMAS</th>
                                                            </tr>
                                                            <tbody>
                                                                <tr class="row-bl">
                                                                    <td>Protocolo WIFI (5.0)</td>
                                                                    <td class="dell-sem">a.n.aC<div class="semaforo semaforo-co"></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nombre Red WIFI (5.0)</td>
                                                                    <td class="dell-sem">Rodriguez Munoz 5GH ETB<div class="semaforo semaforo-co"></div></td>
                                                                </tr>
                                                                <tr class="row-bl">
                                                                    <td>Encriptación WIFI (5.0)</td>
                                                                    <td class="dell-sem">TKIPandAESEncryption<div class="semaforo semaforo-co"></div></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="items-actions-soporte" style="border-top: 0px;">
                                                        <button style="background: #FF5E00;" id="action-ont">Acciones <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                        <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_cin_act_aw_sf" onclick="alertAudio('au_cin_act_aw_sf', 'img_cin_act_aw_sf', 1, 16)">
                                                        <audio id="au_cin_act_aw_sf" controls class="audio" style="display: none;">
                                                            <source type="audio/wav" src="./assets/audio/soporte/au_act_aw_sf.wav">
                                                        </audio>

                                                        <div class="dropdrown-act drowndown__fon" id="dropdrown-act-ont">
                                                            <label for="" id="change-name-ont" onclick="habladorText('Permite cambiar el nombre de la red (SSID), debe tener un minimo de un caracter hasta 32 caracteres')">Cambiar Nombre</label>
                                                            <label for="" id="change-pass-ont" onclick="habladorText('Permite cambiar la clave de la red, debe tener un minimo de ocho caracter hasta 63 caracteres')">Cambiar Contraseña</label>
                                                            <label for="" id="change-all-ont" onclick="habladorText('Permite cambiar el nombre de la red (SSID) y clave')">Cambiar Nombre y Contraseña</label>
                                                            <label for="" id="change-estado-wifi-ont" onclick="habladorText('Permite cambiar el estado wifi, debe selecionar el estado requerido en la lista desplegable')">Cambiar Estado WIFI</label>
                                                            <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Cambiar Estado de Red Visible</label>
                                                            <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar Canal</label>
                                                            <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar Potencia</label>
                                                            <label for="" id="change-encryp-ont" onclick="habladorText('Permite cambiar el tipo de encriptación, para esto es necesario que incgrese la nueva contraseña y el tipo de encriptación requerida')">Cambiar Tipo Encriptación</label>
                                                            <label for="" onclick="habladorText('Sobrescribe los valores guardados en ACS en la ONT/CPE')">Reaprovisionar Servicio - ACS</label>
                                                        </div>

                                                        <div class="dropdrown-act" id="dropdrown-act-consulta-ont">
                                                            <label for="">PING</label>
                                                            <label for="">PING LAN CLIENTE</label>
                                                            <label for="">LAN</label>
                                                            <label for="">WAN</label>
                                                            <label for="">Equipos Conectados</label>
                                                            <label for="">WIFI (Red)</label>
                                                            <label for="">WIFI (clave)</label>
                                                            <label for="">WIFI (Red y clave)</label>
                                                            <label for="">ALEPO</label>
                                                            <label for="">NOMBRE DE RED WIFI</label>
                                                            <label for="">ESTADO DE RED WIFI</label>
                                                        </div>

                                                        <button style="background: #00A7CC;"><i class="fa-solid fa-rotate" style="color: #ffffff;"></i></button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-sopo-telefo')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                LINEA TELEFONICA</h5>
                                            <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_lineaT_sf" onclick="alertAudio('au_lineaT_sf', 'img_lineaT_sf', 1, 6)">
                                            <audio id="au_lineaT_sf" controls class="audio" style="display: none;">
                                                <source type="audio/wav" src="./assets/audio/soporte/au_lineaT_sf.mp3">
                                            </audio>
                                        </div>
                                        <div class="body-items-inf">
                                            <div class="contet hide-body con-tree-colms" id="con-sopo-telefo">

                                                <div class="con-cards-soporte" style="grid-column: 1/4;">
                                                    <div class="cards-soporte">
                                                        <h2>Telefono</h2>
                                                        <p>576017647268</p>
                                                    </div>
                                            
                                                    <div class="cards-soporte">
                                                        <h2>ID servicios MMS</h2>
                                                        <p>SR-35728454</p>
                                                    </div>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>SUPLEMENTARIOS</th>
                                                            <th>PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>
                                                                    Coferencia entre Tres;

                                                                    Contestador Virtual;

                                                                    Identificador de Llamadas

                                                                    Idenificador de Segunda Llamada;

                                                                    Llamada en Espera;

                                                                    Marcación Abreviada

                                                                    Marcación Redial
                                                                </td>
                                                                <td class="dell-sem" style="min-width: 250px;">
                                                                    Código Secreto;

                                                                    Conferencia entre Tres;

                                                                    Contestador Virtual;

                                                                    Identificador de Llamadas;

                                                                    Identificador de Segunda Llamada;

                                                                    Llamada en Espera;

                                                                    Marcación Abreviada;

                                                                    Marcación Redial

                                                                    <div class="semaforo semaforo-error" id="semaforo-serv-secundarios"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Transferencia de Llamada</td>
                                                                <td class="dell-sem">Transferencia de Llamada <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>ESTADOS</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMAS</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Estado No Tel</td>
                                                                <td>Activo</td>
                                                                <td class="dell-sem">Normal, Sin Bloqueos <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Numero Tel Programado en Modem</td>
                                                                <td>+576017647268</td>
                                                                <td class="dell-sem">+576017647268 <div class="semaforo semaforo-error" id="semaforo-tel-modem"></div></td>
                                                            </tr>

                                                            <tr class="row-bl">
                                                                <td>Registro linea</td>
                                                                <td>-</td>
                                                                <td class="dell-sem">Up <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="items-actions-soporte items__actions_four">
                                                    <button style="background: #FF5E00;" id="action-linea-t">Acciones <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_act_lt_sf" onclick="alertAudio('au_act_lt_sf', 'img_act_lt_sf', 1, 8)">
                                                    <audio id="au_act_lt_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_act_lt_sf.mp3">
                                                    </audio>
                                                    <div class="dropdrown-act drowndown__fon" id="dropdrown-act-linea-t">
                                                        <label for="" onclick="modalExitoSoporte(' Normalizar Servicios Suplementarios', false, true), habladorText('Esto ejecutará un proceso interno, Normalizará todos los servicios, por consiguiente todos los semaforos serán refrescados.')" id="btn-norm-se-secun">Normalizar Servicios Suplementarios</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar CategorÃa Cliente</label>
                                                        <label for=""  onclick="modalExitoSoporte('NORMALIZAR_LINEA_SIP', false, false), habladorText('Normalizará el número telefonico que se encuentra configurado según el Modem')" id="btn-norm-tel-modem">Normalizar No. Tel Configurado en Modem</label>
                                                        <label for=""  id="btn-reset-codigo" onclick="habladorText('Esta acción reiniciará el código secreto, para esto es necesario que ingrese el nuevo código en el formulario actual')">Reset CÃ³digo Secreto</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar la Linea Telefónica con bloqueo</label>
                                                        <label for="" onclick="modalExitoSoporte('REAPROVISIONAR_SERVICIOS_ACS', false, false), habladorText('Esto ejecutará un proceso interno, Normalizará todos los servicios ACS, por consiguiente todos los semaforos serán refrescados.')">Reaprovisionar Servicio - ACS</label>
                                                    </div>

                                                    <button style="background: #00A7CC;" id="btn-consul-infra">Consultas  <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_consultas_lt_sf" onclick="alertAudio('au_consultas_lt_sf', 'img_consultas_lt_sf', 1, 7)">
                                                    <audio id="au_consultas_lt_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/soporte/au_consultas_lt_sf.mp3">
                                                    </audio>
                                                    <div class="dropdrown-act" id="dropdrown-act-consulta">
                                                        <label for="" id="btn-validar-serv" onclick="habladorText('Proporciona información sobre el tiempo de respuesta del servicio.')">Validar Conectividad</label>
                                                        <label for="" id="btn-transferencia" onclick="habladorText('Proporciona información sobre el número de teléfono')">TRANSFERENCIA INMEDIATA</label>
                                                    </div>

                                                    <button style="background: #00A7CC;"><i class="fa-solid fa-rotate" style="color: #ffffff;"></i></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-sopo-tv')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                TELEVISIÓN</h5>
                                            <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_tv_sf" onclick="alertAudio('au_tv_sf', 'img_tv_sf', 5, 9)">
                                            <audio id="au_tv_sf" controls class="audio" style="display: none;">
                                                <source type="audio/wav" src="./assets/audio/Paso 1/643358c519b8e527766907_JCRbpcWn.mp3">
                                            </audio>

                                        </div>
                                        <div class="body-items-inf">
                                            <div class="contet hide-body con-tree-colms" id="con-sopo-tv">
                                                <div class="con-cards-soporte" style="grid-column: 1/4;">
                                                    <div class="cards-soporte">
                                                        <h2>Subscriber ID</h2>
                                                        <p>531271</p>
                                                    </div>
                
                                                    <div class="cards-soporte">
                                                        <h2>ID servicios MSS</h2>
                                                        <p>1-4T307W</p>
                                                    </div>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>ESTADO</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Estado</td>
                                                                <td>Activo</td>
                                                                <td class="dell-sem"><span id="estado-tv">Suspendida</span><div class="semaforo semaforo-error" id="semaforo-estado-tv"></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Plan</td>
                                                                <td>PLAN BASICO</td>
                                                                <td class="dell-sem">PLAN BASICO <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>ADICIONALES</th>
                                                            <th>INVENTARIO</th>
                                                            <th>PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>Canales</td>
                                                                <td>PREMIUM HBO</td>
                                                                <td class="dell-sem">PREMIUM HBO <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Servicios</td>
                                                                <td>Grabador Virtual;<br>La TV de Ayer; <br>Pausa en Vivo </td>
                                                                <td class="dell-sem">Grabador Virtual; <br> La TV de Ayer; <br> Pausa en Vivo <div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="con-table">
                                                    <table class="table-general table-sopor">
                                                        <tr>
                                                            <th>STB</th>
                                                            <th>SERIAL</th>
                                                            <th>MAC <br> INVETARIO</th>
                                                            <th>MAC <br> PLATAFORMA</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr class="row-bl">
                                                                <td>1- 4T309M; 1- 4T309Z</td>
                                                                <td>6534**234212; 6534**234217</td>
                                                                <td>OC565C0392E4; 0C565C0392E9</td>
                                                                <td class="dell-sem"><br>0C565C0392E4;<br> OC565C0392E9<br><br><div class="semaforo semaforo-co"></div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="items-actions-soporte seven__actions">
                                                    <button style="background: #00C2DF;" id="btn-consul-equipos" onclick="habladorText('Muestra algunas imágenes sobre la ONT instalada')">Imagen del Equipo</button>
                                                    <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_img_ont_sf" onclick="alertAudio('au_img_ont_sf', 'img_img_ont_sf', 5, 4)">
                                                    <audio id="au_img_ont_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/Paso 1/643358c519b8e527766907_JCRbpcWn.mp3">
                                                    </audio>
                                                    <span></span>

                                                    <button style="background: #FF5E00;" id="action-tv">Acciones <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_act_sf" onclick="alertAudio('Au_act_sf', 'img_act_sf', 5, 10)">
                                                    <audio id="Au_act_sf" controls class="audio" style="display: none;">
                                                        <source type="audio/wav" src="./assets/audio/Paso 1/643358c519b8e527766907_JCRbpcWn.mp3">
                                                    </audio>
                                                    <div class="dropdrown-act drowndown__fon" id="dropdrown-act-tv">
                                                        <label for="" id="btn-norm-subs-id" onclick="habladorText('Permite sincronizar el estado subscriber ID de acuerdo con la información de inventario')">Normalizar Estado Subscriber ID</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar MAC DECO</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar Canales Adicionales</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar Servicios Adicionales</label>
                                                        <label for="" onclick="modalExitoSoporte('Reset Clave Control Parental', false, true), habladorText('Genera un reset a la clave y deja los ultomos cuatro numeros del subscriber ID')">Reset Clave Control Parental</label>
                                                        <label for="" class="label-disa" onclick="habladorText('Esta función no esta disponible para esta orden')">Normalizar Plan TV</label>
                                                        <label for="" onclick="modalExitoSoporte('Reaprovisionar Servicios-ACS', false, true), habladorText('Sobrescribe los valores guardados en ACS en la ONT/CPE')">Reaprovisionar Servicios-ACS</label>
                                                    </div>
                                                    <button style="background: #00A7CC;" id="btn-consul-ont">Consultas  <i class="fa-solid fa-sort-down" style="color: #ffffff;"></i></button>
                                                    <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio">
                                                    
                                                    <div class="dropdrown-act" id="dropdrown-act-consulta-ont">
                                                        <label for="">PING</label>
                                                        <label for="">PING LAN CLIENTE</label>
                                                        <label for="">LAN</label>
                                                        <label for="">WAN</label>
                                                        <label for="">Equipos Conectados</label>
                                                        <label for="">WIFI (Red)</label>
                                                        <label for="">WIFI (clave)</label>
                                                        <label for="">WIFI (Red y clave)</label>
                                                        <label for="">ALEPO</label>
                                                        <label for="">NOMBRE DE RED WIFI</label>
                                                        <label for="">ESTADO DE RED WIFI</label>
                                                    </div>
                                                    
                                                    <button style="background: #00A7CC;"><i class="fa-solid fa-rotate" style="color: #ffffff;"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="con-dos-btn-retor">
                                        <button class="btn_clasic btn_orage_bg">No Solucionado</button>
                                        <button class="btn_clasic" onclick="modalExitoSoporteSolucionado();habladorText()">Solucionado</button>
                                    </div>

                                    <div class="items-info items-sopor">
                                        <div class="cabecera">
                                            <h5 onclick="itemInfoSoporte('con-logs-sp')">
                                                <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                LOG del sistema</h5>
                                            <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_tv_sf" onclick="alertAudio('au_tv_sf', 'img_tv_sf', 5, 9)">
                                            <audio id="au_tv_sf" controls class="audio" style="display: none;">
                                                <source type="audio/wav" src="./assets/audio/Paso 1/643358c519b8e527766907_JCRbpcWn.mp3">
                                            </audio>

                                        </div>
                                        <div class="body-items-inf">
                                            <div class="contet " id="con-logs-sp">
                                                <div class="con-table">
                                                    <table class="table-general table-sopor table-sopor-logs">
                                                        <tr>
                                                            <th style="max-width: 30px;">Fecha Inicio</th>
                                                            <th style="max-width: 40px;">Fecha Fin</th>
                                                            <th style="width: 200px;">Comando</th>
                                                            <th style="width: 180px;">Descripción</th>
                                                            <th style="width: 80px;">Tipo Comando</th>
                                                            <th>Respuesta</th>
                                                        </tr>
                                                        <tbody id="tbody-logs">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Temp -->
                                    <div class="con-consulta" id="modal-consulta-vecinos">
                                        <div class="header-cons"> <h3>Estados de Equipos en la Tarjeta </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-vecino"></i></div>
                                        <div class="body-cons">
                                            <div class="con-filt">
                                                <label for="">Mostrar</label>
                                                <select name="" id="">
                                                    <option value="">10</option>
                                                    <option value="">50</option>
                                                    <option value="">100</option>
                                                    <option value="">500</option>
                                                </select>
                                                <label for="">Registros</label>
                                                <label for="">Buscar:</label>
                                                <input type="text" name="" id="">
                                            </div>
                                            <div class="con-table">
                                                <table class="table-general table-sopor">
                                                    <tr>
                                                        <th>Semáforo</th>
                                                        <th>Estado</th>
                                                        <th>Potencia</th>
                                                        <th>Numero <br> Orden</th>
                                                        <th>Telefono</th>
                                                        <th>Marca <br> Equipo <br> ONT</th>
                                                        <th>Dirección Instalación</th>
                                                        <th>Pecho <br> A. ??</th>
                                                        <th>OLFID</th>
                                                        <th>PONID</th>
                                                        <th>ONUID</th>
                                                        <th>objectName</th>
                                                        <th>Propietario</th>
                                                        <th>NombreCliente</th>
                                                    </tr>
                                                    <tbody>
                                                    <tr class="row-bl">
                                                            <td><div class="semaforo semaforo-co"></div></td>
                                                            <td>Activo</td>
                                                            <td>-19.678</td>
                                                            <td></td>
                                                            <td>6014523019</td>
                                                            <td>ALCATEL</td>
                                                            <td>KR 738 5 05</td>
                                                            <td>2018/03/31</td>
                                                            <td>10.241.250.5</td>
                                                            <td>1-1-3-4</td>
                                                            <td>ALCLFA47F5C2</td>
                                                            <td>BOMUAL7360043- <br> 1-3-4-17</td>
                                                            <td></td>
                                                            <td>MIGUEL ABOON <br> ARDILA QUINCHE</td>
                                                    </tr>
                                                    <tr>
                                                            <td><div class="semaforo semaforo-co"></div></td>
                                                            <td>Activo</td>
                                                            <td>-18.186</td>
                                                            <td></td>
                                                            <td>6012736331</td>
                                                            <td>ALCATEL</td>
                                                            <td>KR 738 5 29</td>
                                                            <td>2018/11/22</td>
                                                            <td>10.241.250.5</td>
                                                            <td>1-1-3-4</td>
                                                            <td>ALCLFA47F5C2</td>
                                                            <td>BOMUAL736004:1 <br> 1-3-4-7</td>
                                                            <td></td>
                                                            <td>ADELA GARNICA <br> SILVA</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="con-consulta" id="modal-consulta-equipos">
                                        <div class="header-cons"> <h3>Características del equipo </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-caracte-equipo"></i></div>
                                        <div class="body-cons">
                                            <img src="./assets/img/modemUno.png" alt="">
                                            <img src="./assets/img/modemDos.png" alt="">
                                            <img src="./assets/img/modemTres.png" alt="">
                                            <img src="./assets/img/modemCuatro.png" alt="">
                                        </div>
                                    </div>

                                    <div class="con-consulta" id="modal-consulta-pqr">
                                        <div class="header-cons"> <h3>PQR </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-caracte-pqr" onclick="AbrirModalConsulta('modal-consulta-pqr')"></i></div>
                                        <div class="body-cons">
                                            <div class="con-table">
                                                <table class="table-general table-sopor">
                                                    <tr>
                                                        <th>Número</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Creación</th>
                                                        <th>Sintoma</th>
                                                        <th>Causal</th>
                                                        <th>Motivo</th>
                                                        <th>CUN</th>
                                                        <th>Gestión</th>
                                                        <th>Solución</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr>
                                                            <td>MDM-PQR 38675280</td>
                                                            <td>Enviado a Segundo Nivel</td>
                                                            <td>2023-05- 07T10:47:23.0750000Z</td>
                                                            <td>ONT NO ENCIENDE / FALLA</td>
                                                            <td>FALLA EN OPE</td>
                                                            <td>FALLA TÉCNICA</td>
                                                            <td>4347230001111374</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="con-consulta" id="modal-consulta-sus">
                                        <div class="header-cons"> <h3>Suspensiones y Reconexiones </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-caracte-pqr" onclick="AbrirModalConsulta('modal-consulta-sus')"></i></div>
                                        <div class="body-cons">
                                            <div class="con-table">
                                                <table class="table-general table-sopor">
                                                    <tr>
                                                        <th>Fuente</th>
                                                        <th>Fecha Ejecucion (MES/DIA/AÑO)</th>
                                                        <th>Tramite</th>
                                                        <th>Numero Asociado </th>
                                                        <th>Estado del Tramite </th>
                                                        <th>Transaccion Id</th>
                                                        <th>Fecha Transaccion</th>
                                                    </tr>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="con-consulta" id="modal-consulta-tramites">
                                        <div class="header-cons"> <h3>Trámites </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-caracte-pqr" onclick="AbrirModalConsulta('modal-consulta-tramites')"></i></div>
                                        <div class="body-cons">
                                            <div class="con-table">
                                                <table class="table-general table-sopor">
                                                    <tr>
                                                        <th>Front</th>
                                                        <th>Fecha Ejecucion (MES/DIA/AÑO)</th>
                                                        <th>CUN</th>
                                                        <th>Número Conexión</th>
                                                        <th>Tipo Orden  </th>
                                                        <th>SubTipo Orden</th>
                                                        <th>Estado Orden</th>
                                                        <th>Reincidente</th>
                                                    </tr>
                                                    <tbody>
                                                        <td>1-DPORDKD</td>
                                                        <td>2020-05-27 05:29:00</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>VTA</td>
                                                        <td></td>
                                                        <td>Validación Cobertura</td>
                                                        <td>No</td>
                                                        <!-- <td></td> -->
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="con-consulta" id="modal-consulta-promos">
                                        <div class="header-cons"> <h3>Promociones </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-caracte-pqr" onclick="AbrirModalConsulta('modal-consulta-promos')"></i></div>
                                        <div class="body-cons">
                                            <div class="con-table">
                                                <table class="table-general table-sopor">
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Descripción</th>
                                                        <th>Vigencia</th>
                                                        <th>Fecha Asignación</th>
                                                        <th>Estado</th>
                                                    </tr>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="con-consulta" id="modal-consulta-pagos">
                                        <div class="header-cons"> <h3>Pagos </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-caracte-pqr" onclick="AbrirModalConsulta('modal-consulta-pagos')"></i></div>
                                        <div class="body-cons">
                                            <div class="con-table">
                                                <table class="table-general table-sopor">
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Descripción</th>
                                                        <th>Vigencia</th>
                                                        <th>Fecha Asignación</th>
                                                        <th>Estado</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr>
                                                            <td>280180500</td>
                                                            <td>2023-03-25 14:43:48</td>
                                                            <td>42950</td>
                                                            <td>Banco Davivienda</td>
                                                            <td>2023-03-25 14:43:48</td>
                                                        </tr>
                                                        <tr>
                                                            <td>281512479</td>
                                                            <td>2020-04-25 14:43:48</td>
                                                            <td>59900</td>
                                                            <td>Banco Davivienda</td>
                                                            <td>2023-04-27 14:00:48</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="con-consulta" id="modal-consulta-log">
                                        <div class="header-cons"> <h3>LOG del sistema </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-caracte-pqr" onclick="modalLog('modal-consulta-log')"></i></div>
                                        <div class="body-cons">
                                            <div class="items-info items-sopor">
                                                <div class="cabecera">
                                                    <h5 onclick="itemInfoSoporte('con-sopo-log')">
                                                        <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                                                        LOG del sistema </h5>

                                                </div>
                                                <div class="body-items-inf">
                                                    <div class="contet hide-body" id="con-sopo-log">
                                                        <div class="con-table">
                                                            <table class="table-general table-sopor">
                                                                <tr>
                                                                    <th>Fecha Inicio</th>
                                                                    <th>Fecha Fin</th>
                                                                    <th>Comando</th>
                                                                    <th>Descripcion</th>
                                                                    <th>Tipo Comando</th>
                                                                    <th>Respuesta</th>
                                                                </tr>

                                                                <tbody id="tbody-log">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- Temp -->
                                </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
                <!-- Items -->
        </div>
    </div>

    <div class="alert-flotante" id="alert-flotante">
        <div class="etb-flotant etb-flotant-login" id="etb-flotant">
            <img src="./assets/img/ETB.svg" alt="">
        </div>
        <div class="mensaje-parlante msg-parl-log" id="mensaje-parlante">
            <p id="text-msg-hab">
                <div class="lds-ellipsis" id="wait-text"><div></div><div></div><div></div><div></div></div>
            </p>
        </div>
        <div class="con-close-alert" onclick="ocultarHablador()">
            <img src="./assets/img/cross_small.svg" alt="">
        </div>
    </div>

    <div class="modal fade modales-soporte" tabindex="-1" id="modal-reapro-serv" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span id="tittle-main-exit">ACC_BTN_</span><span id="titulo-alerta-corr"></span></h5>
                    </div>
                    <div class="modal-body">
                        <h3>Operación realizada exitosamente</h3>
                        <br>
                        <p id="contenido-alerta-cor"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
    </div>
    <div class="content-info-sol" id="content-soluic">
        <div class="info-u">
                <label for="">Cliente</label>
                <label for="">Número de Documento</label>
                <p><?php echo $cliente ?></p>
                <p><?php echo $documentoCiente ?></p>
                
        </div>
        <form action="./generatepqr.php" method="post" id="form_pqr_solu">
            <input type="number" value="<?php echo $documentoCiente ?>" style="display: none;" name="clientdocu">

            <div class="info-u info-repor">
                <label for="">Solución</label>
            <textarea name="text-solu" id="" cols="30" rows="10" style="grid-column: 1/4;"></textarea>
            
            <div class="con-btn-adj" style="grid-column: 4/5; grid-row: 1/3;">
                <label for="btn-adj">Adjunto Solucion</label>
                <input type="file" name="btn-adj" id="" style="display: none;">
            </div>
            
            <label for="" style="grid-column: 1/3;">Medio de notificación</label>
            <select name="optagenda" id="" style="grid-row: 4/5; grid-column: 1/3;">
                <option value="">CORREO ELECTRONICO</option>
                <option value="">CORREO ORDINARIO</option>
                <option value="">PRESENCIAL</option>
                <option value="">TELEFONICO</option>
                <option value="">VERBAL / CALL CENTER</option>
                <option value="">VIRTUAL</option>
                <option value="">WHATSAPP</option>
            </select>

            <label for="" style="grid-column: 3/5;">Email / Dirección/ Teléfono</label>
            <input type="text" name="val_agenda" id="val_agenda" style="grid-column: 3/5;">
        </div>
        </form>
        <div class="table-solui">
            <table class="table-general table-sopor" style="width: 400px;">
                    <tr>
                        <th>Semaforo</th>
                        <th>PLATINO <br> Recurrente: Si</th>
                        <th>Cantidad</th>
                    </tr>
                    <tr class="row-bl">
                        <td><div class="semaforo semaforo-error"></div></td>
                        <td>PQR NIVEL 1</td>
                        <td>2</td>
                    </tr>
            </table>
            
        </div>
    </div>

    <div class="modal fade modales-soporte" tabindex="-1" id="modal-exito-solucionado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-exito-s">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span id="tittle-main-exit-s">ACTUALIZACIÓN DE LA VISITA</span><span id="titulo-alerta-corr-s"></span></h5>
                    </div>
                    <div class="modal-body">
                        <h3>Operación realizada exitosamente</h3>
                        <br>
                        <p id="contenido-alerta-cor-s">Se actualizará la información de la visita</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_exito">Aceptar</button>
                    </div>
                </div>
            </div>
    </div>

    
    <div class="modal modal-success-sim" tabindex="-1" id="modal-info-soluci">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Información</h5>
                    </div>
                    <div class="modal-body">
                        <p>Debe diligenciar los campos de medio de notificación</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-modal-ps4error">ACEPTAR</button>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade modales-soporte" tabindex="-1" id="modal-serv-ont-act" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Campos de entrada para <b id="tittle-ont-sop"></b></h5>
                    </div>
                    <div class="modal-body" id="con-modal-ont-sopo">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-ont-sopo btn btn-primary">Aceptar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="flujo-btn" class="btn-flot">Flujo</div>
        
                <!-- Modal flujo -->
        <div class="modal fade" id="modal-flujo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" id="modal-dialog-flujo">
              <div class="modal-content">
                <div class="modal-header" id="btn-close-flujo">
                  <h1 class="modal-title fs-5 header-modal-flujo" id="staticBackdropLabel" style="color: while;">Flujo <div><i class="fa-regular fa-hand-pointer" style="color: #ffffff;"></i> Click para cerrar</div></h1>
                </div>
                <div class="modal-body">
                  <iframe src="https://etb--devflow.sandbox.my.salesforce-sites.com/FTTH2" frameborder="0" class="recomendador"></iframe>
                </div>
              </div>
            </div>
          </div>
        <!-- Modal flujo -->

    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./bootstrap/typed.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/soporte.js"></script>
</body>
</html>