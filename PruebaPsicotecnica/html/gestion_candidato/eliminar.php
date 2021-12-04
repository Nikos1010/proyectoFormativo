<?php
if (!isset($_GET['codigo'])) {
    header('Location: ../gestion_candidato.php');
    exit();
}

include '../../util/coneccion.php';
$id_candidato = $_GET['codigo'];

$sentencia = $bd->prepare("DELETE FROM candidato where id_candidato = ?;");
$resultado = $sentencia->execute([$id_candidato]);

if ($resultado) {
    header('Location: ../gestion_candidato.php');
}
