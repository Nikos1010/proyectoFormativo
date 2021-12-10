<?php include '../util/coneccion.php' ?>
<?php

//funcion de consultar preguntas
if (isset($_GET['accion']) == "preguntas") {

    if (!is_null($_POST["id_prueba"]) && !is_null($_POST["id_candidato"])) {
        $id_prueba = $_POST["id_prueba"];
        $id_candidato = $_POST["id_candidato"];

        //Crear un nuevo intento
        $sentenciaSQL = $bd->prepare("INSERT INTO intentos (id_candidato, id_prueba) VALUES (:id_candidato,:id_prueba);");
        $sentenciaSQL->bindParam(':id_candidato', $id_candidato);
        $sentenciaSQL->bindParam(':id_prueba', $id_prueba);
        $sentenciaSQL->execute();

        //consultar la lista de las preguntas de la prueba
        $sentenciaSQL2 = $bd->prepare("SELECT * FROM preguntas WHERE id_prueba =" . $id_prueba);
        $sentenciaSQL2->execute();
        $listaPreguntas = $sentenciaSQL2->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($listaPreguntas);
        exit();
    }
}

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

?>