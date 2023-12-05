
<!-- Modal Ticket -->
<div class="modal fade" id="<?php echo "Ticket" . $arregloVentas2['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Vista Previa</h5>
            </button>
            </div>
        <div class="modal-body">
            <?php
                

                $ruta = crearTicket($arregloVentas2['id'], $arregloVentas2['cliente'], $arregloVentas2['fecha'],
                    $arregloVentas2['tipo'], $arregloVentas2['producto'], $arregloVentas2['clase'], $arregloVentas2['cantidad'], $arregloVentas2['total'], $_COOKIE['usuario']);

                echo '
                <object 
                    type="application/pdf"
                    data="' . $ruta . '"
                    width="460"
                    height="690"
                ></object>
                ';
            ?>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </form>
        </div>
    </div>
</div>
