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

    $sql = mysqli_query($db,"SELECT * FROM usuario WHERE tipo_documento = '$doc_type' && documento = '$num_doc' || telefono_fijo = '$num_conex'");

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nr = mysqli_num_rows($sql);
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
    <link href="./asset;s/fontawesome-free-6.4.0-web/css/solid.css" rel="stylesheet">
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
                </form>
                
                <div id="seccion" class="oculto">
                    <div class="items-info items-sopor">
                        <div class="cabecera">
                        <h5> 
                            <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                        DATOS CLIENTE</h5>
                            <img src="./assets/img/Group 10.svg" alt="parlante-audio-etb" class="img-audio" id="img-info-dia" onclick="alertAudio('au-info-dia', 'img-info-dia')">
                        </div>
                    
                        <div class="body-items-inf">
                            <div class="contet content-info" id="con-sopo-inter">
                                    <?php
                                        if($sql->num_rows > 0){
                                            while($row = $sql->fetch_assoc()){
                                                echo "<div class='content-item-info'>";
                                                echo "<label>Nombre:</label> <span>" .$row['nombre']. " " .$row['apellido']. "</span><br>";
                                                echo "<label>Segmento UEN:</label> <span>" .$row['uen']. "</span><br>";
                                                echo "<label>Segmento:</label> <span>" .$row['']. "</span><br>";
                                                echo "<label>Categoria:</label> <span>" .$row['categoria']. "</span><br>";
                                                echo "<label>Esquema Atención:</label> <span>" .$row['']. "</span><br>";
                                                echo "<label>Recuperación Experiencia:</label> <span>" .$row['']. "</span><br>";
                                                echo "<button>Documentos Cliente</button>";
                                                echo "</div>";

                                                echo "<div class='content-item-info'>";
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

                                                echo "<div class='content-item-info'>";
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

                    <div class="items-info items-sopor">
                        <div class="cabecera">
                            <h5> 
                            <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                            Productos</h5>
                            <img src="./assets/img/Group 10.svg" alt="parlante-audio-etb" class="img-audio" id="img-info-dia" onclick="alertAudio('au-info-dia', 'img-info-dia')">
                        </div>
                        <div class="body-items-inf">
                            <div class="contet" id="con-sopo-inter">
                                <div class="con-table">
                                    <table class="table-general table-sopor">
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
                                        $sql1 = mysqli_query($db,"SELECT CONCAT(nombre, ' ', apellido), cuenta.num_facturacion, cuenta.front, cuenta.producto, cuenta.direccion, cuenta.est, cuenta.tecnologia, cuenta.estado, cuenta.central, cuenta.equipo, cuenta.molecula, cuenta.titular, cuenta.num_conexion, usuario.documento FROM usuario INNER JOIN cuenta ON usuario.id = cuenta.titular WHERE tipo_documento = '$doc_type' && documento = '$num_doc' || telefono_fijo = '$num_conex'");
                                        if($sql1->num_rows > 0){
                                            while($row = $sql1->fetch_assoc()){
                                                echo "<tr>";
                                                echo "<td>".$row['front']."</td>";
                                                echo "<td></td>";
                                                echo "<td>".$row['producto']."</td>";
                                                echo "<td>".$row['producto']."</td>";
                                                echo "<td>".$row['num_conexion']."</td>";
                                                echo "<td>".$row['num_facturacion']."</td>";
                                                echo "<td>".$row['direccion']."</td>";
                                                // echo "<td>".$row['est']."</td>";
                                                echo "<td>".$row['tecnologia']."</td>";
                                                echo "<td></td>";
                                                echo "<td>".$row['estado']."</td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
                                                echo "<td class='semaforo semaforo-co'></td>";
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
                </div>
            </div>
        </div>
    </div>

    <?php
        if ($mostrarSeccion) {
            echo "<script>";
            echo "document.getElementById('seccion').classList.remove('oculto');";
            echo "</script>";
        }
    ?>

    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
</body>
</html>