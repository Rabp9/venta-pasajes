<!-- src/Template/Pages/importar.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Importar");
$this->assign("title", "Importar Datos");
?>
<div class="row">
    <div class="col-md-6">
        <form ng-submit="import()">
            <div class="form-group">
                <label for="flImportar">Importar datos desde</label>
                <input id="flImportar" type="file" class="form-control" />
           </div>
            <button type="submit" class="btn btn-primary">Cargar datos</button>
        </form>
    </div>
    <div class="col-md-6 panel">
        <dl class="dl-horizontal">
            <dt>Número de Encomiendas nuevas / afectadas</dt>
            <dd>x</dd>
            <dt>Número de Clientes nuevos / afectados</dt>
            <dd>x</dd>
        </dl>
    </div>
</div>