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
    <link rel="stylesheet" href="../css/style-ge.css">

    <title>Gestion Empresa</title>
</head>

<body>
    <!-- Menu Navegacion -->
            <?php include 'header.php' ?>

    <!-- Busqueda -->
    <div class="container-2">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ingrese NIT" aria-label="Recipient's username"
                aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2">Buscar</button>
            <button type="button" class="btn btn-outline-success " data-bs-toggle="modal"
                data-bs-target="#exampleModal">Agregar</button>
        </div>
    </div>
    <!-- Tabla -->
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Representante Legal</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">496337751</th>
                        <td>IKEA</td>
                        <td>ACEVEDO MANRÍQUEZ MARÍA MIREYA</td>
                        <td>Calle 10 No. 9 - 78 Centro</td>
                        <td>3127906861</td>
                        <td>
                            <div class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Editar</button>
                                    <button type="button" class="btn btn-outline-danger">Eliminar</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-content">
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputNit4" class="form-label">NIT</label>
                                    <input type="text" class="form-control" id="inputNit4" placeholder="Ingrese NIT">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNombre4" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="inputNombre4"
                                        placeholder="Ingrese el Nombre">
                                </div>
                                <div class="col-12">
                                    <label for="inputRepresentante" class="form-label">Representante
                                        Legal</label>
                                    <input type="text" class="form-control" id="inputRepresentante"
                                        placeholder="Ingrese el nombre del Representante">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="Apartamento, estudio o piso">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPhone" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="inputPhone"
                                        placeholder="Ingrese el numero telefono">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>