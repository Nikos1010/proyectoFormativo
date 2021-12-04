<!doctype html>
<html lang="es">

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
    <?php include '../html/header.php' ?>

    <!-- Llamar base de datos -->
    <?php include_once "../util/coneccion.php";
    $sentencia = $bd->query("select candidato.identificacion, candidato.nombre, COUNT(candidato.identificacion) AS numero_pruebas from candidato INNER JOIN intentos ON candidato.id_candidato = intentos.id_candidato
GROUP BY candidato.identificacion;");
    $candidato = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($candidato);
    ?>

    <!-- Titulo -->
    <h1>Cantidad de Pruebas presentadas por candidato</h1>

    <!-- Tabla -->
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Numero de Prueba</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <?php
                    foreach ($candidato as $dato) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $dato->identificacion; ?></th>
                            <td><?php echo $dato->nombre; ?></td>
                            <td><?php echo $dato->numero_pruebas ?> </td>
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