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


//funcion de consultar preguntas
if (isset($_GET['accion']) == "preguntas") {
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



//guardamos la respuesta
if (isset($_GET['accion']) == "respuestas") {

    $respuesta = $_POST['respuesta'];
    $id_pregunta = $_POST['id_pregunta'];
    $id_intento;

    echo "llego aqui 1";
    //obtener id utlimo insertado en intento
    $sentenciaSQL = $bd->prepare("SELECT MAX(id_intento) as ultimo from intentos;");
    $sentenciaSQL->execute();
    $id_intento = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    $json = json_decode($id_intento);
    $id_intento = $json[0]->ultimo;
    
    
    echo "llego aqui 2";
    //insertar una respuesta
    $sentenciaSQL = $bd->prepare("INSERT INTO respuestas ( respuesta, id_pregunta, id_intento) VALUES ( :respuesta,:id_pregunta, :id_intento);");
    $sentenciaSQL->bindParam(':respuesta', $respuesta);
    $sentenciaSQL->bindParam(':id_pregunta', $id_pregunta);
    $sentenciaSQL->bindParam(':id_intento', $id_intento);
    $sentenciaSQL->execute();
    exit();
}


//Consultar la lista de empresas
$sentenciaSQL = $bd->prepare("Select * From empresa");
$sentenciaSQL->execute();
$listaEpresas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($listaEpresas);

?>