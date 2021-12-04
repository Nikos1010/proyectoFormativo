<?php include_once '../util/coneccion.php';
$nit = $_POST["textNit"];
$empresa = $_POST["textEmpresa"];
$representante = $_POST["textRepresentante"];
$direccion = $_POST["textDireccion"];
$telefono = $_POST["textTelefono"];

$sentencia = $bd->prepare("INSERT INTO empresa (nit,empresa,representante,direccion,telefono) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$nit, $empresa, $representante, $direccion, $telefono]);

if ($resultado) {
    header('Location: gestion_empresa.php');
}
