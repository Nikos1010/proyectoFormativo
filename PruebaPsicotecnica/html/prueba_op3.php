<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Mi estilo CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-op3.css">

    <title>Administracion</title>
</head>

<body>
    <!-- Menu Navegacion -->
            <?php include 'header.php' ?>

    <!-- Contenedor Escoger -->
    <div class="container-2">

        <h2>Agregar respuesta candidato</h2>
        <!-- Escoger usuario y empresa -->
        <form class="row g-3">
            <div class="col-md-12">
                <label for="inputIdt4" class="form-label">Identificacion</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ingrese Identificacion"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary " type="button" id="btn-buscar">Buscar</button>
                </div>
                <fieldset disabled>
                    <div class="col-md-12 mb-3">
                        <label for="inputNombre4" class="form-label ">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre4" placeholder="Ingrese el Nombre">
                    </div>
                </fieldset>
                <div class="col-12">
                    <label for="inputEmpresa" class="form-label">Empresa</label>
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Esperando...</a></li>
                        </ul>
                        <input type="text" class="form-control" id="inputEmpresa" placeholder="Escoja Empresa"
                            aria-label="Text input with dropdown button">
                    </div>
                </div>
                <fieldset disabled>
                    <div class="col-md-12 mb-3">
                        <label for="inputNumPrueba" class="form-label">Prueba</label>
                        <input type="text" class="form-control" id="inputNumPrueba" placeholder="Numero de Prueba">
                    </div>
                </fieldset>
                <div class="col-md-12">
                    <div class="btn-group ">
                        <button type="submit" class="btn btn-outline-danger me-4">Limpiar</button>
                        <button type="submit" class="btn btn-outline-primary">Consultar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Preguntas -->
    <div class="container-2  ">
        <h2 class="mb-3">Preguntas - Respuestas</h2>
        <form class="row g-3 ">
            <div class="col-md-12 ">
                <label for="inputIdt4" class="form-label">Sigue la secuencia 6, 1, 8, 3, 10, ?</label>
            </div>
            <div class="col-md-12 ">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        7
                    </label>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        4
                    </label>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        12
                    </label>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        5
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="btn-group ">
                    <button type="submit" class="btn btn-outline-danger me-4">Anterior</button>
                    <button type="submit" class="btn btn-outline-primary">Siguiente</button>
                </div>
            </div>
    </div>
    </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>