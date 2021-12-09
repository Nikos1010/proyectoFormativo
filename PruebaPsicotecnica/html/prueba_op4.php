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

    <!-- Titulo -->
    <h1>Candidatos que presentaron la prueba</h1>

    <!-- Llamar base de datos -->
    <?php include_once "../util/coneccion.php";
    $sentencia = $bd->query("SELECT * FROM prueba INNER JOIN empresa ON prueba.id_empresa = empresa.id_empresa INNER JOIN intentos ON prueba.id_prueba = intentos.id_prueba INNER JOIN candidato ON intentos.id_candidato = candidato.id_candidato;");
    $prueba = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($prueba);
    ?>

    <!-- Tabla -->
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha de fin</th>
                        <th scope="col">Identifiacion</th>
                        <th scope="col">Candidato</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Cargo</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <?php
                    foreach ($prueba as $dato) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $dato->id_prueba; ?></th>
                            <td><?php echo $dato->fecha_inicio; ?></td>
                            <td><?php echo $dato->fecha_final; ?></td>
                            <td><?php echo $dato->identificacion;?></td>
                            <td><?php echo $dato->nombre; ?></td>
                            <td><?php echo $dato->empresa; ?></td>
                            <td><?php echo $dato->cargo; ?></td>
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