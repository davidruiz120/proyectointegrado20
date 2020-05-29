
<!-- Modal Ver Mis subastas -->
<div class="modal fade" id="modalMisSubastas">
<div class="modal-dialog modal-xl">
    <div class="modal-content border-gradient">
    <div class="modal-header bg-forza">
        
        <h3 class="modal-title text-white"><i class="fas fa-user-tag"></i> Mis subastas</h3>
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true" onclick="location.reload();">×</button>
    </div>
    <div class="modal-body">
        <h5 class="text-center"><i class="fas fa-exclamation-circle" style="color: orange;"></i> Atención: Al eliminar una subasta no se podrá deshacer los cambios</h5>
        <hr>


        <div id="panelMisSubastas">
            <!-- Este panel de rellena en js/auctionhouse.js -->
        </div>
        
    </div>
    <div class="modal-footer bg-forza">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
    </div>
            
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Administrar subastas -->
<div class="modal fade" id="modalAdministrarSubastas">
<div class="modal-dialog modal-xl">
    <div class="modal-content border-gradient">
    <div class="modal-header bg-forza">
        
        <h3 class="modal-title text-white"><i class="fas fa-tools"></i> Administrar subastas</h3>
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true" onclick="location.reload();">×</button>
    </div>
    <div class="modal-body">
        <h5 class="text-center"><i class="fas fa-exclamation-circle" style="color: orange;"></i> Atención: Al eliminar una subasta no se podrá deshacer los cambios</h5>
        <hr>

        <div id="panelAdministrarSubastas">
            <!-- Este panel de rellena en js/auctionhouse.js -->
        </div>
        
    </div>
    <div class="modal-footer bg-forza">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
    </div>
            
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Modal Pujar -->
<div class="modal fade" id="modalPujar">
<div class="modal-dialog">
    <div class="modal-content border-gradient">
    <div class="modal-header bg-forza">
        
        <h3 class="modal-title text-white"><i class="fas fa-coins"></i> Pujar subasta</h3>
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true" onclick="location.reload();">×</button>
    </div>
    <div class="modal-body">

        <div id="creditosUserLogin" style="display: none;"><?php echo $_SESSION["creditosUser"]; ?></div>

        <div id="panelPujar">
            <!-- Este panel de rellena en js/auctionhouse.js -->
        </div>

        <h6 class="text-center"><i class="fas fa-exclamation-circle" style="color: orange;"></i> Si el botón para Pujar está deshabilitado es por dos casos posibles: Porque no puede pujar con el mismo valor actual, o no tiene los créditos suficientes para la puja.</h6>
        
    </div>
    <div class="modal-footer bg-forza">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
    </div>
            
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Comprar -->
<div class="modal fade" id="modalComprar">
<div class="modal-dialog">
    <div class="modal-content border-gradient">
    <div class="modal-header bg-forza">
        
        <h3 class="modal-title text-white"><i class="fas fa-coins"></i> Compra rápida</h3>
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true" onclick="location.reload();">×</button>
    </div>
    <div class="modal-body">

        <div id="creditosUserLogin" style="display: none;"><?php echo $_SESSION["creditosUser"]; ?></div>

        <div id="panelComprar">
            <!-- Este panel de rellena en js/auctionhouse.js -->
        </div>

    </div>
    <div class="modal-footer bg-forza">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
    </div>
            
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->