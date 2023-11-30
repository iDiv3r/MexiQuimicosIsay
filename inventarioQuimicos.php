<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inventario.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Inventario</title>
</head>
<body class="UwU">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">MexiQuímicos</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Menú principal</a>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Productos Químicos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Consultar Productos</a></li>
                                    <li><a class="dropdown-item" href="#">Agregar Productos</a></li>
                                    <li><a class="dropdown-item" href="#">Modificar Productos</a></li>
                                    <li><a class="dropdown-item" href="#">Eliminar Productos</a></li>
                                </ul>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Materiales
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Consultar Materiales</a></li>
                                    <li><a class="dropdown-item" href="#">Agregar Materiales</a></li>
                                    <li><a class="dropdown-item" href="#">Modificar Materiales</a></li>
                                    <li><a class="dropdown-item" href="#">Eliminar Materiales</a></li>
                                </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Ventas
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Guardar y consultar</a></li>
                                        <li><a class="dropdown-item" href="#">Crear reporte de ventas</a></li>
                                        <li><a class="dropdown-item" href="#">Crear ticket de venta</a></li>
                                    </ul>
                                    </li>

                            </ul>
                                <button class="bg-body-tertiary border-0 ">
                                    <i class="fa-solid fa-user fa-xl"></i>
                                </button>
                    </div></div>
            </nav> 
    
    </div>

    
    <!--Titulo-->
<h1 class="titulo"> Inventario Quimicos </h1>

    <button class="btn btn-primary owo" data-bs-toggle="modal" data-bs-target="#Crear">
        Agregar Producto:
    </button>

    <!--contenedor de la tabla-->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID:</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio de compra</th>
                    <th scope="col">Costo de venta mayoreo</th>
                    <th scope="col">Costo de venta menudeo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                    <th> 12345 </th>
                    <td> Nitroglicerina </td>
                    <td>29/11/23</td>
                    <td>150</td>
                    <td>1500</td>
                    <td>1600</td>
                    <td>10</td>
                    <td>
                    <div class='dropdown'>
                            <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                Opciones
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                            <li><a class='dropdown-item' href='#' data-bs-toggle="modal" data-bs-target="#Editar">Editar</a></li>
                            <li><a class='dropdown-item' href='#' data-bs-toggle="modal" data-bs-target="#ewe">Vender</a></li>
                            <li><a class='dropdown-item' href='#' data-bs-toggle="modal" data-bs-target="#Borrar" style="color:red">Eliminar</a></li>
                            </ul>
                        </div>
                    </td>
            </tr>
        </tbody>
        </table>

        <!-- Modals de químicos -->

        <!-- Editar productos -->
        <div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border:0;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <div class="modal-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Precio de compra</th>
                        <th scope="col">Costo de venta mayoreo</th>
                        <th scope="col">Costo de venta menudeo</th>
                        <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="Nitroglicerina">
                    </td>
                    <td>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="2023-11-29">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="precio_compra" id="precio_compra" value="150">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="precio_venta_mayoreo" id="precio_venta_mayoreo" value="1500">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="precio_venta_menudeo" id="precio_venta_menudeo" value="1600">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" value="10">
                    </td>
                    </tr>
                    </tbody>
            </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
            </div>
        </div>
        </div>
        <!-- Final del modal Editar Producto-->

        <!-- Modals de vender -->
        <div class="modal" id="ewe">
            <div class="modal-dialog modal-dialog-centered modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Venta de producto</h5>
                        <button class="btn-close " data-bs-dismiss="modal" aria-label="Close" style="border:0;"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" placeholder="Cliente" class="input-group border-info mb-2 rounded-2">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre del producto:</th>
                                        <th scope="col">Costo de venta mayoreo:</th>
                                        <th scope="col">Costo de venta menudeo: </th>
                                        <th scope="col">Cantidad: </th>
                                    </tr>
                                </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Nitroglicerina
                                    </td>
                                    <td>
                                        1500
                                    </td>
                                    <td>
                                        1600
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cantidad" id="cantidad" value="">
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <div class='dropdown'>
                                <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Tipo de Venta
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                <li><a class='dropdown-item' href='#'>Mayoreo</a></li>
                                <li><a class='dropdown-item' href='#'>Menudeo</a></li>
                            </div>
                                <button class="btn btn-success">Vender</button>
                                <button class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Borrar producto -->
        <div class="modal fade" id="Borrar"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 fw-semibold fw-bold" id="staticBackdropLabel">Borrar Producto </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">

            <form method="POST" action="#">
                <!-- Aquí iría el token CSRF y el método DELETE cuando conectes con la base de datos -->
                <div class="text-danger fs-4 fw-semibold">
                ¿Seguro que borrarás el producto?
                </div>           
        </div>
        <div class="modal-footer">
                <button type="submit" class="btn btn-danger"> <i class="bi bi-trash"></i> Si, Borralo </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>

    </div>
    </div>
    </div>
    <!-- Final del modal Eliminar Producto-->

    <!-- Modal Agregar Producto -->
    <div class="modal" id="Crear" >
        <div class="modal-dialog modal-dialog-centered modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Crear producto</h5>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre del producto</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Precio de compra</th>
                                    <th scope="col">Costo de venta mayoreo</th>
                                    <th scope="col">Costo de venta menudeo</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="fecha" id="fecha" value="">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="precio_compra" id="precio_compra" value="">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="precio_venta_mayoreo" id="precio_venta_mayoreo" value="">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="precio_venta_menudeo" id="precio_venta_menudeo" value="">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="">
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                            <button class="btn btn-success">Guardar</button>
                            <button class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>