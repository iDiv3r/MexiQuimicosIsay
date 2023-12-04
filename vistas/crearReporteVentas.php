<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crearReporteVentas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    

    <title>Bienvenido a MexiQuímicos</title>
</head>
    
<body>
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
    
    <h1 class="titulo1">CREAR REPORTE</h1>


    <div class="contenedorPDF"></div>

    <div>
        <div class="card text-center botonR1 border-info ml-5">
            <div class="card-body">
                <a class="btn btn-primary">Crear Reporte</a>
            </div>
        </div> 
    
        <img src="img/lapiz.png" class="lapiz">
    
        <div class="card text-center botonR2 border-dangerml-5 mt-5">
            <div class="card-body">
                <a class="btn btn-danger">Descargar Reporte</a>
            </div>
        </div> 
    </div>
    
    <p></p>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>