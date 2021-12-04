<?php
if (!isset($_GET['codigo'])) {
    header('Location: ../gestion_empresa.php');
    exit();
}

include '../../util/coneccion.php';
$id_empresa = $_GET['codigo'];

$sentencia = $bd->prepare("DELETE FROM empresa where id_empresa= ?;");
$resultado = $sentencia->execute([$id_empresa]);

if ($resultado) {
    header('Location: ../gestion_empresa.php');
}
