<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador - Portal SUMA</title>
    <link rel="shortcut icon" href="./assets/img/ETB.svg">
    <!-- Main css -->
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <!-- Main css -->
</head>
<body>
        <!-- !! Tablas -->
        <div class="con-table">
            <table class="table-general table-sopor">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="dell-sem"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="dell-sem"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <!-- !! Items soporte -->
        <div class="items-info items-sopor">
            <div class="cabecera">
                <h5> <!--Para cerrarlo con funcion de js-->
                    <img src="./assets/img/rule.svg" alt="" class="menus-cabecera">
                    LINEA TELEFONICA</h5>
                <img src="./assets/img/Group 10.svg" alt="parlante-audio-etb" class="img-audio" id="img-info-dia" onclick="alertAudio('au-info-dia', 'img-info-dia')">
            </div>
            <div class="body-items-inf">
                <div class="contet" id="con-sopo-inter"> <!--Para minimuzarlo poner clase hidebody-->
                    
                </div>
            </div>
        </div>
    

    <!-- main js -->
    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
    <!-- main js -->
</body>
</html>