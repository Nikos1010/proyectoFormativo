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

    <title>Editar Datos Candidato</title>
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

    <!-- Traer datos -->
    <?php include_once '../../util/coneccion.php';
    $id_candidato = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from candidato where id_candidato= ?;");
    $sentencia->execute([$id_candidato]);
    $candidato = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($candidato);
    ?>

    <!-- Tabla -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-center">
                        Editar Datos Candidato
                    </div>
                    <form class="p-4" method="POST" action="editarProceso.php">
                        <div class="mb-3">
                            <label class="form-label">Identificacion:</label>
                            <input type="text" class="form-control" name="textIdentificacion" autofocus required value="<?php echo $candidato->identificacion; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="textNombre" autofocus required value="<?php echo $candidato->nombre; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion: </label>
                            <input type="text" class="form-control" name="textDireccion" autofocus required value="<?php echo $candidato->direccion; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono: </label>
                            <input type="text" class="form-control" name="textTelefono" autofocus required value="<?php echo $candidato->telefono; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hijos: </label>
                            <input type="number" class="form-control" name="textHijos" autofocus required value="<?php echo $candidato->hijos; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Genero: </label>
                            <input type="text" class="form-control" name="textGenero" autofocus required value="<?php echo $candidato->genero; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Estado civil: </label>
                            <input type="text" class="form-control" name="textEstadoC" autofocus required value="<?php echo $candidato->estado_civil; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mascotas: </label>
                            <input type="number" class="form-control" name="textMascotas" autofocus required value="<?php echo $candidato->mascotas; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Escolaridad: </label>
                            <input type="text" class="form-control" name="textEscolaridad" autofocus required value="<?php echo $candidato->escolaridad; ?>">
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="codigo" value="<?php echo $candidato->id_candidato; ?>">
                            <input type="submit" class="btn btn-outline-primary" value="Editar">
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