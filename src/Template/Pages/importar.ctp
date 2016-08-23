<!-- src/Template/Pages/importar.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Importar");
$this->assign("title", "Importar Datos");
?>
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