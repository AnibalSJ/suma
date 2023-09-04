<?php

include('DB/db.php');
$doc_type  = $_POST['doc_type'];
$num_doc = $_POST['num_doc'];
$num_conex = $_POST['num_conex'];
$cuenta_fact = $_POST['cuenta_fact'];
$id_serv = $_POST['id_serv'];
$num_orden = $_POST['num_orden'];

$mostrarSeccion = false;

$sql = mysqli_query($db,"SELECT * FROM usuario WHERE tipo_documento = '$doc_type' && documento = '$num_doc' || telefono_fijo = '$num_conex'");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // $nr = mysqli_num_rows($sql);
    $mostrarSeccion = true;
    echo "<script>alert('Usuario');window.location='portal.php'</script>";
    // header("Location: portal.php");

}else{
    echo "<script>alert('Usuario no creado');window.location='portal.php'</script>";
}
header("Location: portal.php");
exit();

?>