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

    <?php require('../componentes/navBar.php'); ?>
    
    <h1 class="titulo"> Consultar existencias </h1>
    
    <?php require '../php/controller.php'; ?>
    
    <div class="busqueda">
        <form class="d-flex" role="search" method="POST">
            <input class="form-control me-2 =" type="search" placeholder="Escribe lo que desees buscar" aria-label="Search" name="txtBusqueda">
            <button class="btn btn-success =" type="submit">Buscar</button>
            <button type="button" class="btn btn-primary reporteExistencias" data-bs-toggle="modal" data-bs-target="#modalCrearReporte">Reporte</button>
        </form>
        
    </div>
        
    <!--contenedor de la tabla-->
    <div class="tablaExistencias">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> &nbsp; Id &nbsp;</t h>
                    <th scope="col"> &nbsp; Nombre &nbsp;</t h>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Fecha &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp</th>
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

    <!-- Modal Reporte -->
    <div class="modal fade" id="modalCrearReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Vista previa</h1>
            </div>
            <div class="modal-body">

            <?php 
            
            $ruta = crearReporteGeneral();
            
            echo '
            <object 
                type="application/pdf"
                data=" ' .$ruta . '"
                width="765"
                height="893"
                style""
            ></object>
            ';

            ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>