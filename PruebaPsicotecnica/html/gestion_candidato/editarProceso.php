<?php
include '../../util/coneccion.php';
$id_candidato = $_POST['codigo'];
$identificacion = $_POST["textIdentificacion"];
$nombre = $_POST["textNombre"];
$direccion = $_POST["textDireccion"];
$telefono = $_POST["textTelefono"];
$hijos = $_POST["textHijos"];
$genero = $_POST["textGenero"];
$estado_civil = $_POST["textEstadoC"];
$mascotas = $_POST["textMascotas"];
$escolaridad = $_POST["textEscolaridad"];

$sentencia = $bd->prepare("UPDATE candidato SET identificacion = ?, nombre = ?, direccion = ?, telefono = ?, hijos = ?, genero = ?, estado_civil = ?, mascotas = ?, escolaridad = ? where id_candidato = ?;");
$resultado = $sentencia->execute([$identificacion, $nombre, $direccion, $telefono, $hijos, $genero, $estado_civil, $mascotas, $escolaridad, $id_candidato]);

if ($resultado) {
    header('Location: ../gestion_candidato.php');
}
