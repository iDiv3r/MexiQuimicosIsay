<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Consultar Ventas</title>
</head>
<body class="UwU">

    <?php require('../componentes/navBar.php'); ?>
    <?php require('../php/controller.php'); ?>
    <?php require('../fpdf/fpdf.php'); ?>
    
    <!--Titulo-->
    <h1 class="titulo"> Consultar Ventas </h1>

    <!--contenedor de la tabla-->
    <div style="position: absolute; left:15vw; top:15vw;">
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalCrearReporteVentas">Crear reporte de Ventas</button>
        <table class="table" >
            <thead>
                <tr style="text-justify:auto;">
                    <th scope="col"> &nbsp;               Id            &nbsp;                      </th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Cliente       &nbsp; &nbsp; &nbsp; </th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Fecha         &nbsp; &nbsp; &nbsp; </th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Tipo de Venta &nbsp; &nbsp; &nbsp; </th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Producto      &nbsp; &nbsp; &nbsp; </th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Clase         &nbsp; &nbsp; &nbsp; </th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Cantidad      &nbsp; &nbsp; &nbsp; </th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; Total         &nbsp; &nbsp; &nbsp; </th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consultaVentas = consultarVentas();

                    while($arregloVentas= mysqli_fetch_array($consultaVentas)){

                        echo ("
                        <tr>
                            <th> " . $arregloVentas['id'] . " </th>
                            <td> " . $arregloVentas['cliente'] . " </td>
                            <td> " . $arregloVentas['fecha'] . " </td>
                            <td> " . $arregloVentas['tipo'] . " </td>
                            <td> " . $arregloVentas['producto'] . " </td>
                            <td> " . $arregloVentas['clase'] . " </td>
                            <td> " . $arregloVentas['cantidad'] ."' </td>
                            <td> " . $arregloVentas['total'] . " </td>
                            <td>
                                <a class='btn btn-info' href='#' data-bs-toggle='modal' data-bs-target='#Ticket". $arregloVentas['id']  . "'>Crear Ticket</a>
                            </td>
                        </tr>
                        ");
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php

        $consultaVentas2 = consultarVentas();
        while($arregloVentas2 = mysqli_fetch_array($consultaVentas2)){

            require('../componentes/modalTicket.php'); 

        };
    ?>

    <!-- Modal Reporte Ventas -->
    <div class="modal fade" id="modalCrearReporteVentas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Vista previa</h1>
            </div>
            <div class="modal-body">

            <?php 
            
            $ruta = crearReporteVentas();
            
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
