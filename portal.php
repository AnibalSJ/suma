<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/portal.css">
    <title>Document</title>
</head>
<body>
    <div class="breadcump">
        <a href="#" class="item-bread">Home</a>
        <a href="#" class="item-bread">Consulta</a>
        <a href="#" class="item-bread">Vista 360</a>
        <a href="#" class="item-bread" style="color: rgba(55, 0, 255, 0.623);">Busqueda Cliente</a>
    </div>

    <div class="container">
        <form action="" method="POST">
            <select name="" id="">
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
        </form>
    </div>
    <div class="container-btn">
        <button class="btn-search">BUSCAR</button>
        <button class="btn-empty">LIMPIAR</button>
    </div>
</body>
</html>