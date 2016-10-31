<!-- src/Template/Pages/importar.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Importar");
$this->assign("title", "Importar Datos");
?>
<div ng-show="message.type == 'success'" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
<div ng-show="message.type == 'error'" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" ng-click="message.type = ''"><span aria-hidden="true">&times;</span></button>
    {{ message.text }}
</div>
 <!-- Nav tabs -->
<ul id="ulTabs" class="nav nav-tabs" role="tablist" >
    <li role="presentation" class="active"><a data-target="#import" aria-controls="import" role="tab" data-toggle="tab">Importar</a></li>
    <li role="presentation"><a data-target="#export" aria-controls="export" role="tab" data-toggle="tab">Exportar</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="import">
        <form ng-submit="import()">
            <div class="row">
                <div class="col-md-6 panel" style="height: 100px;">
                        <div class="form-group">
                            <label for="flImportar">Importar datos desde</label>
                            <input id="flImportar" type="file" class="form-control" ngf-select="uploadFile()" file-model="backup" />
                       </div>
                </div>
                <div class="col-md-6 panel" style="height: 100px;">
                    <dl class="dl-horizontal">
                        <dt>No. de Clientes nuevos:</dt>
                        <dd>{{ nro_clientes }}</dd>
                        <dt>No. de Pasajes nuevos:</dt>
                        <dd>{{ nro_pasajes }}</dd>
                        <dt>No. de Giros nuevos:</dt>
                        <dd>{{ nro_giros }}</dd>
                        <dt>No. de Encomiendas nuevos:</dt>
                        <dd>{{ nro_encomiendas }}</dd>
                    </dl>
                </div>
                <div class="col-md-12">
                    <button id="btnImportar" type="submit" class="btn btn-primary">Cargar datos</button>
                </div>
            </div>
        </form>
    </div>
    
    <div role="tabpanel" class="tab-pane" id="export">
        <form ng-submit="export()">
            <div class="row panel">
                <div class="col-md-4 col-sm-offset-4">
                    <h3>Datos a exportar</h3>
                    <ul class="list-group">
                        <label style="display: block">
                            <li class="list-group-item">
                                <span class="badge">{{ nro_clientes }}</span>
                                <input type="checkbox" ng-model="chk_clientes"> Clientes
                            </li>
                        </label>
                        <label style="display: block">
                            <li class="list-group-item">
                                <span class="badge">{{ nro_pasajes }}</span>
                                <label><input type="checkbox" ng-model="chk_pasajes"> Pasajes</label>
                            </li>
                        </label>
                        <label style="display: block">
                            <li class="list-group-item">
                                <span class="badge">{{ nro_giros }}</span>
                                <label><input type="checkbox" ng-model="chk_giros"> Giros</label>
                            </li>
                        </label>
                        <label style="display: block">
                            <li class="list-group-item">
                                <span class="badge">{{ nro_encomiendas }}</span>
                                <label><input type="checkbox" ng-model="chk_encomiendas"> Encomiendas</label>
                            </li>
                        </label>
                    </ul>
                    <a id="aExport" class="btn btn-primary" ng-click="export()">Exportar</a>
                </div>
            </div>
        </form>
    </div>
</div>


