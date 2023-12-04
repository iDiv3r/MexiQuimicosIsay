<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Inventario Materiales</title>
</head>
<body class="UwU">
    <style>
        .modal-dialog-end {
            position: absolute;
            top: 20px;
            right: 2vw;
            margin: 30px;
        }
    </style>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../vistas/menuPrincipal.php">MexiQuímicos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../vistas/existencias.php" role="button" >Consultar existencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../vistas/inventarioQuimicos.php" role="button" >Productos Químicos</a>
                </li>
                <li class="nav-item">
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
                <button class="bg-body-tertiary border-0" data-bs-toggle="modal" data-bs-target="#Usuario">
                    <i class="fa-solid fa-user fa-xl"></i>
                </button>
            </div>
    </div>
    </nav>

    <!-- Modal usuario -->
    <div class="modal fade" id="Usuario">
        <div class="modal-dialog modal-dialog-end modal-sm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title">Usuario &nbsp; &nbsp;</h5>
                    <i class="fa-solid fa-user fa-xl ml-4"></i>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item"><?php echo "Correo: " . $_COOKIE['usuario'] ?></li>
                        <li type="password" class="list-group-item"><?php $pass = $_COOKIE['psw']; $l = strlen($pass); $t = str_repeat("*", $l); echo $t; ?></li>
                    </ul>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="../vistas/index.php">Cerrar sesión</a>
                        <a class="btn btn-success" href="../vistas/modifUsuarios.php">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Titulo-->
    <h1 class="titulo"> Inventario Materiales </h1>


    <!--contenedor de la tabla-->
    <div style="position: absolute; left:15vw; top:15vw;">
        
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Crear">
            Agregar Material:
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre del material</th>
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
                $consultaMateriales = consultarMateriales();

                while($arregloMateriales = mysqli_fetch_array($consultaMateriales)){
                    
                    if(($arregloMateriales['cantidad']) <= 3){
                        $color = 'style="color:red"';
                    } else{
                        $color = "";
                    }

                    echo ("
                    <tr>
                        <th> " . $arregloMateriales['id'] . " </th>
                        <td> " . $arregloMateriales['nombre'] . " </td>
                        <td> " . $arregloMateriales['fecha'] . " </td>
                        <td> " . $arregloMateriales['precio'] . " </td>
                        <td> " . $arregloMateriales['costomay'] . " </td>
                        <td> " . $arregloMateriales['costomen'] . " </td>
                        <td " . $color . "> " . $arregloMateriales['cantidad'] . " </td>
                        <td> " . $arregloMateriales['medida'] . " </td>
                        <td>
                            <div class='dropdown'>
                                <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Opciones
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                <li><a class='dropdown-item text-info' href='#' data-bs-toggle='modal' data-bs-target='#Editar". $arregloMateriales['id']  . "'>Editar</a></li>
                                <li><a class='dropdown-item text-warning' href='#' data-bs-toggle='modal' data-bs-target='#Vender". $arregloMateriales['id']  . "'>Vender</a></li>
                                <li><a class='dropdown-item text-danger' href='#' data-bs-toggle='modal' data-bs-target='#Borrar". $arregloMateriales['id']  . "'>Eliminar</a></li>
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

    <!-- Modal Agregar Material -->
    <div class="modal fade" id="Crear">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar material</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="../php/controller.php" method="POST">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre del material</th>
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
                                            <input type="text" class="form-control" name="txtNombreAdd" id="nombreAg" value="">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="txtFechaAdd" id="fechaAg" value="<?php echo date("Y-m-d")?>">
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
                                        <td>
                                            <input type="text" class="form-control" name="txtMedidaAdd" id="medidaAg" value="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-success" type="submit" name="btnGuardarMaterial">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- segunda consulta Materiales  -->
    <?php
        $consultaMateriales2 = consultarMateriales();
        while($arregloMateriales2 = mysqli_fetch_array($consultaMateriales2)){

            require 'opcionesMateriales.php';

        };
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>