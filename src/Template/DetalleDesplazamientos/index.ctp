<div class="modal-content">
     <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Nuevo Desplazamiento</h4>
     </div>
     <div class="modal-body">
         <div class="row">
             <div class="col-sm-8 col-sm-offset-2">
                 <div class="form-group">
                     <div class="row">
                         <div class="col-sm-2">
                             <label>Ruta</label>
                             <input type="text" readonly ng-model="ruta_selected.id" class="form-control">
                         </div>
                         <div class="col-sm-10">
                             <label>Descripción</label>
                             <input type="text" readonly ng-model="ruta_selected.descripcion" class="form-control">
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="origen">Origen</label>
                     <input id="origen" type="text" readonly ng-model="next_origen.destino.direccion + ' (' + next_origen.destino.ubigeo.descripcion + ')'" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="destino">Destino</label>
                     <select id="destino" ng-model="detalle_desplazamiento.origen" class="form-control"
                         ng-options="agencia.id as agencia.direccion + ' (' + agencia.ubigeo.descripcion + ')' for agencia in agencias">
                     </select>
                 </div>
             </div>
         </div>
     </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn btn-primary">Registrar</button>
     </div>
 </div>