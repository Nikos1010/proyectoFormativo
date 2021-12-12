<!doctype html>
<html lang="es">

<?php include '../html/head_htlm.php'; ?>

<body>
    <!-- Menu Navegacion -->
    <?php include 'header.php'; ?>

    <!-- Contenedor Escoger -->
    <div class="container mt-4">
        <div class="row">

            <!-- column y la card -->
            <div class="col-12">
                <div class="card">

                    <!-- card head -->
                    <div class="card-header text-center">
                        Agregar respuesta candidato
                    </div>

                    <!-- formulario -->
                    <div class="card-body">
                        <form action="" method="post">

                            <!-- buscar candidato -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="txtID" class="form-label">Identificacion</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="nameTxtId" id="idTxtId" placeholder="Ingrese Identificacion">
                                        <button class="btn btn-outline-secondary" type="button" id="idBtnBuscar">Buscar</button>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="forTxtCandito" class="form-label">Nombre Candidato</label>
                                    <input type="text" readonly class="form-control  mb-3" name="nameTxtCandito" id="idTxtCandidato" placeholder="Candidato">
                                    <input type="hidden" name="codigo" id="idLblCandidato" value="">
                                </div>
                            </div>


                            <!-- Seleecioanr empresa -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Empresa</label>
                                    <div class="dropdown">
                                        <select class="form-select" name="nameCboxEmpresa" id="idCboxEmpresa">
                                            <option value="0">Seleccionar Empresa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="forTxtNumPrueba" class="form-label">Numero Prueba</label>
                                    <input type="number" readonly class="form-control  mb-3" name="nameTxtNumPrueba" id="idNumPrueba" placeholder="Numero de la Prueba" value="0">
                                </div>
                            </div>

                            <!-- botones -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="submit" class="btn btn-danger" id="idBtnLimpiar">Limpiar</button>
                                        <button type="button" class="btn btn-success" id="idBtnConsultar">Consultar</button>
                                        <input type="hidden" name="codigo" id="idNumPregunta" value="0">
                                        <input type="hidden" name="codigo" id="idUltimoIntento" value="0">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Contenedor Escoger -->
            <div class="container mt-4" id="idPreguntas">

            </div>


        </div>
    </div>

    <script>
        //Action button buscar candidato
        $('#idBtnBuscar').click(function(e) {
            consultarCandidato();
        });

        //tomar y poner el value de una seleccion de un combobox
        $("#idCboxEmpresa").change(function() {
            $('#idNumPrueba').val($("#idCboxEmpresa").val());
            $("#idPreguntas").empty();
            document.getElementById('idNumPregunta').setAttribute('value', 0);
        });

        //Action button buscar preguntas
        $('#idBtnConsultar').click(function(e) {
            consultarPreguntas();
        });


        //insertar la respues del candidato <<<<<<<<<<
        function guardarRespuesta() {
            var datos = new FormData();

            datos.append('respuesta', $("input[name='nameRespuesta']:checked").val());
            datos.append('id_pregunta', $('#idHeadCard').val());

            console.log(datos.get("respuesta"));
            console.log(datos.get("id_pregunta"));

            $.ajax({
                type: "post",
                url: "op3_respuesta.php?accion=respuestas",
                data: datos,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert("Se guardo la respuesta: < " + datos.get("respuesta") + " > de la pregunta: < " + datos.get("id_pregunta") + " >");
                }
            });
            $("#idPreguntas").empty();
            consultarPreguntas();
        }

        //consultar candidato
        function consultarCandidato() {
            var datos = new FormData();

            datos.append('id', $('#idTxtId').val());

            $.getJSON("op3_consultas.php?consultarCandidato=" + datos.get('id'), function(registros) {
                $('#idTxtCandidato').val(registros[0]['nombre']);
                document.getElementById('idLblCandidato').setAttribute('value', registros[0]['id_candidato']);
            });
        }

        //muestra la lista de empresas cuando carga la pagina
        consultarListaEmpresas();


        //funcion para desplegar las empresas actuales
        function consultarListaEmpresas() {
            //get cosulta y ponerlos en la tabla
            $.getJSON("op3_consultas.php", function(registros) {
                var empresas = [];
                $.each(registros, function(llave, valor) {

                    if (llave => 0) {
                        var template;
                        template = '<option value="' + valor.id_empresa + '">' + valor.empresa + "</option>";
                        empresas.push(template);
                    };
                });

                $("#idCboxEmpresa").append(empresas.join(""));
            });
        }


        //funcion consultar las preguntas
        function consultarPreguntas() {

            var datos = new FormData();
            datos.append('id_prueba', $('#idNumPrueba').val());
            datos.append('id_candidato', $('#idLblCandidato').val());
            datos.append('numPregunta', $('#idNumPregunta').val());
            datos.append('id_intento', $('#idUltimoIntento').val());

            $.ajax({
                type: "post",
                url: "op3_consultas.php?accion=preguntas",
                data: datos,
                processData: false,
                contentType: false,
                success: function(response) {
                    var preguntas = [];

                    // $.each(JSON.parse(response), function(llave, valor) {
                    var array = JSON.parse(response);
                    var numPregunta = datos.get('numPregunta');

                    if (numPregunta < array.length) {

                        var template = ' <div class="row">';
                        template += "<!-- column de la card -->";
                        template += ' <div class="col-12">';
                        template += ' <div class="card">';
                        template += "";
                        template += "   <!-- card head -->";
                        template += '   <div class="card-header text-center"> ';
                        template += '     Pregunta ' + array[numPregunta]["numero"];
                        template += "    </div>";
                        template += '  <input type="hidden" name="codigo" id="idHeadCard" value="' + array[numPregunta]["id_pregunta"] + '">';
                        template += "";
                        template += "   <!-- formulario -->";
                        template += '   <div class="card-body" id="idPreguntas">';
                        template += '   <form action="" method="post"> ';
                        template += '';
                        template += '   <div class="row"> ';
                        template += '       <div class="col-12">';
                        template += '            <label for="inputIdt4" id="idLblPregunta" class="form-label">' + array[numPregunta]["pregunta"] + "</label>";
                        template += "        </div>";
                        template += "    </div>";
                        template += '';
                        template += '  <fieldset class="row mb-3">';
                        template += '      <div class="col-sm-12">';
                        template += '            <div class="form-check">';
                        template += '               <input class="form-check-input" type="radio" name="nameRespuesta" id="idRdOp1" value="' + array[numPregunta]["opcion_a"] + '">';
                        template += '               <label class="form-check-label" for="gridRadios1">' + array[numPregunta]["opcion_a"] + "</label>";
                        template += "          </div>";
                        template += '            <div class="form-check">';
                        template += '               <input class="form-check-input" type="radio" name="nameRespuesta" id="idRdOp2" value="' + array[numPregunta]["opcion_b"] + '">';
                        template += '               <label class="form-check-label" for="gridRadios2">' + array[numPregunta]["opcion_b"] + "</label>";
                        template += "          </div>";
                        template += '           <div class="form-check">';
                        template += '              <input class="form-check-input" type="radio" name="nameRespuesta" id="idRdOp3" value="' + array[numPregunta]["opcion_c"] + '">';
                        template += '                 <label class="form-check-label" for="gridRadios2">' + array[numPregunta]["opcion_c"] + "</label>";
                        template += "          </div>";
                        template += '             <div class="form-check">';
                        template += '                 <input class="form-check-input" type="radio" name="nameRespuesta" id="idRdOp4" value="' + array[numPregunta]["opcion_d"] + '">';
                        template += '                 <label class="form-check-label" for="gridRadios2">' + array[numPregunta]["opcion_d"] + "</label>";
                        template += "          </div>";
                        template += "       </div>";
                        template += '     </fieldset>';
                        template += '';
                        template += '     <div class="col-md-5">';
                        template += '        <div class="btn-group ">';
                        template += '             <button type="button" class="btn btn-success" onclick="guardarRespuesta()" id="idBtnGuardar">Guardar</button>';
                        template += "      </div>";
                        template += "    </div>";
                        template += "</form>";
                        template += " </div>";
                        template += "  </div>";
                        template += " </div>";
                        template += " </div>";


                        var numActal = datos.get('numPregunta');
                        var numNew = parseFloat(numActal) + 1;
                        document.getElementById('idNumPregunta').setAttribute('value', numNew);

                        preguntas.push(template);
                        $("#idPreguntas").append(preguntas.join(""));
                    };
                    // });
                }
            });
            document.getElementById('idUltimoIntento').setAttribute('value', '1');
        }
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>