<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Agencias");
?>
<style>
    .animated {
        opacity: 2;
        max-height: auto;
        overflow: hidden;
        transition: all 2%;
    }
    
    .animated.ng-hide {
        opacity: 0;
        max-height: 0px !important;
        display: block !important;
    }
</style>
<div id="marco_include">
    <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
        <div id="busqueda">
            <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                <thead>
                    <tr class="e34X" id="panel_status">
                        <th width="3%" align="center"><?= $this->Paginator->sort("id", "Código") ?></th>
                        <th width="6%" align="center"><?= $this->Paginator->sort("ubigeo_id") ?></th>
                        <th width="8%" align="center"><?= $this->Paginator->sort("direccion") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("telefono") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("celular") ?></th>                   
                        <th width="4%" align="center"><?= __("Acciones") ?></th>
                    </tr>
                    
                    
                    
                    
                    
                    
                    
                    
                </thead>
                <tbody>
                    <tr ng-show="loading">
                        <td colspan="7">Cargando</td>
                    </tr>
                    <tr ng-show="agencias.length == 0 && !loading">
                        <td colspan="7">No hay registros de Buses</td>
                    </tr>
                    <tr ng-show="agencias.length > 0" ng-repeat="agencia in agencias" class="textnot2 animated" style="background-color: #fff;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor='#fff'">
                        <td width="3%" bgcolor="#D6E4F2">{{ agencia.id }}</td>
                        <td width="6%">{{ agencia.ubigeo_id }}</td>
                        <td width="8%">{{ agencia.direccion }}</td>
                        <td width="5%">{{ agencia.telefono }}</td>
                        <td width="5%">{{ agencia.celular }}</td>
                       
                        <td width="4%">
                            <a style="cursor: pointer;" ng-click="viewBus(agencia.id)" title="ver" data-toggle="modal" data-target="#mdlAgencias"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="editBus(agencia.id)" title="editar" data-toggle="modal" data-target="#mdlAgencias"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
                            <a style="cursor: pointer;" ng-click="removeBus(agencia.id)" title="desactivar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a class="btn btn-primary" ng-click="addAgencia()" data-toggle="modal" data-target="#mdlAgencias"><span class="glyphicon glyphicon-plus"></span> Nuevo Agencia</a>

<!-- Modal -->
<div class="modal fade" id="mdlAgencias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" ng-include="modalUrl">
        
    </div>
</div>



<!-- codigo okkkk====================== -->

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Agencia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ubigeos'), ['controller' => 'Ubigeos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ubigeo'), ['controller' => 'Ubigeos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="agencias index large-9 medium-8 columns content">
    <h3><?= __('Agencias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('cod_agencia') ?></th>
                <th><?= $this->Paginator->sort('ubigeo_id') ?></th>
                <th><?= $this->Paginator->sort('direccion') ?></th>
                <th><?= $this->Paginator->sort('telefono') ?></th>
                <th><?= $this->Paginator->sort('celular') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agencias as $agencia): ?>
            <tr>
                <td><?= $this->Number->format($agencia->cod_agencia) ?></td>
                <td><?= $agencia->has('ubigeo') ? $this->Html->link($agencia->ubigeo->id, ['controller' => 'Ubigeos', 'action' => 'view', $agencia->ubigeo->id]) : '' ?></td>
                <td><?= h($agencia->direccion) ?></td>
                <td><?= h($agencia->telefono) ?></td>
                <td><?= $this->Number->format($agencia->celular) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $agencia->cod_agencia]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $agencia->cod_agencia]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $agencia->cod_agencia], ['confirm' => __('Are you sure you want to delete # {0}?', $agencia->cod_agencia)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
