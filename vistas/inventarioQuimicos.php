<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Inventario Productos</title>
</head>
<body class="UwU">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../vistas/menuPrincipal.php">MexiQuímicos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../vistas/inventarioQuimicos.php" role="button" >Productos Químicos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="../vistas/inventarioMateriales.php" role="button" >Materiales</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ventas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../vistas/inventarioVentas.php">Guardar y consultar</a></li>
                        <li><a class="dropdown-item" href="../vistas/crearReporteVentas.php">Crear reporte de ventas</a></li>
                        <li><a class="dropdown-item" href="../vistas/crearTicket.php">Crear ticket de venta</a></li>
                    </ul>
                </li>
            </ul>
                <button class="bg-body-tertiary border-0 ">
                    <i class="fa-solid fa-user fa-xl"></i>
                </button>
            </div>
    </div>
    </nav>

    <!--Titulo-->
    <h1 class="titulo"> Inventario Productos Químicos </h1>


    <!--contenedor de la tabla-->
    <div style="position: absolute; left:15vw; top:15vw;">
        
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Crear">
            Agregar Producto:
        </button>

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
            <?php
                require '../php/funcionesbd.php';
                $consultaQuimicos = consultarQuimicos();

                while($arregloQuimicos = mysqli_fetch_array($consultaQuimicos)){
                    
                    echo ("
                    <tr>
                        <th> " . $arregloQuimicos['id'] . " </th>
                        <td> " . $arregloQuimicos['nombre'] . " </td>
                        <td> " . $arregloQuimicos['fecha'] . " </td>
                        <td> " . $arregloQuimicos['precio'] . " </td>
                        <td> " . $arregloQuimicos['costomay'] . " </td>
                        <td> " . $arregloQuimicos['costomen'] . " </td>
                        <td> " . $arregloQuimicos['cantidad'] . " </td>
                        <td>
                            <div class='dropdown'>
                                <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Opciones
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                <li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#Editar". $arregloQuimicos['id']  . "'>Editar</a></li>
                                <li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#Vender". $arregloQuimicos['id']  . "'>Vender</a></li>
                                <li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#Borrar". $arregloQuimicos['id']  . "' style='color:red'>Eliminar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    ");
                };
            ?>
                
            </tbody>
        </table>
    </div>

    <!-- Modal Agregar Producto -->
    <div class="modal" id="Crear">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar producto</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Inicio del formulario -->
                    <form action="../php/controller.php" method="POST">
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
                                            <input type="text" class="form-control" name="txtNombreAdd" id="nombreAg" value="">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="txtFechaAdd" id="fechaAg" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtPrecioAdd" id="precioAg" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtCostoMayoreoAdd" id="costoMayAg" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtCostoMenudeoAdd" id="costoMenAg" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtCantidadAdd" id="cantidadAg" value="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" name="btnGuardarQuimico">Guardar</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form> <!-- Fin del formulario -->
                </div>
            </div>
        </div>
    </div>

    <!-- segunda consultaQuimicos__________________________ -->
    <?php
    $consultaQuimicos2 = consultarQuimicos();
    while($arregloQuimicos2 = mysqli_fetch_array($consultaQuimicos2)){

        require 'opcionesQuimicos.php';

    };
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>