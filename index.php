<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == 1){
            header('Location: ./portal.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador - Portal SUMA</title>
    <link rel="shortcut icon" href="./assets/img/ETBblue.svg">
    <!-- Main css -->
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/login.css">
    <!-- Main css -->
</head>
<body>
    <form action="./login.php" method="POST" id="form_login">
    <div class="container-login">
        <div class="header-login">
            <img src="./assets/img/suma.png" alt="">
            <h2 class="tittle-login"><span></span>Ingrese Credenciales <span></span></h2>
        </div>
        <div class="body-login">
            <input type="text" name="usuario" id="" placeholder="Usuario">
            <input type="password" name="password" id="" placeholder="Password">
            <button id="btn-sub-login" class="btn-clasic" type="button">Ingreso</button>
            <hr>
        </div>
        <div class="footer-login">  
            <img src="./assets/img/ETB.svg" alt="">
            <p>&copy; 2023 - ETB(Empresa de Telecomunicaciones de Bogotá)</p>
        </div>
    </div>
    </form>

    <!-- Modales -->
    <div class="modal fade modal-loading" tabindex="-1" id="modal-loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">PROCESANDO TU PETICIÓN</h5>
                </div>
                <div class="modal-body">
                    <div class="con-spiner">
                        <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    </div>
                    <div class="text-spiner"><p>Por favor no cierres la ventana</p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-success-sim" tabindex="-1" id="modal-err">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ERROR</h5>
                    </div>
                    <div class="modal-body">
                        <p>INS001-El usuario y/o password no son validos, por favor verifiqueNo Such Object</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-modal-ps4error">ACEPTAR</button>
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
    </div>
    <!-- Modales -->
    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/login.js"></script>
    <script>
        habladorText('Usuario: Escueladigital   / Password: digital')
    </script>

    <?php
            if(isset($_SESSION['errorLogin'])){
                if($_SESSION['errorLogin']){
                    unset($_SESSION['errorLogin']);
                    ?>
                        <script>
                            credencialesErr();
                        </script>
                    <?php
                }
            }
    ?>
</body>
</html>