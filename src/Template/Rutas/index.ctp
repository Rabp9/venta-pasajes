<!-- src/Template/Rutas/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Programación");
$this->assign("title", "Rutas");
?>
<div class="row">
    <div class="col-sm-2">
        <ul class="nav nav-pills nav-stacked" ng-repeat="ruta in rutas">
            <li role="presentation"><a href="#">{{ ruta.descripcion }}</a></li>
        </ul>
    </div>
    <div class="col-sm-10">
        sadas
    </div>
</div>