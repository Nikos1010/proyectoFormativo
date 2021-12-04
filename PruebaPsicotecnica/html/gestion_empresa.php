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
    <link rel="stylesheet" href="../css/style-ge.css">

    <title>Gestion Empresa</title>
</head>

<body>
    <!-- Menu Navegacion -->
    <?php include 'header.php' ?>

    <!-- Llamar base de datos -->
    <?php include_once "../util/coneccion.php";
    $sentencia = $bd->query("select * from empresa");
    $empresa = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($empresa);
    ?>

    <!-- Busqueda -->
    <div class="container mt-2">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ingrese NIT" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2">Buscar</button>
        </div>
    </div>

    <!-- Tabla -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-7">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NIT</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Representante Legal</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col" colspan="2">Modificar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-light">
                            <?php
                            foreach ($empresa as $dato) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $dato->nit; ?></th>
                                    <td><?php echo $dato->empresa; ?></td>
                                    <td><?php echo $dato->representante; ?></td>
                                    <td><?php echo $dato->direccion; ?></td>
                                    <td><?php echo $dato->telefono; ?></td>
                                    <td>
                                        <a href="gestion_empresa/editar.php?codigo= <?php echo $dato->id_empresa; ?>">
                                            <button class="btn btn-outline-primary" id="btn-editar">Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('¿Seguro que quiere eliminar esos datos?');" href="gestion_empresa/eliminar.php?codigo= <?php echo $dato->id_empresa; ?>">
                                            <button class="btn btn-outline-danger">Eliminar</button>
                                        </a>
                                    </td>
                                </tr>
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
                        Agregar Empresa
                    </div>
                    <form class="p-4" method="POST" action="registrar_empresa.php">
                        <div class="mb-3">
                            <label class="form-label">NIT:</label>
                            <input type="text" class="form-control" name="textNit" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre Empresa:</label>
                            <input type="text" class="form-control" name="textEmpresa" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Representante Legal:</label>
                            <input type="text" class="form-control" name="textRepresentante" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion: </label>
                            <input type="text" class="form-control" name="textDireccion" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono: </label>
                            <input type="text" class="form-control" name="textTelefono" autofocus required>
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
</body>

</html>