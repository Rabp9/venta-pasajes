<!-- src/Template/Rutas/edit.ctp -->
<div ng-controller="EditRutasController">
    <form ng-submit="updateRuta()">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Ruta</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label id='txtDescripcion'>Descripción</label>
                            <input id="txtDescripcion" type="text" class="form-control" ng-model="editRuta.descripcion" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnEditRegistrarRuta" type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>
</div>