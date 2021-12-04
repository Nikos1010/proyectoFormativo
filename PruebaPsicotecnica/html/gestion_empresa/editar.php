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

    <title>Editar Datos Empresa</title>
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
    $id_empresa = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from empresa where id_empresa= ?;");
    $sentencia->execute([$id_empresa]);
    $empresa = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($empresa);
    ?>

    <!-- Tabla -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-center">
                        Editar Datos Empresa
                    </div>
                    <form class="p-4" method="POST" action="editarProceso.php">
                        <div class="mb-3">
                            <label class="form-label">NIT:</label>
                            <input type="text" class="form-control" name="textNit" autofocus required value="<?php echo $empresa->nit; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre Empresa:</label>
                            <input type="text" class="form-control" name="textEmpresa" autofocus required value="<?php echo $empresa->empresa; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Representante Legal:</label>
                            <input type="text" class="form-control" name="textRepresentante" autofocus required value="<?php echo $empresa->representante; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion: </label>
                            <input type="text" class="form-control" name="textDireccion" autofocus required value="<?php echo $empresa->direccion; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono: </label>
                            <input type="text" class="form-control" name="textTelefono" autofocus required value="<?php echo $empresa->telefono; ?>">
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="codigo" value="<?php echo $empresa->id_empresa; ?>">
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