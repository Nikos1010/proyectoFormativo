<?php include_once '../util/coneccion.php';
$identificacion = $_POST["textIdentificacion"];
$nombre = $_POST["textNombre"];
$direccion = $_POST["textDireccion"];
$telefono = $_POST["textTelefono"];
$hijos = $_POST["textHijos"];
$genero = $_POST["textGenero"];
$estado_civil = $_POST["textEstadoC"];
$mascotas = $_POST["textMascotas"];
$escolaridad = $_POST["textEscolaridad"];

$sentencia = $bd->prepare("INSERT INTO candidato (identificacion,nombre,direccion,telefono,hijos,genero,estado_civil,mascotas,escolaridad) VALUES (?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$identificacion, $nombre, $direccion, $telefono, $hijos, $genero, $estado_civil, $mascotas, $escolaridad]);

if ($resultado) {
    header('Location: gestion_candidato.php');
}
