<?php include '../util/coneccion.php' ?>
<?php

//Seleccionar candidato
if (isset($_GET["consultarCandidato"])) {
    $id = $_GET["consultarCandidato"];

    $sentenciaSQL = $bd->prepare("SELECT * FROM candidato WHERE identificacion =" . $id);
    $sentenciaSQL->execute();
    $listaCandidato = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($listaCandidato);
    exit();
}

//Consultar la lista de empresas
$sentenciaSQL = $bd->prepare("Select * From empresa");
$sentenciaSQL->execute();
$listaEpresas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($listaEpresas);
exit();


//mostar preguntas
if (isset($_GET['accion']) == "consultarPreguntas") {

    $id_prueba = $_GET["id_prueba"];
    echo "ingreso a la consulta";

    //consultar la lista de las preguntas de la prueba
    $sentenciaSQL = $bd->prepare("SELECT * FROM preguntas WHERE id_prueba =" . $id_prueba);
    $sentenciaSQL->bindParam(':id_prueba', $id_prueba);
    $sentenciaSQL->execute();
    $listaPreguntas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($listaPreguntas);
    exit();
}


if (isset($_GET['accion']) == "guardarRespuesta") {
    //crear un intento
    $sentenciaSQL = $bd->prepare("INSERT INTO intentos (id_candidato, id_pregunta) VALUES (:id_candiadto,:id_prueba);");
    $sentenciaSQL->bindParam(':id_candidato', $id_candidato);
    $sentenciaSQL->bindParam(':id_prueba', $id_prueba);
    $sentenciaSQL->execute();

    //obtener id utlimo inserdado en intento
    $sentenciaSQL = $bd->prepare("SELECT MAX(id_intento) from intentos;");
    $sentenciaSQL->execute();
    $id_intento = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    exit();
}

?>