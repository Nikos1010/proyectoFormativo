<!doctype html>
<html lang="en">

<?php include 'head_htlm.php'; ?>

<body>
    <!-- Menu Navegacion -->
    <?php include 'header.php';
    $candidato_id;
    $intento_id;
    ?>

    <!-- Llamar base de datos
    <?php include_once "../util/coneccion.php";
    $sentencia = $bd->query("SELECT candidato.nombre, prueba.id_prueba, preguntas.numero, preguntas.pregunta, respuestas.respuesta FROM preguntas INNER JOIN prueba ON preguntas.id_prueba = prueba.id_prueba INNER JOIN respuestas ON preguntas.id_pregunta = respuestas.id_respuesta INNER JOIN intentos ON prueba.id_prueba = intentos.id_prueba INNER JOIN candidato ON intentos.id_candidato = candidato.id_candidato");
    $pregunta = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($pregunta);
    ?> -->

    <h1>Preguntas - Respuestas de un candidato</h1>

    <!-- Busqueda -->
    <div class="container">
        <form class="row g-3 mb-3" method="POST" action="">
            <!-- Pedir Identificacion -->
            <div class="col-md-6 mb-2">
                <input type="text" id="inputIdentificacion" class="form-control " name="buscador" placeholder="Ingrese Identificacion" autofocus>
            </div>

            <!-- Nombre Candidato -->
            <div class="col-md-6">
                <!-- Consultar candidato -->
                <?php
                if (isset($_POST['buscar'])) {
                    $busqueda = $_POST['buscador'];

                    $consulta = $bd->query("SELECT * FROM candidato where  identificacion= '$busqueda'");

                    while ($row = $consulta->fetch()) {
                ?>
                        <fieldset disabled>
                            <div class="col-md-12 mb-3">
                                <input type="hidden" name="codigo" value="<?php $candidato_id = $row['id_candidato']; ?>">
                                <input type="text" class="form-control" id="inputNombre4" value="<?php echo $row['nombre']; ?>">
                            </div>
                        </fieldset>
                <?php
                    }
                }
                ?>
            </div>

            <div class="row">
                <!-- Elegir Intento -->
                <div class="col-md-3 ">
                    <div class="dropdown">

                        <select class="btn btn-secondary dropdown-toggle" name="cbx_i" id="cbx_i">

                            <option value="0">Seleccionar Intento
                            </option>
                            <?php

                            $consulta = $bd->query("SELECT id_intento FROM intentos INNER JOIN candidato ON intentos.id_candidato = candidato.id_candidato WHERE candidato.id_candidato= '$candidato_id'; ");
                            while ($row = $consulta->fetch()) {
                            ?>
                                <option value="<?php echo $row['id_intento']; ?>"><?php echo $row['id_intento']; ?></option>
                            <?php
                            }
                            ?>

                            <?php if (isset($_POST['buscar'])) {
                                $intento_id = $_REQUEST['cbx_i'];
                            }

                            ?>
                        </select>
                    </div>
                </div>

                <!-- Boton Busqueda -->
                <div class="col-md-3">
                    <div class="btn-group ">
                        <input type="submit" class="btn btn-outline-primary" name="buscar" value="Consultar">
                    </div>
                </div>
        </form>
    </div>
    <?php
    if (isset($_POST['buscar'])) {
        $sentencia = $bd->query("SELECT candidato.nombre, prueba.id_prueba, preguntas.numero, preguntas.pregunta, respuestas.respuesta FROM candidato INNER JOIN intentos ON candidato.id_candidato = intentos.id_candidato INNER JOIN respuestas ON intentos.id_intento = respuestas.id_intento INNER JOIN preguntas ON respuestas.id_pregunta = preguntas.id_pregunta INNER JOIN prueba ON preguntas.id_prueba = prueba.id_prueba WHERE candidato.id_candidato = '$candidato_id' AND intentos.id_intento = '$intento_id';");
        $pregunta = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    ?>
    <!-- Tabla -->
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Pregunta</th>
                        <th scope="col">Respuesta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['buscar'])) {
                        foreach ($pregunta as $dato) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $dato->numero; ?></th>
                                <td><?php echo $dato->pregunta; ?></td>
                                <td><?php echo $dato->respuesta; ?></td>
                            </tr>
                    <?php
                        }
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