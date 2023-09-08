<?php
include('./DB/db.php');
include('seguridad.php');

$tipo_doc = $_POST['tipo_documento'];
$documento = $_POST['doc_soli'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
echo $_POST['doc_soli'];

var_dump($documento);
$update = "UPDATE solicitante SET tipo_documento = '$tipo_doc', documento_soli = '$documento', nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', celular = '$celular', email = '$email', direccion = '$direccion' WHERE documento_soli = '$documento'";
mysqli_query($db, $update);

$_SESSION['update'] = true;
$_SESSION['documento_soli'] = $documento; 
$_SESSION['nombre_solicitante'] = $nombre. " ". $apellido;
header("location:portal.php");


?>