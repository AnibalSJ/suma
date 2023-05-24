<?php 
    include('seguridad.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/portal.css">
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
                <form action="">
                    <div class="con-filtros">
                            <select name="tipodoc" id="">
                                <option value="">Tipo de documento</option>
                                <option value="">Cédula de Ciudadania</option>
                                <option value="">Cédula de Extranjeria</option>
                                <option value="">Pasaporte</option>
                            </select>
                            <input type="text" name="" id="" placeholder="Número de Documento">
                            <input type="text" name="" id="" placeholder="Número de Conexión">
                            <input type="text" name="" id="" placeholder="Cuenta Facturación">
                            <input type="text" name="" id="" placeholder="Id Servicio (SALESFORCE)">
                            <input type="text" name="" id="" placeholder="Número de Orden">
                        </div>
                        <div class="con-funtion-fil">
                            <button type="submit" class="btn-clasic" style="background: var(--blue-os-etb);"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>  BUSCAR</button>
                            <button class="btn-clasic"><i class="fa-solid fa-broom" style="color: #ffffff;"></i>LIMPIAR</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>