<?php include '../util/coneccion.php' ?>
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
    <link rel="stylesheet" href="../css/style-op3.css">

    <title>Prueba</title>
</head>

<body>
    <!-- Menu Navegacion -->
    <?php include 'header.php';
    $candidato_id = "";
    $prueba_id;
    $intento_max = "";
    $e1 = 0;
    ?>

    <!-- Contenedor Escoger -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        Agregar respuesta candidato
                    </div>
                    <!-- Escoger usuario y empresa -->
                    <form class="row g-3 p-4" method="POST" action="prueba/consultar_prueba.php">
                        <div class="col-md-10">
                            <label class="form-label">Identificacion</label>
                            <input type="text" class="form-control mb-3" name="buscador" placeholder="Ingrese Identificacion" autofocus>

                            <div class="row">
                                <div class="col-md-8">
                                    <!-- Consultar candidato -->
                                    <?php
                                    if (isset($_POST['buscar'])) {
                                        $busqueda = $_POST['buscador'];

                                        $consulta = $bd->query("SELECT * FROM candidato where  identificacion= '$busqueda'");

                                        while ($row = $consulta->fetch()) {
                                    ?>
                                            <fieldset disabled>
                                                <div class="col-md-12 mb-3">
                                                    <label for="inputNombre4" class="form-label ">Nombre</label>
                                                    <input type="hidden" name="codigo" value="<?php $candidato_id = $row['id_candidato']; ?>">
                                                    <input type="text" class="form-control" id="inputNombre4" value="<?php echo $row['nombre']; ?>">
                                                </div>
                                            </fieldset>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Empresa</label>
                                    <div class="dropdown">
                                        <select class="btn btn-secondary dropdown-toggle" name="cbx" id="cbx">
                                            <option value="0">Seleccionar Empresa</option>
                                            <?php
                                            $consulta = $bd->query("SELECT id_prueba, empresa FROM empresa INNER JOIN prueba ON empresa.id_empresa = prueba.id_empresa;");
                                            while ($row = $consulta->fetch()) {
                                            ?>
                                                <option value="<?php echo $row['id_prueba']; ?>"><?php echo $row['empresa']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <?php
                                    if (isset($_POST['buscar'])) {
                                        $prueba_id = $_REQUEST['cbx'];

                                        $sentencia = $bd->prepare("INSERT INTO intentos (id_candidato,id_prueba) VALUES (?,?);");
                                        $resultado = $sentencia->execute([$candidato_id, $prueba_id]);
                                        $consulta = $bd->query("SELECT max(id_intento) AS id_intento FROM intentos");

                                        while ($row = $consulta->fetch()) {
                                            $intento_max = $row['id_intento'];
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="intento_max" id="cbx" value="<?php echo $intento_max; ?>">
                                    
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="btn-group ">
                                    <button type="submit" class="btn btn-outline-danger me-4">Limpiar</button>
                                    <button type="submit" class="btn btn-outline-primary" name="buscar">Consultar</button> 
                                </div>
                            </div>
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