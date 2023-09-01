<?php
session_start();
<<<<<<< HEAD
include('./DB/db.php');
=======
include('./DB/conexion.php');
>>>>>>> 7cbe31d2cdca01d1ca13f27306d4e2ac0aa48aa9

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$sql = "SELECT CONCAT(`nombre`, ' ', `apellido`) as nombre, email, documento, usuario_suma, pass FROM usuario WHERE usuario_suma = '$usuario' AND pass = '$password'";
$resultado = $db->query($sql);

if(mysqli_affected_rows($db) > 0){
    while($row = $resultado->fetch_assoc()){
        if($row['usuario_suma'] == $usuario && $row['pass'] == $password){
            $_SESSION['login'] = 1;
            $_SESSION['nombre'] = $row['nombre'];
        }else{
            $_SESSION['errorLogin'] = true;
            header('Location: ./index.php');
        }
    }
}else{
    $_SESSION['errorLogin'] = true;
    header('Location: ./index.php');
}
