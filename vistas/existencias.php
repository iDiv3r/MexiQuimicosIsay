<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Consultar Existencias</title>
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
    <h1 class="titulo"> Consultar existencias </h1>
    
    <?php 
        require '../php/controller.php';
    ?>
    
    <div class="busqueda">
        <form class="d-flex" role="search" method="POST">
            <input class="form-control me-2 =" type="search" placeholder="Escribe lo que desees buscar" aria-label="Search" name="txtBusqueda">
            <button class="btn btn-success =" type="submit">Buscar</button>
            <button class="btn btn-primary reporteExistencias" type="submit" name="btnCrearReporte">Reporte</button>
        </form>
    </div>
        
    <!--contenedor de la tabla-->
    <div class="tablaExistencias">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> &nbsp; Id &nbsp;</t h>
                    <th scope="col"> &nbsp; Nombre &nbsp;</t h>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Fecha &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>
                    <th scope="col"> &nbsp; Precio de compra &nbsp;</t h>
                    <th scope="col"> &nbsp; Costo V. mayoreo &nbsp;</t h>
                    <th scope="col"> &nbsp; Costo V. menudeo &nbsp;</t h>
                    <th scope="col"> &nbsp; Cantidad &nbsp;</t h>
                    <th scope="col"> &nbsp; Clase &nbsp;</t h>
                    <th scope="col"> &nbsp; Medida &nbsp;</t h>
                </tr>
            </thead>
            <tbody>
            <?php
                // require '../php/funcionesbd.php';
                $consultaQuimicos = consultarQuimicos();
                $consultaMateriales = consultarMateriales();

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
                        <td " . $color . "> " . $arregloQuimicos['cantidad'] . " </td>
                        <td> " . $arregloQuimicos['clase'] . " </td>
                        <td> " . $arregloQuimicos['medida'] . " </td>
                    </tr>

                    ");
                }

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
                        <td> " . $arregloMateriales['clase'] . " </td>
                        <td> " . $arregloMateriales['medida'] . " </td>
                    </tr>

                    ");
                };
            ?>
            </tbody>
        </table>

    </div>    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>