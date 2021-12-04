<?php
include '../../util/coneccion.php';
$id_empresa = $_POST['codigo'];
$nit = $_POST["textNit"];
$empresa = $_POST["textEmpresa"];
$representante = $_POST["textRepresentante"];
$direccion = $_POST["textDireccion"];
$telefono = $_POST["textTelefono"];

$sentencia = $bd->prepare("UPDATE empresa SET nit = ?, empresa = ?, representante = ?, direccion = ?, telefono = ? where id_empresa = ?;");
$resultado = $sentencia->execute([$nit, $empresa, $representante, $direccion, $telefono, $id_empresa]);

if ($resultado) {
    header('Location: ../gestion_empresa.php');
}
