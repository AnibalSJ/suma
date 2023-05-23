<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];

if(isset($_POST['btn-login'])){
    if($usuario == 'etb' && $password == 'etb'){
        echo "<script>alert('Usuario correcta');window.location='index.php'</script>";
    }else{
            
        echo "<script>alert('Usuario o contraseña incorrecta');window.location='index.php'</script>";
    }
}