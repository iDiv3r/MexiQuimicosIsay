
<!-- ____________________________________________________________ -->
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
                        <input type="text" class="form-control" name="txtNombreEdit"  value="<?php echo $arregloQuimicos2['nombre']?>">
                    </td>
                    <td>
                        <input type="date" class="form-control" name="txtFechaEdit" value="<?php echo $arregloQuimicos2['fecha']?>">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="txtPrecioEdit" value="<?php echo $arregloQuimicos2['precio']?>">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="txtCostoMayEdit" value="<?php echo $arregloQuimicos2['costomay']?>">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="txtCostoMenEdit" value="<?php echo $arregloQuimicos2['costomen']?>">
                    </td>
                    <td>
                        <input type="number" name="txtCantidadEdit" value="<?php echo $arregloQuimicos2['cantidad']?>" class="form-control
                        <?php
                            if(($arregloQuimicos2['cantidad']) <= 3){
                                echo ('text-danger"');
                            }
                        ?>
                        ">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="txtMedidaEdit" value="<?php echo $arregloQuimicos2['medida']?>">
                    </td>
                </tr>
                </tbody>
            </table>
                </div> 
        </div>
            <div class="modal-footer">
                <input type="hidden" name="txtIdQuimico" value="<?php echo $arregloQuimicos2['id']; ?>"> 
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info" style="color: white;" name="btnActualizarQuimico">Guardar cambios</button>
            </div>
        </form>
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
            <form action= "../php/controller.php" method="POST"> 
                <input type="text" placeholder=" Cliente" class="form-control mb-2 rounded-2" name="txtCliente" value>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Costo mayoreo</th>
                                <th scope="col">Costo menudeo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Medida</th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="txtNombreVt"  value="<?php echo  $arregloQuimicos2['nombre']?>" readonly>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="txtFechaVt"  value="<?php echo date("Y-m-d")?>">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="txtCostoMayVt"  value="<?php echo  $arregloQuimicos2['costomay']?>" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="txtCostoMenVt"  value="<?php echo  $arregloQuimicos2['costomen']?>" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="txtCantidadVt" placeholder="<?php echo "Max: " . $arregloQuimicos2['cantidad']?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="txtMedidaVt"  value="<?php echo  $arregloQuimicos2['medida']?>" readonly>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="input-group mb-4">
                        <label class="input-group-text" for="inputGroupSelect01">Seleccionar tipo de venta</label>
                        <select class="form-select" id="inputGroupSelect01" name="selTipoVt">
                            <option>Mayoreo</option> 
                            <option>Menudeo</option>
                        </select>
                    </div>
                        <input type="hidden" name="txtIdQuimico" value="<?php echo $arregloQuimicos2['id']; ?>">
                        <input type="hidden" name="txtCantidadDisp" value="<?php echo $arregloQuimicos2['cantidad']; ?>">
                        <button type="button"class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-warning" name="btnVenderQuimico">Vender</button>
                </div>
            </form>
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
                <form method="POST" action="../php/controller.php"> 
                    <div class="text-danger fs-5 fw-semibold mb-4">
                        ¿De verdad quieres borrar el producto?
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="txtIdQuimico" value="<?php echo $arregloQuimicos2['id']; ?>"> 
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="btnEliminarQuimico">Si</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Final del modal borrar Producto-->

