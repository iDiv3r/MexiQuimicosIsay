
<!-- ____________________________________________________________________________________________________________________________ -->
<!-- Editar productos -->
<div class="modal fade" id="<?php echo "Editar" . $arregloQuimicos2['id']?>">
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
                <input type="text" class="form-control" name="nombreEdit" id="<?php echo "nombreEd" . $arregloQuimicos2['id']?>" value="<?php echo $arregloQuimicos2['nombre']?>">
            </td>
            <td>
                <input type="date" class="form-control" name="fechaEdit" id="<?php echo "fechaEd" . $arregloQuimicos2['id']?>" value="<?php echo $arregloQuimicos2['fecha']?>">
            </td>
            <td>
                <input type="number" class="form-control" name="precioEdit" id="<?php echo "precioEd" . $arregloQuimicos2['id']?>" value="<?php echo $arregloQuimicos2['precio']?>">
            </td>
            <td>
                <input type="number" class="form-control" name="costoMayEdit" id="<?php echo "costoMayEd" . $arregloQuimicos2['id']?>" value="<?php echo $arregloQuimicos2['costomay']?>">
            </td>
            <td>
                <input type="number" class="form-control" name="costoMenEdit" id="<?php echo "costoMenEd" . $arregloQuimicos2['id']?>" value="<?php echo $arregloQuimicos2['costomen']?>">
            </td>
            <td>
                <input type="number" class="form-control" name="cantidadEdit" id="<?php echo "cantidadEd" . $arregloQuimicos2['id']?>" value="<?php echo $arregloQuimicos2['cantidad']?>">
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
<div class="modal fade" id="<?php echo "Vender" . $arregloQuimicos2['id']?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Venta de producto</h5>
                <button class="btn-close " data-bs-dismiss="modal" aria-label="Close" style="border:0;"></button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="Cliente" class="input-group border-info mb-2 rounded-2" name="txtCliente">
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
                                <input type="number" class="form-control" name="cantidadEd" id="<?php echo "cantVend" . $arregloQuimicos2['id']?>" value="">
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
<!-- Final modal Vender -->

<!-- Borrar producto -->
<div class="modal fade" id="<?php echo "Borrar" . $arregloQuimicos2['id']?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4 fw-semibold fw-bold" id="staticBackdropLabel">Borrar Producto </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <form method="POST" action="#" name="formEliminarProducto" id="formDelProd">
                <!-- Aquí iría el token CSRF y el método DELETE cuando conectes con la base de datos -->
                <div class="text-danger fs-4 fw-semibold">
                ¿Seguro que borrarás el producto?
                </div>           
            </form>   
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"> <i class="bi bi-trash"></i> Si</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>
<!-- Final del modal borrar Producto-->
<!-- ____________________________________________________________________________________________________________________________ -->