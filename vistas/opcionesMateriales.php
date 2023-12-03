
<!-- ____________________________________________________________ -->
<!-- Editar materiales -->
<div class="modal fade" id="<?php echo "Editar" . $arregloMateriales2['id']?>">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar material</h5>
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
                    <th scope="col">Nombre del material</th>
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
                    <input type="text" class="form-control" name="txtNombreEdit"  value="<?php echo $arregloMateriales2['nombre']?>">
                </td>
                <td>
                    <input type="date" class="form-control" name="txtFechaEdit" value="<?php echo $arregloMateriales2['fecha']?>">
                </td>
                <td>
                    <input type="number" class="form-control" name="txtPrecioEdit" value="<?php echo $arregloMateriales2['precio']?>">
                </td>
                <td>
                    <input type="number" class="form-control" name="txtCostoMayEdit" value="<?php echo $arregloMateriales2['costomay']?>">
                </td>
                <td>
                    <input type="number" class="form-control" name="txtCostoMenEdit" value="<?php echo $arregloMateriales2['costomen']?>">
                </td>
                <td>
                    <input type="number" class="form-control" name="txtCantidadEdit" value="<?php echo $arregloMateriales2['cantidad']?>"
                    <?php
                        if(($arregloMateriales2['cantidad']) <= 3){
                            echo ( ' style="color:red" ');
                        }
                    ?>
                    >
                </td>
                </tr>
                </tbody>
            </table>
                </div> 
        </div>
            <div class="modal-footer">
                <input type="hidden" name="txtIdMaterial" value="<?php echo $arregloMateriales2['id']; ?>"> 
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info" style="color: white;" name="btnActualizarMaterial">Guardar cambios</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Final del modal Editar material-->

<!-- Modals de vender -->
<div class="modal fade" id="<?php echo "Vender" . $arregloMateriales2['id']?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Venta de material</h5>
                <button class="btn-close " data-bs-dismiss="modal" aria-label="Close" style="border:0;"></button>
            </div>
            <div class="modal-body">
            <form action= "../php/controller.php" method="POST"> 
                <input type="text" placeholder=" Cliente" class="form-control mb-2 rounded-2" name="txtCliente" value>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del material</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Costo de venta mayoreo</th>
                                <th scope="col">Costo de venta menudeo</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="txtNombreVt"  value="<?php echo  $arregloMateriales2['nombre']?>" readonly>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="txtFechaVt"  value="<?php echo date("Y-m-d")?>">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="txtCostoMayVt"  value="<?php echo  $arregloMateriales2['costomay']?>" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="txtCostoMenVt"  value="<?php echo  $arregloMateriales2['costomen']?>" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="txtCantidadVt" placeholder="<?php echo "Max: " . $arregloMateriales2['cantidad']?>">
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
                        <input type="hidden" name="txtIdMaterial" value="<?php echo $arregloMateriales2['id']; ?>">
                        <input type="hidden" name="txtCantidadDisp" value="<?php echo $arregloMateriales2['cantidad']; ?>">
                        <button type="button"class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-warning" name="btnVenderMaterial">Vender</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Final modal Vender -->

<!-- Borrar material -->
<div class="modal fade" id="<?php echo "Borrar" . $arregloMateriales2['id']?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4 fw-semibold fw-bold" id="staticBackdropLabel">Borrar material </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../php/controller.php"> 
                    <div class="text-danger fs-5 fw-semibold mb-4">
                        ¿De verdad quieres borrar el material?
                    </div>
                    <input type="hidden" name="txtIdMaterial" value="<?php echo $arregloMateriales2['id']; ?>"> 
                    <button type="submit" class="btn btn-success" name="btnEliminarMaterial"> <i class="bi bi-trash"></i> Si</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Final del modal borrar material-->

