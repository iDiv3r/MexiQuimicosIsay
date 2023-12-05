<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Inventario Productos</title>
</head>
<body class="UwU">
    
    <?php require('../componentes/navBar.php'); ?>

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
                    <th scope="col">Id</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio de compra</th>
                    <th scope="col">Costo mayoreo</th>
                    <th scope="col">Costo menudeo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Medida</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
            <?php
                require '../php/funcionesbd.php';
                $consultaQuimicos = consultarQuimicos();

                while($arregloQuimicos = mysqli_fetch_array($consultaQuimicos)){
                    
                    if(($arregloQuimicos['cantidad']) <= 3){
                        $color = 'class="text-danger"';
                    } else{
                        $color = "";
                    }

                    echo ("
                    <tr>
                        <th> " . $arregloQuimicos['id'] . " </th>
                        <td> " . $arregloQuimicos['nombre'] . " </td>
                        <td> " . $arregloQuimicos['fecha'] . " </td>
                        <td> " . $arregloQuimicos['precio'] . " </td>
                        <td> " . $arregloQuimicos['costomay'] . " </td>
                        <td> " . $arregloQuimicos['costomen'] . " </td>
                        <td  " . $color . "> " . $arregloQuimicos['cantidad'] . " </td>
                        <td> " . $arregloQuimicos['medida'] . " </td>
                        <td>
                            <div class='dropdown'>
                                <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Opciones
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                <li><a class='dropdown-item text-info' href='#' data-bs-toggle='modal' data-bs-target='#Editar". $arregloQuimicos['id']  . "'>Editar</a></li>
                                <li><a class='dropdown-item text-warning' href='#' data-bs-toggle='modal' data-bs-target='#Vender". $arregloQuimicos['id']  . "'>Vender</a></li>
                                <li><a class='dropdown-item text-danger' href='#' data-bs-toggle='modal' data-bs-target='#Borrar". $arregloQuimicos['id']  . "'>Eliminar</a></li>
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
    <div class="modal fade" id="Crear">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar producto</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="../php/controller.php" method="POST">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre del producto</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Precio de compra</th>
                                        <th scope="col">Costo mayoreo</th>
                                        <th scope="col">Costo menudeo</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Medida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="txtNombreAdd" value="">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="txtFechaAdd" value="<?php echo date("Y-m-d")?>">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtPrecioAdd" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtCostoMayoreoAdd" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtCostoMenudeoAdd" value="">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="txtCantidadAdd" value="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="txtMedidaAdd" value="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-success" type="submit" name="btnGuardarQuimico">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- segunda consultaQuimicos  -->
    <?php
        $consultaQuimicos2 = consultarQuimicos();
        while($arregloQuimicos2 = mysqli_fetch_array($consultaQuimicos2)){

            require('../componentes/opcionesQuimicos.php');

        };
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>