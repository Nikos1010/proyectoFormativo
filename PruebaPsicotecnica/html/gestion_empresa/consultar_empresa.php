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

    <title>Empresa Encontrada</title>
</head>

<body>
    <!-- Menu Navegacion -->
    <nav class="navbar navbar-expand-md navbar-fixed-top navbar-dark bg-dark main-nav">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Prueba Psicotecnica
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../prueba_op1.php">Numero de pruebas presentada por cada candidato</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../prueba_op2.php">Mostrar preguntas y opciones de respuesta</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../prueba_op3.php">Agregar respuestas del candidato</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../prueba_op4.php">Candidatos que presentaron la prueba</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../prueba_op5.php">Consulta preguntas-respuestas de una prueba del
                                candidato</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="../gestion_empresa.php">Gestion Empresa</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../gestion_candidato.php">Gestion Candidato</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    include '../../util/coneccion.php';
    $nit = $_POST['codigo'];

    $sentencia = $bd->prepare("SELECT * FROM empresa where nit = ?");
    $resultado = $sentencia->execute([$nit]);
    $empresa = $sentencia->fetchAll(PDO::FETCH_OBJ);

    if (!$resultado) {
        header('Location: ../gestion_empresa.php');
    }
    ?>

    <!-- Tabla -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                        <a href="editar.php?codigo= <?php echo $dato->id_empresa; ?>">
                                            <button class="btn btn-outline-primary" id="btn-editar">Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('¿Seguro que quiere eliminar esos datos?');" href="eliminar.php?codigo= <?php echo $dato->id_empresa; ?>">
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
        </div>
    </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/EditTitleModal.js"></script>
</body>

</html>