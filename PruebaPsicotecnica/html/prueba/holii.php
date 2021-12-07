<?php
    include '../../util/coneccion.php';

    $prueba_id = $_POST['prueba_id'];
    $id_pregunta = $_POST['id_pregunta'];
    $intento_max = "25";

    if (isset($_POST['guardar'])): 
        $respuesta = $_POST['flexRadioDefault'];
        echo ("-");
        echo $respuesta;
        echo ("-");
        echo $prueba_id;
        echo ("-");
        echo $id_pregunta;
        echo ("-");
        echo $intento_max;
        echo ("-");
        $sentencia = $bd->prepare("INSERT INTO respuestas (respuesta, id_pregunta, id_intento) VALUES (?, ?, ?);");
        $resultado = $sentencia->execute([$prueba_id, $id_pregunta, $intento_max]);
        echo "aaaaaaaaaaaa";
    
    else:
        echo "kajskasb";
    endif;
       
?>