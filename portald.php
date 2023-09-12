<?php 
    include('seguridad.php');
    include('DB/db.php');
    if(isset($_GET['doc_type'])){
        
        $doc_type  = $_GET['doc_type'];
        $num_doc = $_GET['num_doc'];
        $num_conex = $_GET['num_conex'];
        $cuenta_fact = $_GET['cuenta_fact'];
        $id_serv = $_GET['id_serv'];
        $num_orden = $_GET['num_orden'];
    
        $mostrarSeccion = false;
        $documento = '';
        $cuenta = '';
    
        $sql = mysqli_query($db,"SELECT * FROM usuario WHERE tipo_documento = '$doc_type' && documento = '$num_doc' || telefono_fijo = '$num_conex'");

        
            if(mysqli_num_rows($sql) > 0){
                $mostrarSeccion = true;

                foreach($sql as $row){
                    $d_t = $row['tipo_documento'];
                    $n_d = $row['documento'];
                    $n_x = $row['telefono_fijo'];
                }
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/portal.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link href="./assets/fontawesome-free-6.4.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/fontawesome-free-6.4.0-web/css/brands.css" rel="stylesheet">
    <link href="./assets/fontawesome-free-6.4.0-web/css/solid.css" rel="stylesheet">
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

        <div class="main-principal-portal">
            <div class="contedor-portal">
                <div class="breadcump">
                    <a href="#" class="item-bread">Home</a>
                    <a href="#" class="item-bread">Consulta</a>
                    <a href="#" class="item-bread">Vista 360</a>
                    <a href="#" class="item-bread" style="color: rgba(55, 0, 255, 0.623);">Busqueda Cliente</a>
                </div>
                <form action="portal.php" method="POST">
                    <div class="con-filtros">
                        <select name="doc_type" id="">
                            <option value="">Tipo de documento</option>
                            <option value="CC">Cédula de Ciudadania</option>
                            <option value="CE">Cédula de Extranjeria</option>
                            <option value="PP">Pasaporte</option>
                        </select>
                        <input type="text" name="num_doc" id="" placeholder="Número de Documento">
                        <input type="text" name="num_conex" id="" placeholder="Número de Conexión">
                        <input type="text" name="cuenta_fact" id="" placeholder="Cuenta Facturación">
                        <input type="text" name="id_serv" id="" placeholder="Id Servicio (SALESFORCE)">
                        <input type="text" name="num_orden" id="" placeholder="Número de Orden">
                    </div>
                    <div class="con-funtion-fil">
                        <button type="submit" name="btn_search" class="btn-clasic" style="background: var(--blue-os-etb);"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>  BUSCAR</button>
                        <button class="btn-clasic"><i class="fa-solid fa-broom" style="color: #ffffff;"></i>LIMPIAR</button>
                    </div>
                    <input type="text" name="datosEnviados" id="" value="1" style="display: none;">
                </form>
                
                <div id="seccion" class="oculto datos-usuario">
                    <div class="items-info items-sopor item-datas">
                        <div class="cabecera">
                        <h5> 
                            
                            DATOS CLIENTE</h5>
                            <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_datos_cliente" onclick="alertAudio('au_datos_cliente', 'img_datos_cliente', 2, 0)">
                            

                            <audio id="au_datos_cliente" controls class="audio" style="display: none;">

                                <source type="audio/wav" src="./assets/audio/tep/au_datos_cliente.mp3">

                            </audio>
                        </div>
                    
                        <div class="body-items-inf">
                            <div class="content-info" id="con-sopo-inter">
                                    <?php
                                        $sql_main = mysqli_query($db, "SELECT U.tipo_documento, U.documento, U.nombre, U.apellido, U.celular, U.uen, U.email, U.telefono_fijo, U.usuario_etb, U.categoria, U.departamento, U.ciudad, U.direccion, U.usm, U.barrio FROM usuario U INNER JOIN cuenta C on U.telefono_fijo = C.num_conexion WHERE tipo_documento = '$d_t' && documento = '$n_d' || telefono_fijo = '$n_x'");
                                        if($sql_main->num_rows > 0){
                                            while($row = $sql_main->fetch_assoc()){
                                                echo "<div class='content-item-info item-1'>";
                                                echo "<label>Nombre:</label> <span>" .$row['nombre']. " " .$row['apellido']. "</span><br>";
                                                echo "<label>Segmento UEN:</label> <span>" .$row['uen']. "</span><br>";
                                                echo "<label>Segmento:</label> <span> </span><br>";
                                                echo "<label>Categoria:</label> <span></span><br>";
                                                echo "<label>Esquema Atención:</label> <span></span><br>";
                                                echo "<label>Recuperación Experiencia:</label> <span></span><br>";
                                                echo "<button>Documentos Cliente</button>";
                                                echo "</div>";

                                                echo "<div class='content-item-info item-2'>";
                                                echo "<label>Celular:</label> <span>" .$row['celular']. " " . "</span><br>";
                                                echo "<label>Tipo Documento:</label> <span>" .$row['tipo_documento']. "</span><br>";
                                                echo "<label>email:</label> <span>" .$row['email']. "</span><br>";
                                                echo "<label>Telefono Fijo:</label> <span></span><br>";
                                                echo "<label>Usuario MiETB:</label> <span></span><br>";
                                                echo "<label>Tipo de Atención:</label> <span></span><br>";
                                                echo " <label>Autorización Tratamiento Datos Personales</label>";
                                                echo "
                                                    <select>
                                                        <option value=''>Revoca</option>
                                                    </select>";
                                                echo "</div>";

                                                echo "<div class='content-item-info item-2'>";
                                                echo "<label>UEN:</label> <span>" .$row['uen']. "</span><br>";
                                                echo "<label>Departamento:</label> <span>" .$row['departamento']. "</span><br>";
                                                echo "<label>Ciudad:</label> <span>" .$row['ciudad']. "</span><br>";
                                                echo "<label>Direccion:</label> <span>" .$row['direccion']. "</span><br>";
                                                echo "<label>Campaña Activa:</label> <span></span><br>";
                                                echo "<label>Código LISIM:</label> <span></span><br>";
                                                echo "<button>Actualizar Teléfono Móvil</button>";
                                                echo "<button>Ver Detalle</button>";
                                                echo "</div>";
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>

                    <div class="items-info items-sopor item-produc">
                        <div class="cabecera">
                            <h5> 

                            Productos</h5>
                            <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_productos" onclick="alertAudio('au_productos', 'img_productos', 2, 1)">
                            

                            <audio id="au_productos" controls class="audio" style="display: none;">

                                <source type="audio/wav" src="./assets/audio/tep/au_productos.mp3">

                            </audio>
                        </div>
                        <div class="body-items-inf">
                            <div class="table-product" id="con-sopo-inter">
                                <div class="con-table">
                                    <table class="table-general table-sopor table-produc">
                                        <tr>
                                            <th>Front</th>
                                            <th>Documento Anterior </th>
                                            <th>Producto</th>
                                            <th>Plan</th>
                                            <th>Número Conexión</th>
                                            <th>Cuenta Facturación</th>
                                            <th>Dirección Instalación</th>
                                            <th>Est.</th>
                                            <th>Tecnología</th>
                                            <th>TIpo Línea</th>
                                            <th>Estado</th>
                                            <th>Vol</th>
                                            <th>Mora</th>
                                            <th>Fraude</th>
                                            <th>Pérdida/Robo</th>
                                            <th>Nivel Riesgo</th>
                                        </tr>
                                        <tbody>
                                        <?php
                                            $sql1 = mysqli_query($db,"SELECT CONCAT(nombre, ' ', apellido), cuenta.num_facturacion, cuenta.front, cuenta.producto, cuenta.direccion, cuenta.est, cuenta.tecnologia, cuenta.estado, cuenta.central, cuenta.equipo, cuenta.molecula, cuenta.titular, cuenta.num_conexion, usuario.documento FROM usuario INNER JOIN cuenta ON usuario.telefono_fijo = cuenta.num_conexion WHERE tipo_documento = '$d_t' && documento = '$n_d' || telefono_fijo = '$n_x'");
                                            if($sql1->num_rows > 0){
                                                while($row = $sql1->fetch_assoc()){
                                                    // $cuenta = $row['id_user'];
                                                    echo "<tr>";
                                                    echo "<td>".$row['front']."</td>";
                                                    echo "<td></td>";
                                                    echo "<td>".$row['producto']."</td>";
                                                    echo "<td>".$row['producto']."</td>";
                                                    echo "<td>".$row['num_conexion']."</td>";
                                                    echo "<td>".$row['num_facturacion']."</td>";
                                                    echo "<td>".$row['direccion']."</td>";
                                                    echo "<td>".$row['est']."</td>";
                                                    echo "<td>".$row['tecnologia']."</td>";
                                                    echo "<td></td>";
                                                    echo "<td>".$row['estado']."</td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td><div class='semaforo semaforo-co'></div></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-soport-fact">
                        <div class="items-info items-sopor content-soport ">
                            <div class="cabecera">
                                <h5> 

                                Soporte Técnico</h5>
                                <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_soporte" onclick="alertAudio('au_soporte', 'img_soporte', 2, 2)">
                            

                                <audio id="au_soporte" controls class="audio" style="display: none;">
                                    <source type="audio/wav" src="./assets/audio/tep/au_soporte.mp3">
                                </audio>
                            </div>
                            <div class="body-items-inf">
                                <div class="content-soport-sop" id="con-sopo-inter">
                                <?php
                                    $sql2 = mysqli_query($db,"SELECT cuenta.central, cuenta.equipo, cuenta.molecula, pqr.tipo_pqr, pqr.estado_pqr, visita.estado_visita, pqr.id_visita FROM cuenta INNER JOIN pqr ON cuenta.id = pqr.cuenta_id INNER JOIN visita on cuenta.id = visita.cuenta_id INNER JOIN usuario U ON U.telefono_fijo = cuenta.num_conexion WHERE tipo_documento = '$d_t' && documento = '$n_d' || telefono_fijo = '$n_x'");
                                    if($sql2->num_rows > 0){
                                        $eye = 0;
                                        while($row3 = $sql2->fetch_assoc()){
                                            if($row3['tipo_pqr'] && $row3['estado_pqr'] == 1){
                                                if($row3['id_visita'] >= 1){
                                                    if($row3['tipo_pqr'] == 1){
                                                        $eye1 = "1 <i class='fa-solid fa-eye eye-color'></i>";
                                                    }elseif($row3['tipo_pqr'] == 2){
                                                        $eye2 = "1 <i class='fa-solid fa-eye eye-color'></i>";
                                                    }
                                                    if($row3['estado_visita'] == 1){
                                                        $visita = "Si <i class='fa-solid fa-eye eye-color' id='btn-modal-visita'></i>";
                                                    }
                                                }else{
                                                    if($row3['tipo_pqr'] == 1){
                                                        $eye1 = "<i class='fa-solid fa-eye eye-color'></i>";
                                                    }elseif($row3['tipo_pqr'] == 2){
                                                        $eye2 = "<i class='fa-solid fa-eye eye-color'></i>";
                                                    }
                                                }

                                                echo "<div class='content-item-info'>";
                                                echo "<label>Central:</label> <span>" .$row3['central']. "</span><br>";
                                                echo "<label>Equipo:</label> <span>" .$row3['equipo']. "</span><br>";
                                                echo "<label>Molécula:</label> <span>" .$row3['molecula']. "</span><br>";
                                                echo "<label>Falla Masiva:</label> <span>".$eye1."</span><br>";
                                                echo "</div>";
    
                                                echo "<div class='content-item-info'>";
                                                echo "<label>Visita Abierta:</label> <span>" .$visita. "</span><br>";
                                                echo "<label>PQRs Falla Técnica:</label> <span>" .$eye2. "</span><br>";
                                                echo "<label>Reportar Falla:</label> <span>" .$row3['']. "</span><br>";
                                                echo "</div>";

                                            }else{
                                                echo "<div class='content-item-info'>";
                                                echo "<label>Central:</label> <span>" .$row3['central']. "</span><br>";
                                                echo "<label>Equipo:</label> <span>" .$row3['equipo']. "</span><br>";
                                                echo "<label>Molécula:</label> <span>" .$row3['molecula']. "</span><br>";
                                                echo "<label>Falla Masiva:</label> <span>".$eye1."</span><br>";
                                                echo "</div>";
    
                                                echo "<div class='content-item-info'>";
                                                echo "<label>Visita Abierta:</label> <span>" .$visita. "</span><br>";
                                                echo "<label>PQRs Falla Técnica:</label> <span>" .$eye2. "</span><br>";
                                                echo "<label>Reportar Falla:</label> <span>" .$row3['']. "</span><br>";
                                                echo "</div>";
                                            }
                                        }
                                    }else{
                                        $input = "SELECT cuenta.central, cuenta.equipo, cuenta.molecula FROM cuenta
                                        INNER JOIN usuario U ON U.telefono_fijo = cuenta.num_conexion 
                                        WHERE tipo_documento = '$d_t' && documento = '$n_d' || telefono_fijo = '$n_x'";
                                        $output = mysqli_query($db, $input);
                                        foreach($output as $row){
                                            echo "<div class='content-item-info'>";
                                            echo "<label>Central:</label> <span>" .$row['central']. "</span><br>";
                                            echo "<label>Equipo:</label> <span>" .$row['equipo']. "</span><br>";
                                            echo "<label>Molécula:</label> <span>" .$row['molecula']. "</span><br>";
                                            echo "<label>Falla Masiva:</label> <span></span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info'>";
                                            echo "<label>Visita Abierta:</label> <span></span><br>";
                                            echo "<label>PQRs Falla Técnica:</label> <span></span><br>";
                                            echo "<label>Reportar Falla:</label><a href='./reportarFalla.php?cliente=$n_d'><i class='fa-solid fa-eye eye-color' id='eye_repor_falla'></i></a><span></span><br>";
                                            echo "</div>";
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="items-info items-sopor content-fact">
                            <div class="cabecera">
                                <h5> 
                                Datos Facturación</h5>
                                <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_datos_fact" onclick="alertAudio('au_datos_fact', 'img_datos_fact', 2, 3)">
                            

                                <audio id="au_datos_fact" controls class="audio" style="display: none;">

                                    <source type="audio/wav" src="./assets/audio/tep/au_datos_cliente.mp3">

                                </audio>
                            </div>
                            <div class="body-items-inf">
                                <div class="content-fact-fac" id="con-sopo-inter">
                                <?php
                                    $sql4 = mysqli_query($db,"SELECT CONCAT(nombre, ' ', apellido), cuenta.num_facturacion, cuenta.direccion, cuenta.est, cuenta.estado, cuenta.titular, cuenta.num_conexion, usuario.documento, usuario.email, usuario.departamento, usuario.ciudad, usuario.barrio  FROM usuario INNER JOIN cuenta ON usuario.telefono_fijo = cuenta.num_conexion WHERE tipo_documento = '$d_t' && documento = '$n_d' || telefono_fijo = '$n_x'");
                                    if($sql4->num_rows > 0){
                                        while($row4 = $sql4->fetch_assoc()){
                                            echo "<div class='content-item-info item-1'>";
                                            echo "<label>Cuenta Facturacion:</label> <span>" .$row4['num_facturacion']. "</span><br>";
                                            echo "<label>Estado Cta Facturacion:</label> <span>" .$row4['estado']. "</span><br>";
                                            echo "<label>Ciclo:</label> <span></span><br>";
                                            echo "<label>Dirección Facturación:</label> <span>" .$row4['direccion']. "</span><br>";
                                            echo "<label>Tipo Factura:</label> <span></span><br>";
                                            echo "<label>Tipo de Envío:</label> <span></span><br>";
                                            echo "<label>Mora:</label> <span></span><br>";
                                            echo "<label>Email Facturación:</label> <span>" .$row4['email']. "</span><br>";
                                            echo "<label>Pago Recurrente:</label> <span></span><br>";
                                            echo "<label>Jerarquía Facturación:</label> <span></span><br>";
                                            echo "<label>Cuenta Padre:</label> <span>" .$row4['num_facturacion']. "</span><br>";
                                            echo "<label>Mensaje Variación Factura:</label> <span></span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-2'>";
                                            echo "<label>Frecuencia:</label> <span></span><br>";
                                            echo "<label>Departamento:</label> <span>" .$row4['departamento']. "</span><br>";
                                            echo "<label>Ciudad:</label> <span>" .$row4['ciudad']. "</span><br>";
                                            echo "<label>Barrio:</label> <span>" .$row4['barrio']. "</span><br>";
                                            echo "<label>Estrato:</label> <span>" .$row4['est']. "</span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-3'>";
                                            echo "<label>Día de Corte:</label> <span></span><br>";
                                            echo "<label>Cliente Migrado :</label> <span></span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-4'>";
                                            echo "<label>Fecha Entrega Factura:</label> <span></span><br>";
                                            echo "<label>Fecha Suspención:</label> <span></span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-5'>";
                                            echo "<label>Fecha Pago:</label> <span></span><br>";
                                            echo "<label>Factura:</label> <span></span><br>";
                                            echo "<label>Estado:</label> <span></span><br>";
                                            echo "</div>";
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
    <?php
        if ($mostrarSeccion) {
            echo "<script>";
            echo "document.getElementById('seccion').classList.remove('oculto');";
            echo "</script>";
        }
    ?>
    <script>
        document.getElementById('eye_repor_falla').addEventListener('mouseover', event=>{
            habladorText('Si damos click en este enlace, el asesor podrá reportar una falla no identificada que poseea el cliente. ');
        })
    </script>
</body>
</html>