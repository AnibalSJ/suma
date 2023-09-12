<?php 
    include('seguridad.php');
    include('DB/db.php');

    $d_t = $_SESSION['user']['doc_type'];
    $n_d = $_SESSION['user']['num_doc'];
    $n_x = $_SESSION['user']['num_conex'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pqr.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link href="./assets/fontawesome-free-6.4.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/fontawesome-free-6.4.0-web/css/brands.css" rel="stylesheet">
    <link href="./assets/fontawesome-free-6.4.0-web/css/solid.css" rel="stylesheet">
    <title>ETB - PQR</title>
</head>
<body>
<div class="container-genre">
        <?php 
            include('./components/infoAudios.php');
            include('./components/sidebar.php');
            include('./components/navbar.php');
        ?>

        <div class="main-pqr">
            <div class="usuario">
                <?php
                    $sql_main = mysqli_query($db, "SELECT U.tipo_documento, U.documento, U.nombre, U.apellido FROM usuario U INNER JOIN cuenta C on U.telefono_fijo = C.num_conexion INNER JOIN pqr P ON P.cuenta_id = C.id WHERE tipo_documento = '$d_t' && documento = '$n_d' || telefono_fijo = '$n_x'");
                        if($sql_main->num_rows > 0){
                            while($row = $sql_main->fetch_assoc()){
                                echo "<div class=''>";
                                echo "<label>Cliente:</label> <span>" .$row['nombre']. " " .$row['apellido']. "</span><br>";
                                echo "</div>";

                                echo "<div class=''>";
                                echo "<label>Número de Documento:</label> <span>" .$row['documento'] ."</span><br>";
                                echo "</div>";

                                ?>
                                <div>
                                    <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_pqr" onclick="alertAudio('au_pqr', 'img_pqr', 2, 9)">
                            

                                    <audio id="au_pqr" controls class="audio" style="display: none;">
            
                                        <source type="audio/wav" src="./assets/audio/tep/au_pqr.mp3">
            
                                    </audio>
                                </div>
                                <?php
                            }
                        }
                ?>
            </div>

            <div class="line"></div>

            
            <?php
                    $sql = mysqli_query($db, "SELECT P.nombre_pqr, P.id, P.fecha, P.cuenta_id, P.agenda, D.id, D.clase, D.motivo, D.producto, D.causal, D.sintoma, C.num_facturacion, C.num_conexion, C.id, S.id_solicitante, S.nombre, S.apellido, E.estado FROM pqr P INNER JOIN detalle_pqr D on P.id = D.id INNER JOIN cuenta C on C.id = P.cuenta_id INNER JOIN solicitante S on S.id_solicitante = P.id_solicitante INNER JOIN estado_pqr E on E.id = P.estado_pqr INNER JOIN usuario U ON U.telefono_fijo = C.num_conexion WHERE U.tipo_documento = '$d_t' && U.documento = '$n_d' || U.telefono_fijo = '$n_x'");
                    $row1 = mysqli_fetch_array($sql);
                ?>

            <div class="usuario">
                <div class='item-1'>
                    <label>ANS</label> 
                    <div class='semaforo semaforo-co'></div>
                </div>
            </div>

            <div class="usuario">
                <div class=''>
                    <label>Días PQR</label> 
                </div>
                <div>
                    <label for="">Número PQR</label>
                    <span><?php echo $row1['nombre_pqr']?></span>
                </div>
                <div class="recurrente">
                    <button class="btn-recurrente">SI</button>
                    <label for="">Recurrente</label>
                </div>
            </div>

            <div class="usuario">
                <div>
                    <label for="">Clase</label>
                    <span><?php echo $row1['clase']?></span>
                </div>
                <div>
                    <label for="">Producto</label>
                    <span><?php echo $row1['producto']?></span>
                </div>
                <div>
                    <label for="">Línea/Id</label>
                    <span><?php echo $row1['num_conexion']?></span>
                </div>
            </div>

            <div class="usuario">
                <div>
                    <label for="">Motivo</label>
                    <span><?php echo $row1['motivo']?></span>
                </div>
                <div>
                    <label for="">Causal</label>
                    <span><?php echo $row1['causal']?></span>
                </div>
                <div>
                    <label for="">Cuenta Facturación</label>
                    <span><?php echo $row1['num_facturacion']?></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Medio Notificación</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Síntoma</label>
                    <span><?php echo $row1['sintoma']?></span>
                </div>
                <div>
                    <label for="">Tecnología</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Canal de Recuperación</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Sub Canal</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Punto</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">CUN</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Producto Relacionado</label>
                    <span><?php echo $row1['producto']?></span>
                </div>
                <div>
                    <label for="">Medio de Atención</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Fecha Creación</label>
                    <span><?php echo $row1['fecha']?></span>
                </div>
                <div>
                    <label for="">Cun Relacionado</label>
                    <span></span>
                </div>
                <div>
                    <label for="">CRQ Ventana Mantenimiento</label>
                    <span><?php echo $row1['clase']?></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Fecha Presentación</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Radicado</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Número de Pedido</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Sistema de Radicación</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Solicitante</label>
                    <span class="solicitante"><?php echo $row1['nombre']." ".$row1['apellido']?></span>
                </div>
                <div>
                    <label for="">Estado</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Valor Ajustado</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Nombre Instalador</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Fecha Agenda</label>
                    <span><?php echo $row1['agenda']?></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Franja Agenda</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Estado Agenda</label>
                    <span><?php echo $row1['estado']?></span>
                </div>
                <div>
                    <label for="">Motivo o Causal</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Grupo Asignado</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Estado Agenda Anterior</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Proveedor</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Usuario Creador</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Usuario Asignado</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Codigo Back</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Sub Estado</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Tipo Excepción</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Excepción</label>
                    <span></span>
                </div>
                <div>
                    <label for="">Fecha Contingente</label>
                    <span></span>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Código Resolución</label>
                    <input type="number" name="" id="">
                </div>
                <div>
                    <label for="">Imputabilidad</label>
                    <input type="text" name="" id="">
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Descripción Resolución</label>
                    <input type="text" name="" id="">
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Tipo de Cierre</label>
                    <span>
                        <select name="" id="">
                            <option value="">ACCEDE</option>
                        </select>
                    </span>
                </div>
            </div>

            <div class="usuario item-2">
                <div>
                    <label for="">Solucion</label>
                    <textarea name="descripcion" id="" cols="30" rows="3"></textarea>
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">Medio de notificación</label>
                    <span>
                        <select name="" id="">
                            <option value="">Virtual</option>
                        </select>
                    </span>
                </div>
                <div>
                    <label for="">Email/Dirección/Teléfono</label>
                    <input type="text" name="" id="">
                </div>
            </div>
            <div class="usuario">
                <div>
                    <label for="">No deseo recibir notificación</label>
                    <input type="checkbox" name="" id="">
                </div>
            </div>
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
    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./bootstrap/typed.js"></script>
    <script src="./js/main.js"></script>

</body>
</html>