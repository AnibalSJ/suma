<?php 
    include('seguridad.php');
    include('DB/db.php');
    
    error_reporting(0);
    $doc_type  = $_POST['doc_type'];
    $num_doc = $_POST['num_doc'];
    $num_conex = $_POST['num_conex'];
    $cuenta_fact = $_POST['cuenta_fact'];
    $id_serv = $_POST['id_serv'];
    $num_orden = $_POST['num_orden'];

    $mostrarSeccion = false;
    $documento = '';
    $cuenta = '';

    $sql = mysqli_query($db,"SELECT * FROM usuario WHERE tipo_documento = '$doc_type' && documento = '$num_doc' || telefono_fijo = '$num_conex'");
    
    if(isset($_POST['datosEnviados'])){
        if($_POST['datosEnviados'] == 1){
            $nr = mysqli_num_rows($sql);
            $mostrarSeccion = true;
            // var_dump($mostrarSeccion);
        }

        if ($mostrarSeccion) {
            echo "<script>";
            // echo "$('#seccion').removeClass('oculto');";
            // echo "document.getElementById('seccion').classList.remove('oculto')";
            echo "</script>";
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
                
                <div id="seccion" class="datos-usuario">
                    <div class="items-info items-sopor item-datas">
                        <div class="cabecera">
                        <h5> 
                            <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                        DATOS CLIENTE</h5>
                            <img src="./assets/img/Group 10.svg" alt="parlante-audio-etb" class="img-audio" id="img-info-dia" onclick="alertAudio('au-info-dia', 'img-info-dia')">
                        </div>
                    
                        <div class="body-items-inf">
                            <div class="content-info" id="con-sopo-inter">
                                    <?php
                                        if($sql->num_rows > 0){
                                            while($row = $sql->fetch_assoc()){
                                                $documento = $row['id'];
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
                            <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                            Productos</h5>
                            <img src="./assets/img/Group 10.svg" alt="parlante-audio-etb" class="img-audio" id="img-info-dia" onclick="alertAudio('au-info-dia', 'img-info-dia')">
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
                                            $sql1 = mysqli_query($db,"SELECT CONCAT(nombre, ' ', apellido), usuario.id as id_user, cuenta.front, cuenta.producto, cuenta.direccion, cuenta.est, cuenta.tecnologia, cuenta.estado, cuenta.central, cuenta.equipo, cuenta.molecula, cuenta.titular, cuenta.num_conexion, usuario.documento FROM usuario INNER JOIN cuenta ON usuario.id = cuenta.titular
                                            WHERE titular = $documento
                                            ");
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
                    <div class="items-info items-sopor">
                        <div class="cabecera">
                            <h5> 
                            <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                            Soporte Técnico</h5>
                            <img src="./assets/img/Group 10.svg" alt="parlante-audio-etb" class="img-audio" id="img-info-dia" onclick="alertAudio('au-info-dia', 'img-info-dia')">
                        </div>
                        <div class="body-items-inf">
                            <div class="contet content-info conten-info-pqr" id="con-sopo-inter">
                                <?php
                                    $sql = "SELECT cuenta.central, cuenta.equipo, cuenta.molecula, tipo_pqr, pqr.estado_pqr, visita.estado_visita, pqr.id_visita FROM cuenta INNER JOIN pqr ON cuenta.id = pqr.cuenta_id INNER JOIN visita on cuenta.id = visita.cuenta_id WHERE titular = $cuenta and estado_pqr = 1";
                                    
                                    $soporteTec = $db->query($sql);
                                    
                                    if($soporteTec->num_rows > 0){
                                        
                                        foreach($soporteTec as $row){
                                            echo "<div class='content-item-info'>";
                                            echo "<label>Central:</label> <span>" .$row['central']. "</span><br>";
                                            echo "<label>Equipo:</label> <span>" .$row['equipo']. "</span><br>";
                                            echo "<label>Molécula:</label> <span>" .$row['molecula']. "</span><br>";
                                            
                                            echo "<label>Falla Masiva:</label> <span>"."</span><br>";
                                            echo "</div>";
                                            
                                            echo "<div class='content-item-info'>";
                                            
                                            $falla = $row['tipo_pqr'];
                                        }
                                        
                                    }else{
                                        $sql = "SELECT cuenta.central, cuenta.equipo, cuenta.molecula FROM cuenta WHERE titular = $cuenta";

                                        $soporteTec = $db->query($sql);
                                        
                                        foreach($soporteTec as $row){
                                            echo "<div class='content-item-info'>";
                                            echo "<label>Central:</label> <span>" .$row['central']. "</span><br>";
                                            echo "<label>Equipo:</label> <span>" .$row['equipo']. "</span><br>";
                                            echo "<label>Molécula:</label> <span>" .$row['molecula']. "</span><br>";
                                            
                                            echo "<label>Falla Masiva:</label> <span>"."</span><br>";
                                            echo "</div>";
                                            
                                            echo "<div class='content-item-info'>";
                                            echo "<label>Visita Abierta:</label> <span></span><br>";
                                            echo "<label>PQRs Falla Técnica:</label> <span></span><br>";
                                            echo "<label>Reportar Falla:</label> <span> <a href='./reportarFalla.php?cliente=" . $documento ."'><i class='fa-solid fa-eye eye-color'></i></a> </span><br>";
                                            echo "</div>";
                                        }
                                    }
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="items-info items-sopor item-fact">
                        <div class="cabecera">
                            <h5> 
                            <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                            Datos Facturación</h5>
                            <img src="./assets/img/Group 10.svg" alt="parlante-audio-etb" class="img-audio" id="img-info-dia" onclick="alertAudio('au-info-dia', 'img-info-dia')">
                        </div>
                        <div class="body-items-inf">
                            <div class="contet content-info" id="con-sopo-inter">
                            <?php
                                $sql4 = mysqli_query($db,"SELECT CONCAT(nombre, ' ', apellido), cuenta.num_facturacion, cuenta.direccion, cuenta.est, cuenta.estado, cuenta.titular, cuenta.num_conexion, usuario.documento, usuario.email, usuario.departamento, usuario.ciudad, usuario.barrio  FROM usuario INNER JOIN cuenta ON usuario.id = cuenta.titular");
                                if($sql4->num_rows > 0){
                                    while($row4 = $sql4->fetch_assoc()){
                                        echo "<div class='content-item-info'>";
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

                                        echo "<div class='content-item-info'>";
                                        echo "<label>Frecuencia:</label> <span>" .$row4['']. "</span><br>";
                                        echo "<label>Departamento:</label> <span>" .$row4['departamento']. "</span><br>";
                                        echo "<label>Ciudad:</label> <span>" .$row4['ciudad']. "</span><br>";
                                        echo "<label>Barrio:</label> <span>" .$row4['barrio']. "</span><br>";
                                        echo "<label>Estrato:</label> <span>" .$row4['est']. "</span><br>";
                                        echo "</div>";

                                        echo "<div class='content-item-info'>";
                                        echo "<label>Día de Corte:</label> <span>" .$row4['']. "</span><br>";
                                        echo "<label>Cliente Migrado :</label> <span>" .$row4['']. "</span><br>";
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


    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>

</body>
</html>