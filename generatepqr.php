<?php 
    include('seguridad.php');
    include('DB/db.php');
    
    $cliente = $_POST['clientdocu'];
    $sql = "select tipo_documento, celular, usuario.direccion, email, documento, nombre, apellido, cuenta.estado, num_facturacion, telefono_fijo  from usuario
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
    <link rel="stylesheet" href="./css/sol.css">

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
                    <div class="info-u info-repor">
                        <label for="">Solución</label>
                        <textarea name="text-solu" id="" cols="30" rows="10" style="grid-column: 1/4;" ><?php echo $_POST['text-solu']  ?></textarea>
                    
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
                        <input type="text" name="val_agenda" id="val_agenda" style="grid-column: 3/5;" value="<?php echo $_POST['val_agenda'] ?>">
                    </div>
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
    <div class="modal modal-success-sim" tabindex="-1" id="modal-exito-total">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Información</h5>
                    </div>
                    <div class="modal-body">
                        <p>Operación realizada con exito</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-modal-ps4error">ACEPTAR</button>
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

    <div class="con-consulta" id="modal-consulta-vecinos">
        <div class="header-cons"> <h3>Creando PQR: MDM-PQR-38822619 </h3> <i class="fa-solid fa-xmark btns-close-sopo" id="close-vecino"></i></div>
        <div class="body-cons">
            <div class="con-filt">
                <label for="">Buscar:</label>
                <input type="text" name="" id="">
            </div>
            <div class="con-table">
                <table class="table-general table-sopor">
                    <tr>
                        <th>Producto</th>
                        <th>Codigo producto servicio</th>
                        <th>ID Servicio</th>
                        <th>Servicio</th>
                        <th>Numero conexión</th>
                        <th>Estado</th>
                        <th>Tecnologia</th>
                        <th>Dir. Instatación</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>3PLAY 30M SILVER 1/PAQUETE</td>
                            <td></td>
                            <td>1-KBZWXLD</td>
                            <td>3PLAY 30M SILVER 1</td>
                            <td>6013224631</td>
                            <td>Activo</td>
                            <td>FO</td>
                            <td>CL 55 71 18 AP 201</td>
                        </tr>
                        <tr>
                            <td>EQUIPO MOVIL (LTE)</td>
                            <td>634</td>
                            <td>1-19CUABN</td>
                            <td></td>
                            <td>3057042800</td>
                            <td>Activo</td>
                            <td>LTE</td>
                            <td>KR 60 3 55 AP 406</td>
                        </tr>
                        <tr>
                            <td>EQUIPO MOVIL (LTE)/</td>
                            <td>757</td>
                            <td>1-3CXQODR</td>
                            <td></td>
                            <td>3057010055</td>
                            <td>Activo</td>
                            <td>LTE</td>
                            <td>CL 62 13 21 LC 153</td>
                        </tr>
                        <tr>
                            <td>INTERNET/INTERNET</td>
                            <td>6DQS-BCW6Q</td>
                            <td>1-E34JGP1</td>
                            <td></td>
                            <td>6012622259</td>
                            <td>Inactivo</td>
                            <td>FO</td>
                            <td>KR 60 3 55 AP 406</td>
                        </tr>
                        <tr>
                            <td>INTERNET/INTERNET</td>
                            <td></td>
                            <td>1-KO031GK</td>
                            <td>3PLAY 30M SILVER 1</td>
                            <td>6013224631</td>
                            <td>Activo</td>
                            <td>FO</td>
                            <td>CL 55 71 15 AP 201</td>
                        </tr>
                        <tr>
                            <td>IPTV/TELEVISION</td>
                            <td>1-6384R</td>
                            <td>1-E143GKO</td>
                            <td></td>
                            <td>6012622259</td>
                            <td>Inactivo</td>
                            <td>FO</td>
                            <td>KR. 60 3 55 AP 406</td>
                        </tr>
                        <tr>
                            <td>LINEA TELEFONICA/LINEA BASICA </td>
                            <td></td>
                            <td>1-KC031GP</td>
                            <td>3PLAY 30M SILVER</td>
                            <td>6013224631</td>
                            <td>Activo</td>
                            <td>FO</td>
                            <td>CL 55 71 18 AP 201</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="conform">
                <form action="" method="post">
                    <input type="number" value="<?php echo $documentoCiente ?>" style="display: none;" name="clientdocu">
                    <textarea name="text-solu" id="" cols="30" rows="10" style="display: none;" ><?php echo $_POST['text-solu']  ?></textarea>
                    <input type="text" name="val_agenda" id="val_agenda" style="display: none;" value="<?php echo $_POST['val_agenda'] ?>">
                    <input type="text" value="1" name="user_env" style="display: none;">

                    <label for="">Clase</label>
                    <select name="" id="" required>
                        <option value="">Seleccione</option>
                        <option value="ASEGURAMIENTO CANALES">ASEGURAMIENTO CANALES</option>
                        <option value="PETICIÓN">PETICIÓN</option>
                        <option value="QUEJA">QUEJA</option>
                        <option value="RECURSOS">RECURSOS</option>
                        <option value="RESOLUCIÓN">RESOLUCIÓN</option>
                        <option value="SOLICITUDES IAS">SOLICITUDES IAS</option>
                    </select>

                    <label for="">Motivo</label>
                    <select name="" id="" required>
                        <option value="">Seleccione</option>
                        <option value="FACTURA">FACTURA</option>
                        <option value="FALLA TECNICA">FALLA TECNICA</option>
                        <option value="INFORMACION Y/O DOCUMENTACIÓN">INFORMACION Y/O DOCUMENTACIÓN</option>
                        <option value="PREVENTIVO BACK">PREVENTIVO BACK</option>
                        <option value="RECLAMO INTERNO">RECLAMO INTERNO</option>
                        <option value="TRÁMITES CON AGENDAMIENTO">TRÁMITES CON AGENDAMIENTO</option>
                        <option value="TRÁMITES SIN AGENDAMIENTO">TRÁMITES SIN AGENDAMIENTO</option>
                    </select>

                    <label for="">Producto</label>
                    <select name="" id="" required>
                        <option value="">Seleccione</option>
                        <option value="TELEFONIA MOVIL (LTB)">TELEFONIA MOVIL (LTB)</option>
                        <option value="DATOS MOVILES">DATOS MOVILES</option>
                        <option value="INTERNET">INTERNET</option>
                        <option value="TELEVISION">TELEVISION</option>
                        <option value="PAQUETE">PAQUETE</option>
                        <option value="LINEA BASICA">LINEA BASICA</option>
                    </select>

                    <label for="">Causal</label>
                    <select name="" id="" required>
                        <option value="">Seleccione</option>
                        <option value="">APERTURA DE PUERTOS</option>
                        <option value="">CAMBIO CLAVE WIFI Y NOMBRE WIFI</option>
                        <option value="">CAMBIO DE CLAVE WIFI</option>
                        <option value="">CAMBIO NOMBRE RED</option>
                        <option value="">INGRESO TRAMITE PORTAL WEB</option>
                        <option value="">MODIFICA DHCP</option>
                    </select>

                    <label for="">Sintoma</label>
                    <select name="" id="">
                        <option value="">Seleccione</option>
                    </select>

                    <label for="">Descripción</label>
                    <textarea name="" id="" cols="30" rows="10" class="desc_tex" required></textarea>

                    <div class="con-soli">
                        <label for="">Solicitante</label>
                        <select name="" id="solicitante" required>
                        </select>
                        <button class="btn_sol" type="button" id="btn_soli"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="con__contacto hide_bo" id="con_solicitant">
                        <div class="con-filt">
                            <label for="">Buscar:</label>
                            <input type="text" name="" id="">
                        </div>
                        <div class="con-table">
                            <table class="table-general table-sopor">
                                <tr>
                                    <th>Solicitante</th>
                                    <th>Número Documento</th>
                                    <th>Tipo Documento</th>
                                    <th>Telefono solicitante</th>
                                    <th>Celular</th>
                                    <th>Email</th>
                                    <th>Dirección</th>
                                    <th>Accion</th>
                                </tr>
                                <tbody>
                                    <tr class="row-bl">
                                        <?php
                                            foreach($datosCliente as $row){
                                                ?>
                                                    <td data-name="<?php echo $row['nombre'] . ' ' . $row['apellido'] ?>" id="tdname"><?php echo $row['nombre'] . ' ' . $row['apellido'] ?></td>
                                                    <td><?php echo $row['documento'] ?></td>
                                                    <td><?php echo $row['tipo_documento'] ?></td>
                                                    <td><?php echo $row['telefono_fijo'] ?></td>
                                                    <td><?php echo $row['celular'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['direccion'] ?></td>
                                                    <td><button type="button" class="btn_edit_s" id="btn_edit_s">Editar</button></td>
                                                <?php
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="con-btn-sub">
                        <button class="btn_clasic">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./bootstrap/typed.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/solucionado.js"></script>

    <?php
        if(!isset($_POST['user_env'])){
            ?>  
            <script>
                $( document ).ready(function() {
                    $('#modal-consulta-vecinos').css('display', 'grid');
                });
            </script>
            <?php
        }else if($_POST['user_env'] != 1){
            ?>  
            <script>
                $( document ).ready(function() {
                    $('#modal-consulta-vecinos').css('display', 'grid');
                });
            </script>
            <?php
        }else{
            ?>  
            <script>
                $( document ).ready(function() {
                    $('#modal-exito-total').modal('toggle')
                });
            </script>
            <?php
        }
        ?>
</body>
</html>