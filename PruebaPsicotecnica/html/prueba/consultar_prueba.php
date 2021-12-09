<!doctype html>
<html lang="es">

<?php include '../../html/head_htlm.php'; ?>

<body>

    <?php
    include '../../util/coneccion.php';

    $id_pregunta = "";
    $prueba_id;
    $intento_max;

    if (isset($_POST['buscar'])) {
        $prueba_id = $_POST['cbx'];
        $intento_max = $_POST['intento_max'];
        echo $intento_max;
        $sentencia = $bd->prepare("SELECT * FROM preguntas where id_prueba= ?");
        $sentencia->execute([$prueba_id]);
        $pregunta = $sentencia->fetchAll(PDO::FETCH_OBJ);
    ?>

        <!-- Preguntas -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">Preguntas - Respuestas</div>


                        <?php
                        $prueba_id_2 = $prueba_id;
                        $intento_max_2 = $prueba_id;
                        foreach ($pregunta as $dato) {
                            $id_pregunta = $dato->id_pregunta;
                        ?>

                            <form class="row g-3 p-4" method="post" action="holii.php" id='form1' name='form1'>

                                <div class="col-md-8 ">
                                    <label for="inputIdt4" class="form-label"><?php echo $dato->pregunta; ?></label>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?php echo $dato->opcion_a; ?>">
                                        <label class="form-check-label" for="flexRadioDefault1"><?php echo $dato->opcion_a; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?php echo $dato->opcion_b; ?>">
                                        <label class="form-check-label" for="flexRadioDefault2"><?php echo $dato->opcion_b; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?php echo $dato->opcion_c; ?>">
                                        <label class="form-check-label" for="flexRadioDefault3"><?php echo $dato->opcion_c; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?php echo $dato->opcion_d; ?>">
                                        <label class="form-check-label" for="flexRadioDefault4"><?php echo $dato->opcion_d; ?></label>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="btn-group ">
                                        <button type="button" class="btn btn-outline-primary" name="guardar" id="guardarbtn"> Save</button>
                                        <input type="hidden" name="prueba_id" id="cbx" value="<?php echo $prueba_id; ?>">
                                        <input type="hidden" name="id_pregunta" id="cbx1" value="<?php echo $id_pregunta; ?>">
                                        <input type="hidden" name="intento_max" id="cbx2" value="<?php echo $intento_max; ?>">

                                    </div>
                                </div>

                            </form>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>

        </div>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#guardarbtn').on('click', function(event) {
                    // using this page stop being refreshing 
                    event.preventDefault();

                    $.ajax({
                        type: "post",
                        url: "holii.php?action=",
                        data: $(this).serialize(),
                        success: function(data) {
                            alert($(this).serialize());
                        }
                    });

                });
            });
        </script>

    <?php

    }
    ?>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>