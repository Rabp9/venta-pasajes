<!-- src/Template/Buses/add.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Ver Bus");
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <dl class="dl-horizontal">
            <dt>Código</dt>
            <dd><?= h($bus->id) ?></dd>
            
            <dt>Placa</dt>
            <dd><?= h($bus->placa) ?></dd>
            
            <dt>Chasis</dt>
            <dd><?= h($bus->chasis) ?></dd>
            
            <dt>Asientos</dt>
            <dd><?= h($bus->asientos) ?></dd>
            
            <dt>Año</dt>
            <dd><?= h($bus->anio) ?></dd>
            
            <dt>Motor</dt>
            <dd><?= h($bus->motor) ?></dd>
            
            <dt>Estado</dt>
            <dd><?= h($bus->estado->descripcion) ?></dd>
        </dl>
    </div>
</div>