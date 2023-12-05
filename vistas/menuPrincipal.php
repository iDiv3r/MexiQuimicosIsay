<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menuPrincipal.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Bienvenido a MexiQuímicos</title>
</head>

<body>
    <style>
        .modal-dialog-end {
            position: absolute;
            top: 6vw;
            right: 2vw;
            margin: 30px;
        }
    </style>

    <h1 class="text-center mt-5 mb-5" style="color:black">MEXQUÍMICOS</h1>
    
    <h3 class="text-center mt-5 mb-5" style="color:black">
        <?php echo "Bienvenido a MEXQUÍMICOS " . $_COOKIE['usuario']?>
    </h3>
    

    <i class="fa-regular fa-circle-user fa-2xl" data-bs-toggle="modal" data-bs-target="#Usuario" role="button" style="position:absolute; right:10vw; top:7vw;"></i>  

    <!-- Tarjetas Productos Quimicos -->
    <div class="contenedor">
        <div class="d-flex justify-items-center align-items-center">
            <h4 style="margin-right:12vw; margin-left:2vw;">Productos Químicos</h4>
            <div class="card text-center border-danger ml-5" style="width: 13rem;">
                <div class="card-body">
                    <a class="btn btn-danger" href="../vistas/inventarioQuimicos.php">Ir a Productos</a>
                </div>
            </div> 
        </div>
    </div>
    

    <!-- Tarjetas Materiales -->
    <div class="contenedor mt-5">
        <div class="d-flex justify-items-center align-items-center">
            <h4 style="margin-right:19vw; margin-left:2vw;">Materiales</h4>
            <div class="card text-center border-info ml-5" style="width: 13rem;">
                <div class="card-body">
                    <a class="btn btn-primary" href="../vistas/inventarioMateriales.php">Ir a Materiales  </a>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- Tarjetas Ventas -->
    <div class="contenedor mt-5">
        <div class="d-flex j align-items-center">
            <h4 style="margin-right:3vw; margin-left:2vw;">Ventas</h4>
            <div class="card text-center border-warning" style="width: 8rem; margin-left:23.5vw ">
                <div class="card-body">
                    <a class="btn btn-warning" href="../vistas/inventarioVentas.php">Consultar</a>
                </div>
            </div> 
        </div>
    </div>

    <p></p>

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
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>