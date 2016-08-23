<!-- src/Template/Pages/importar.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Importar");
$this->assign("title", "Importar Datos");
?>
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
                        <dt>Número de Clientes nuevos:</dt>
                        <dd>{{ nro_clientes }}</dd>
                        <dt>Número de Pasajes:</dt>
                        <dd>{{ nro_pasajes }}</dd>
                        <dt>Número de Giros:</dt>
                        <dd>{{ nro_giros }}</dd>
                        <dt>Número de Encomiendas:</dt>
                        <dd>{{ nro_encomiendas }}</dd>
                    </dl>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Cargar datos</button>
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
                                <input type="checkbox"> Clientes
                            </li>
                        </label>
                        <label style="display: block">
                            <li class="list-group-item">
                                <span class="badge">{{ nro_pasajes }}</span>
                                <label><input type="checkbox"> Pasajes</label>
                            </li>
                        </label>
                        <label style="display: block">
                            <li class="list-group-item">
                                <span class="badge">{{ nro_giros }}</span>
                                <label><input type="checkbox"> Giros</label>
                            </li>
                        </label>
                        <label style="display: block">
                            <li class="list-group-item">
                                <span class="badge">{{ nro_encomiendas }}</span>
                                <label><input type="checkbox"> Encomiendas</label>
                            </li>
                        </label>
                    </ul>
                    <button type="submit" class="btn btn-primary">Exportar</button>
                </div>
            </div>
        </form>
    </div>
</div>


