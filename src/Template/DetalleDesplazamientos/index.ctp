<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Detalle Desplazamiento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rutas'), ['controller' => 'Rutas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ruta'), ['controller' => 'Rutas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programacion Viajes'), ['controller' => 'ProgramacionViajes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Programacion Viaje'), ['controller' => 'ProgramacionViajes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agencias'), ['controller' => 'Agencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agencia'), ['controller' => 'Agencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleDesplazamientos index large-9 medium-8 columns content">
    <h3><?= __('Detalle Desplazamientos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ruta_id') ?></th>
                <th><?= $this->Paginator->sort('programacion_viaje_id') ?></th>
                <th><?= $this->Paginator->sort('agencia_id') ?></th>
                <th><?= $this->Paginator->sort('hora_salida') ?></th>
                <th><?= $this->Paginator->sort('hora_llegada') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalleDesplazamientos as $detalleDesplazamiento): ?>
            <tr>
                <td><?= $this->Number->format($detalleDesplazamiento->id) ?></td>
                <td><?= $detalleDesplazamiento->has('ruta') ? $this->Html->link($detalleDesplazamiento->ruta->id, ['controller' => 'Rutas', 'action' => 'view', $detalleDesplazamiento->ruta->id]) : '' ?></td>
                <td><?= $detalleDesplazamiento->has('programacion_viaje') ? $this->Html->link($detalleDesplazamiento->programacion_viaje->id, ['controller' => 'ProgramacionViajes', 'action' => 'view', $detalleDesplazamiento->programacion_viaje->id]) : '' ?></td>
                <td><?= $detalleDesplazamiento->has('agencia') ? $this->Html->link($detalleDesplazamiento->agencia->cod_agencia, ['controller' => 'Agencias', 'action' => 'view', $detalleDesplazamiento->agencia->cod_agencia]) : '' ?></td>
                <td><?= h($detalleDesplazamiento->hora_salida) ?></td>
                <td><?= h($detalleDesplazamiento->hora_llegada) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $detalleDesplazamiento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detalleDesplazamiento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detalleDesplazamiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleDesplazamiento->id)]) ?>
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
