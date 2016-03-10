<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Detalle Desplazamiento'), ['action' => 'edit', $detalleDesplazamiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Detalle Desplazamiento'), ['action' => 'delete', $detalleDesplazamiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleDesplazamiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Desplazamientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Desplazamiento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rutas'), ['controller' => 'Rutas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ruta'), ['controller' => 'Rutas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Programacion Viajes'), ['controller' => 'ProgramacionViajes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Programacion Viaje'), ['controller' => 'ProgramacionViajes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agencias'), ['controller' => 'Agencias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agencia'), ['controller' => 'Agencias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="detalleDesplazamientos view large-9 medium-8 columns content">
    <h3><?= h($detalleDesplazamiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ruta') ?></th>
            <td><?= $detalleDesplazamiento->has('ruta') ? $this->Html->link($detalleDesplazamiento->ruta->id, ['controller' => 'Rutas', 'action' => 'view', $detalleDesplazamiento->ruta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Programacion Viaje') ?></th>
            <td><?= $detalleDesplazamiento->has('programacion_viaje') ? $this->Html->link($detalleDesplazamiento->programacion_viaje->id, ['controller' => 'ProgramacionViajes', 'action' => 'view', $detalleDesplazamiento->programacion_viaje->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Agencia') ?></th>
            <td><?= $detalleDesplazamiento->has('agencia') ? $this->Html->link($detalleDesplazamiento->agencia->cod_agencia, ['controller' => 'Agencias', 'action' => 'view', $detalleDesplazamiento->agencia->cod_agencia]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($detalleDesplazamiento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Hora Salida') ?></th>
            <td><?= h($detalleDesplazamiento->hora_salida) ?></td>
        </tr>
        <tr>
            <th><?= __('Hora Llegada') ?></th>
            <td><?= h($detalleDesplazamiento->hora_llegada) ?></td>
        </tr>
    </table>
</div>
