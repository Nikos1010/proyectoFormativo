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
    <link rel="stylesheet" href="../css/style-op1.css">

    <title>Administracion</title>
</head>

<body>
    <!-- Menu Navegacion -->
            <?php include 'header.php' ?>

    <h1>Preguntas - Respuestas de un candidato</h1>
    <!-- Busqueda -->
    <div class="container">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ingrese Identificacion"
                aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary me-5" type="button" id="button-addon2">Buscar</button>
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false"></button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Esperando...</a></li>
            </ul>
            <input type="text" class="form-control" placeholder="Escoja Empresa"
                aria-label="Text input with dropdown button">

        </div>
    </div>
    <!-- Nombre y Numero de prueba -->
    <div class="container">
        <div class="input-group mb-3">
            <input type="text" class="form-control me-4" placeholder="Nombre Candidato"
                aria-label="Recipient's username" aria-describedby="button-addon2">

            <input type="text" class="form-control me-4" placeholder="N° de prueba" aria-label="Recipient's username"
                aria-describedby="button-addon2">
        </div>
    </div>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Sigue la secuencia 6, 1, 8, 3, 10, ?</td>
                        <td>12</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>