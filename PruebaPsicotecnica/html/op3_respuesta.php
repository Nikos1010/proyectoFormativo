<?php include '../util/coneccion.php' ?>
<?php
//guardamos la respuesta
if (isset($_GET['accion']) == "respuestas") {

    $respuesta = $_POST['respuesta'];
    $id_pregunta = $_POST['id_pregunta'];
    $id_intento;

    //obtener id utlimo insertado en intento
    $sentenciaSQL = $bd->query("SELECT MAX(id_intento) as ultimo from intentos;");
    
    while ($row = $sentenciaSQL->fetch()) {
        $sentenciaSQL = $bd->prepare("INSERT INTO respuestas ( respuesta, id_pregunta, id_intento) VALUES ( :respuesta,:id_pregunta, :id_intento);");
        $sentenciaSQL->bindParam(':respuesta', $respuesta);
        $sentenciaSQL->bindParam(':id_pregunta', $id_pregunta);
        $sentenciaSQL->bindParam(':id_intento',$row['ultimo']);
        $sentenciaSQL->execute();
    }
    exit();
}
?>