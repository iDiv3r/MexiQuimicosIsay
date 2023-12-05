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
                <li class="nav-item">
                    <a class="nav-link" href="../vistas/inventarioVentas.php">Ventas</a>
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
