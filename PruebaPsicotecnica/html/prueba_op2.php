<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Mi estilo CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-op1.css">

    <title>Prueba</title>
</head>

<body>
    <!-- Menu Navegacion -->
    <?php include 'header.php' ?>

    <!-- Llamar base de datos -->
    <?php include_once "../util/coneccion.php";
    $sentencia = $bd->query("SELECT prueba.id_prueba, prueba.cargo, preguntas.numero, preguntas.pregunta, preguntas.opcion_a, preguntas.opcion_b, preguntas.opcion_c, preguntas.opcion_d FROM prueba INNER JOIN preguntas ON prueba.id_prueba = preguntas.id_prueba;");
    $prueba = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($prueba);
    ?>

    <!-- Titulo -->
    <h1>Pregunta y opciones de respuesta</h1>

    <!-- Tabla -->
    <div class="container">
        <div class="table-responsive ">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Pregunta</th>
                        <th scope="col">A</th>
                        <th scope="col">B</th>
                        <th scope="col">C</th>
                        <th scope="col">D</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <?php
                    foreach ($prueba as $dato) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $dato->numero; ?></th>
                            <td><?php echo $dato->cargo; ?></td>
                            <td><?php echo $dato->pregunta; ?></td>
                            <td><?php echo $dato->opcion_a; ?></td>
                            <td><?php echo $dato->opcion_b; ?></td>
                            <td><?php echo $dato->opcion_c; ?></td>
                            <td><?php echo $dato->opcion_d; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>