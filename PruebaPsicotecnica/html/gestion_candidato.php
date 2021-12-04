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
    <link rel="stylesheet" href="../css/style-ge.css">

    <title>Gestion Candidato</title>
</head>

<body>
    <!-- Menu Navegacion -->
    <?php include 'header.php' ?>

    <!-- Llamar base de datos -->
    <?php include_once "../util/coneccion.php";
    $sentencia = $bd->query("select * from candidato");
    $candidato = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($candidato);
    ?>

    <!-- Busqueda -->
    <div class="container mt-2">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ingrese Identificacion" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2">Buscar</button>
        </div>
    </div>

    <!-- Tabla -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-7">
                <div class="table-responsive-xxl">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Identificacion</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Hijos</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Estado Civil</th>
                                <th scope="col">Mascotas</th>
                                <th scope="col">Escolaridad</th>
                                <th scope="col" colspan="2">Modificar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-light">
                            <?php
                            foreach ($candidato as $dato) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $dato->identificacion; ?></th>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->direccion; ?></td>
                                    <td><?php echo $dato->telefono; ?></td>
                                    <td><?php echo $dato->hijos; ?></td>
                                    <td><?php echo $dato->genero; ?></td>
                                    <td><?php echo $dato->estado_civil; ?></td>
                                    <td><?php echo $dato->mascotas; ?></td>
                                    <td><?php echo $dato->escolaridad; ?></td>
                                    <td>
                                        <a href="gestion_candidato/editar.php?codigo= <?php echo $dato->id_candidato; ?>">
                                            <button class="btn btn-outline-primary" id="btn-editar">Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('¿Seguro que quiere eliminar esos datos?');" href="gestion_candidato/eliminar.php?codigo= <?php echo $dato->id_candidato; ?>">
                                            <button class="btn btn-outline-danger">Eliminar</button>
                                        </a>
                                    </td>
                                <?php
                            }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Formulario Agregar -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">
                        Agregar Candidato
                    </div>
                    <form class="p-4" method="POST" action="registrar.php">
                        <div class="mb-3">
                            <label class="form-label">Identificacion:</label>
                            <input type="text" class="form-control" name="textIdentificacion" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="textNombre" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion: </label>
                            <input type="text" class="form-control" name="textDireccion" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono: </label>
                            <input type="text" class="form-control" name="textTelefono" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hijos: </label>
                            <input type="number" class="form-control" name="textHijos" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Genero: </label>
                            <input type="text" class="form-control" name="textGenero" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Estado civil: </label>
                            <input type="text" class="form-control" name="textEstadoC" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mascotas: </label>
                            <input type="number" class="form-control" name="textMascotas" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Escolaridad: </label>
                            <input type="text" class="form-control" name="textEscolaridad" autofocus required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-outline-primary" value="Agregar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/EditTitleModal.js"></script>
</body>

</html>