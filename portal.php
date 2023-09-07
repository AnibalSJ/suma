<?php 
    include('seguridad.php');
    include('DB/db.php');
    
    var_dump($_SESSION['user']);   
    var_dump($_SESSION['user']['num_doc']);     
    // var_dump($_POST);
    error_reporting(0);
    $doc_type  = $_POST['doc_type'];
    $num_doc = $_POST['num_doc'];
    $num_conex = $_POST['num_conex'];
    $cuenta_fact = $_POST['cuenta_fact'];
    $id_serv = $_POST['id_serv'];
    $num_orden = $_POST['num_orden'];


    $d_t = $_SESSION['user']['doc_type'];
    $n_d = $_SESSION['user']['num_doc'];
    $n_x = $_SESSION['user']['num_conex'];

    $mostrarSeccion = false;
    $documento = '';
    $cuenta = '';

    $sql = mysqli_query($db,"SELECT * FROM usuario WHERE tipo_documento = '$doc_type' && documento = '$num_doc' || telefono_fijo = '$num_conex'");
    
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(mysqli_num_rows($sql) > 0){
            $mostrarSeccion = true;
            if($mostrarSeccion == true){
                $_SESSION['user'] = $_POST;

            }
            
        }
        
    }
    
    if(isset($_SESSION['user'])){
        $mostrarSeccion = true;
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

    <title>Document</title>
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

                                <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

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
                                                echo "<label>Segmento:</label> <span>" .$row['']. "</span><br>";
                                                echo "<label>Categoria:</label> <span>" .$row['categoria']. "</span><br>";
                                                echo "<label>Esquema Atención:</label> <span>" .$row['']. "</span><br>";
                                                echo "<label>Recuperación Experiencia:</label> <span>" .$row['']. "</span><br>";
                                                echo "<button>Documentos Cliente</button>";
                                                echo "</div>";

                                                echo "<div class='content-item-info item-2'>";
                                                echo "<label>Celular:</label> <span>" .$row['celular']. " " . "</span><br>";
                                                echo "<label>Tipo Documento:</label> <span>" .$row['tipo_documento']. "</span><br>";
                                                echo "<label>email:</label> <span>" .$row['email']. "</span><br>";
                                                echo "<label>Telefono Fijo:</label> <span>" .$row['telefono_fijo']. "</span><br>";
                                                echo "<label>Usuario MiETB:</label> <span>" .$row['']. "</span><br>";
                                                echo "<label>Tipo de Atención:</label> <span>" .$row['']. "</span><br>";
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
                                                echo "<label>Campaña Activa:</label> <span>" .$row['']. "</span><br>";
                                                echo "<label>Código LISIM:</label> <span>" .$row['']. "</span><br>";
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

                                <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

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
                                                    $cuenta = $row['id_user'];
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

                                    <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

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

                                    <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

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
                                            echo "<label>Ciclo:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Dirección Facturación:</label> <span>" .$row4['direccion']. "</span><br>";
                                            echo "<label>Tipo Factura:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Tipo de Envío:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Mora:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Email Facturación:</label> <span>" .$row4['email']. "</span><br>";
                                            echo "<label>Pago Recurrente:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Jerarquía Facturación:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Cuenta Padre:</label> <span>" .$row4['num_facturacion']. "</span><br>";
                                            echo "<label>Mensaje Variación Factura:</label> <span>" .$row4['']. "</span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-2'>";
                                            echo "<label>Frecuencia:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Departamento:</label> <span>" .$row4['departamento']. "</span><br>";
                                            echo "<label>Ciudad:</label> <span>" .$row4['ciudad']. "</span><br>";
                                            echo "<label>Barrio:</label> <span>" .$row4['barrio']. "</span><br>";
                                            echo "<label>Estrato:</label> <span>" .$row4['est']. "</span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-3'>";
                                            echo "<label>Día de Corte:</label> <span>" .$row4['']. "</span><br>";
                                            echo "<label>Cliente Migrado :</label> <span>" .$row4['']. "</span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-4'>";
                                            echo "<label>Fecha Entrega Factura:</label> <span>".$row4['']. "</span><br>";
                                            echo "<label>Fecha Suspención:</label> <span>".$row4['']. "</span><br>";
                                            echo "</div>";

                                            echo "<div class='content-item-info item-5'>";
                                            echo "<label>Fecha Pago:</label> <span>".$row4['']. "</span><br>";
                                            echo "<label>Factura:</label> <span>".$row4['']. "</span><br>";
                                            echo "<label>Estado:</label> <span>".$row4['']. "</span><br>";
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
    <!-- ================================ MODALES ==================================================== -->
    <div class="modal fade" id="modal-visita"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CREANDO PQR DE INFORMACIÓN

                        <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_creacion_pqr" onclick="alertAudio('au_creacion_pqr', 'img_creacion_pqr', 2, 4)">
                            

                        <audio id="au_creacion_pqr" controls class="audio" style="display: none;">

                            <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

                        </audio>
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="descrip-pqr">
                        <label for="">Id PQR</label>
                        <?php
                            $sql3 = mysqli_query($db,"SELECT pqr.tipo_pqr, pqr.id, tipopqr.pqr, pqr.nombre_pqr, pqr.fecha, pqr.agenda FROM cuenta INNER JOIN pqr ON cuenta.id = pqr.cuenta_id INNER JOIN visita on cuenta.id = visita.cuenta_id INNER JOIN tipopqr on pqr.tipo_pqr = tipopqr.id INNER JOIN usuario U ON U.telefono_fijo = cuenta.num_conexion WHERE tipo_documento = '$d_t' && documento = '$n_d' || telefono_fijo = '$n_x'");

                            if($sql3->num_rows > 0){
                                while($row4 = $sql3->fetch_assoc()){
                                    if($row4['id'] == true){
                                        echo "<p>Ya exite una PQR con clase: PETICION, motivo: ".$row4['pqr']. ", con el número: ".$row4['nombre_pqr']." creada el: ".$row4['fecha']." en estado: Enviado a Segundo Nivel, con Agenda para la fecha: ".$row4['agenda']."</p>";
                                    }
                                }
                            }else{
                                echo "no";
                            }
                        ?>
                    </div>
                    <div class="content-modal">
                        <form action="crear-pqr.php" method="POST">
                            <label for="">Clase</label>
                            <span>
                                <select name="clase" id="">
                                    <option value="PETICION">PETICIÓN</option>
                                    <option value="FALLA TECNICA">FALLA TÉCNICA</option>
                                </select>
                            </span>

                            <label for="">Motivo</label>
                            <span>
                                <select name="motivo" id="">
                                    <option value="INFORMACION">INFORMACIÓN Y/O DOCUMENTACIÓN</option>
                                </select>
                            </span>

                            <label for="">Relación PQR</label>
                            <span><input type="text" name="relacion" id="" value="INTERNET"></span>
                            <span class="select-relacion">
                                <select name="producto" id="">
                                    <option value="PRODUCTO">PRODUCTO</option>
                                </select>
                            </span>

                            <label for="">Causal</label>
                            <span>
                                <select name="causal" id="">
                                    <option value="VISITA TECNICA">VISITAS TECNICAS</option>
                                </select>
                            </span>

                            <label for="">Sintoma</label>
                            <span>
                                <select name="sintoma" id="">
                                    <option value="">Seleccione</option>
                                    <option value="CONFIRMACION">CONFIRMACIÓN FECHA VISITA DAÑO</option>
                                    <option value="REAGENDAMIENTO">REAGENDAMIENTO FECHA VISITA DAÑO</option>
                                    <option value="INCUMPLIMIENTO">INCUMPLIMIENTO VISITA DAÑO</option>
                                    <option value="INSATISFACCION">INSATISFACCIÓN VISITA DAÑO</option>
                                    <option value="CANCELACION">CANCELACIÓN VISITA DAÑO</option>
                                </select>
                            </span>

                            <label for="">Descripcion</label>
                            <textarea name="descripcion" id="" cols="30" rows="3"></textarea>

                            <label for="">Solicitante
                                <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_solicitante" onclick="alertAudio('au_solicitante', 'img_solicitante', 2, 5)">
                                

                                <audio id="au_solicitante" controls class="audio" style="display: none;">

                                    <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

                                </audio>
                            </label>
                            <select name="solicitante" id="search-soli" readonly="readonly" class="solicitante-search"></select>
                            <button type="button" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>

                            <div class="table-search" style="display: none;" id="table_search">
                                <div class="content-table-search">
                                    <div class="barra-busqueda">
                                        <label for="buscar">Buscar:</label>
                                        <input type="text" id="buscar" name="buscar">
                                        <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_solicitante_tb" onclick="alertAudio('au_solicitante_tb', 'img_solicitante_tb', 2, 6)">
                                

                                            <audio id="au_solicitante_tb" controls class="audio" style="display: none;">

                                                <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

                                            </audio>
                                    </div>
                                    <div class="con-table">
                                        <table class="table-general table-sopor">
                                            <tr>
                                                <th>Solicitante</th>
                                                <th>Numero Documento</th>
                                                <th>Tipo Documento</th>
                                                <th>Telefono Solicitante</th>
                                                <th>Celular</th>
                                                <th>Email</th>
                                                <th>Dirección</th>
                                                <th>Acción</th>
                                            </tr>
                                            <tbody>
                                                <?php
                                                    $sql4 = mysqli_query($db,"SELECT solicitante.id_solicitante, solicitante.tipo_documento, solicitante.documento_soli, solicitante.nombre, solicitante.apellido, solicitante.telefono, solicitante.celular, solicitante.email, solicitante.direccion, C.num_conexion, U.telefono_fijo FROM solicitante INNER JOIN pqr ON solicitante.id_solicitante = pqr.id_solicitante INNER JOIN cuenta C ON C.id = pqr.cuenta_id INNER JOIN usuario U ON U.telefono_fijo = C.num_conexion WHERE U.tipo_documento = '$d_t' && U.documento = '$n_d' || U.telefono_fijo = '$n_x'");
                                                    if($sql4->num_rows > 0){
                                                        while($row5 = $sql4->fetch_assoc()){
                                                            echo "<tr>";
                                                            echo "<td>".$row5['nombre']. " ".$row5['apellido']."</td>";
                                                            echo "<td>".$row5['documento_soli']."</td>";
                                                            echo "<td>".$row5['tipo_documento']."</td>";
                                                            echo "<td>".$row5['telefono']."</td>";
                                                            echo "<td>".$row5['celular']."</td>";
                                                            echo "<td>".$row5['email']."</td>";
                                                            echo "<td>".$row5['direccion']."</td>";
                                                            ?>
                                                            <td><a href="portal.php?documento_soli=<?php  echo $row5['documento_soli']?>&estado=1" >Editar</a></td>
                                                            <?php
                                                            echo "</tr>";
                                                        }
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Crear" class="crear-pqr">
                            <img src="./assets/img/img-audios/etbA.svg" alt="parlante-audio-etb" class="img-audio" id="img_solicitante_fn" onclick="alertAudio('au_solicitante_fn', 'img_solicitante_fn', 2, 8)">       

                            <audio id="au_solicitante_fn" controls class="audio" style="display: none;">

                                <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

                            </audio>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-visita" >Aceptar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-actualizar"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Contacto
                        <img src="./assets/img/img-audios/etbN.svg" alt="parlante-audio-etb" class="img-audio" id="img_editar_contac" onclick="alertAudio('au_editar_contac', 'img_editar_contac', 2, 7)">
                                

                        <audio id="au_editar_contac" controls class="audio" style="display: none;">

                            <source type="audio/wav" src="./assets/audio/soporte/au_general_sf.mp3">

                        </audio>
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="update.php" class="editar-contact" method = "POST">
                        <?php
                            $doc_solicitante = isset($_GET['documento_soli']) ? $_GET['documento_soli'] : "";
                            $sql_soli = mysqli_query($db, "SELECT solicitante.id_solicitante, solicitante.tipo_documento, solicitante.documento_soli, solicitante.nombre, solicitante.apellido, solicitante.telefono, solicitante.celular, solicitante.email, solicitante.direccion FROM solicitante INNER JOIN pqr ON pqr.id_solicitante = solicitante.id_solicitante WHERE solicitante.documento_soli = '$doc_solicitante'");
                            $row_soli = mysqli_fetch_array($sql_soli);
                            if(isset($_GET['estado'])){
                                if($_GET['estado'] == 1){
                                    ?>
                                    <script>
                                        $( document ).ready(function() {
                                            $('#modal-actualizar').modal('toggle')
                                        });
                                    </script>
                                    <?php
                                }else{
                                    echo "No";
                                }
                            }
                        ?>
                        <label for="">Tipo Documento</label>
                        <span class="select-relacion">
                            <select name="tipo_documento" id="">
                                <option value="<?php echo $row_soli['tipo_documento']?>"><?php echo $row_soli['tipo_documento']?></option>
                            </select>
                        </span>

                        <label for="">Número de Documento</label>
                        <input type="number" name="doc_soli" value="<?php echo $row_soli['documento_soli']?>" readonly>
                    
                        <label for="">Nombres</label>
                        <input type="text" name="nombre" id="" value="<?php echo $row_soli['nombre']?>">

                        <label for="">Apellidos</label>
                        <input type="text" name="apellido" id="" value="<?php echo $row_soli['apellido']?>">
                        
                        <label for="">Teléfono Fijo</label>
                        <input type="text" name="telefono" id="" value="<?php echo $row_soli['telefono']?>">

                        <label for="">Celular</label>
                        <input type="text" name="celular" id="" value="<?php echo $row_soli['celular']?>">

                        <label for="">Email</label>
                        <input type="text" name="email" id="" value="<?php echo $row_soli['email']?>">
                        
                        <label for="">Dirección</label>
                        <input type="text" name="direccion" id="" value="<?php echo $row_soli['direccion']?>">

                        <label for="" class="autorizacion">Autoriza el manejo de datos personales</label>
                        <span class="select-relacion">
                            <select name="" id="">
                                <option value="">Seleccione una opción</option>
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </span>
                        <div class="modal-footer">
                            <input type="submit" class="btn-guardar" value="Guardar" id="guardar_soli">
                            <button type="button" class="btn btn-secondary btn-cancelar" data-bs-toggle="modal" data-bs-target="#modal-actualizar" >Cancelar</button>
                        </div>
                    </form>
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
    <script src="./js/portal.js"></script>
    <script>
        $(document).ready(function(){
    
            var queryString = window.location.search;
            console.log("La URL tiene esto de más "+queryString);

            if (queryString !== "") {
            let documentoSoli = queryString.split("=")[1].split("&")[0];
            console.log("modal normal");
            $("#modal-actualizar").modal("show");
            }

        });
    </script>

    <?php
        if ($mostrarSeccion) {
            echo "<script>";
            echo "document.getElementById('seccion').classList.remove('oculto');";
            echo "</script>";
        }
        
        // var_dump($_SESSION['update']);
        if(isset($_SESSION['update'])){
            if($_SESSION['update']){
                echo "<script>";
                echo "
                        $( document ).ready(function() {
                            $('#modal-visita').modal('show');
                        });
                    ";
                
                 echo "let option = document.createElement('option');";
                 echo "option.value = '".$_SESSION['documento_soli']."';";
                 echo "option.textContent = '".$_SESSION['nombre_solicitante']."';";
                 
                 echo "document.getElementById('search-soli').appendChild(option);";
                 echo "</script>";
                
                unset($_SESSION['update']);
            }
        }

        session_write_close();
    ?>
</body>
</html>