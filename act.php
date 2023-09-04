<?php
    include('DB/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<form action="update.php" class="editar-contact" method = "GET">
                        <?php
                            $doc_solicitante = isset($_GET['documento_soli']) ? $_GET['documento_soli'] : "";
                            $sql_soli = mysqli_query($db, "SELECT solicitante.id_solicitante, solicitante.tipo_documento, solicitante.documento_soli, solicitante.nombre, solicitante.apellido, solicitante.telefono, solicitante.celular, solicitante.email, solicitante.direccion FROM solicitante INNER JOIN pqr ON pqr.id_solicitante = solicitante.id_solicitante WHERE solicitante.documento_soli = '$doc_solicitante'");
                            $row_soli = mysqli_fetch_array($sql_soli);
                            if(isset($_GET['estado'])){
                                if($_GET['estado'] == 1){
                                    ?>
                                    <script>
                                        $( document ).ready(function() {
                                            $('#modal-actualizar').modal('toggle')
                                        });
                                    </script>
                                    <?php
                                }else{
                                    echo "No";
                                }
                            }
                        ?>
                        <div class="mb-3">
                            <label for="" class="form-label">Tipo Documento</label>
                            <span class="select-relacion">
                                <select name="tipo_documento" id="">
                                    <option value="<?php echo $row_soli['tipo_documento']?>"><?php echo $row_soli['tipo_documento']?></option>
                                </select>
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" name="documento_soli" disavled id="" value="<?php echo $row_soli['documento_soli']?>">
                        </div>

                        <div class="mb-3">
                        <label for="" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="nombre" id="" value="<?php echo $row_soli['nombre']?>">
                        </div>

                        <div class="mb-3">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="" value="<?php echo $row_soli['apellido']?>">
                        </div>

                        <div class="mb-3">
                        <label for="" class="form-label">Teléfono Fijo</label>
                        <input type="text" class="form-control" name="telefono" id="" value="<?php echo $row_soli['telefono']?>">
                        </div>

                        <div class="mb-3">
                        <label for="" class="form-label">Celular</label>
                        <input type="text" class="form-control" name="celular" id="" value="<?php echo $row_soli['celular']?>">
                        </div>

                        <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="" value="<?php echo $row_soli['email']?>">
                        </div>
                        
                        <div class="mb-3">
                        <label for="" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="" value="<?php echo $row_soli['direccion']?>">
                        </div>

                        <div class="mb-3">
                        <label for="" class="autorizacion form-label">Autoriza el manejo de datos personales</label>
                        <span class="select-relacion">
                            <select name="" id="">
                                <option value="">Seleccione una opción</option>
                            </select>
                        </span>
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                            <button type="button" class="btn btn-secondary btn-cancelar" data-bs-toggle="modal" data-bs-target="#modal-actualizar" >Cancelar</button>
                        </div>
                    </form>


    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>