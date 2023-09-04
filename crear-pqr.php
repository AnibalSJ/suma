<?php
include('./DB/db.php');

$clase = $_POST['clase'];
$motivo = $_POST['motivo'];
$relacion = $_POST['relacion'];
$producto = $_POST['producto'];
$causal = $_POST['causal'];
$sintoma = $_POST['sintoma'];
$descripcion = $_POST['descripcion'];
$solicitante = $_POST['solicitante'];

$pqr = mysqli_query($db, "SELECT P.id FROM pqr P INNER JOIN solicitante S WHERE P.id_Solicitante = S.id_solicitante");
$resultado_pqr = 0;

if($pqr->num_rows > 0){
    while($row = $pqr->fetch_assoc()){
        $resultado_pqr = $row['id'];
    }
}

$sql = "INSERT INTO detalle_pqr VALUES ('','$resultado_pqr','$clase', '$motivo', '$relacion','$producto', '$causal', '$sintoma', '$descripcion', '$solicitante')";
$resultado = $db->query($sql);
header('Location: pqr.php');