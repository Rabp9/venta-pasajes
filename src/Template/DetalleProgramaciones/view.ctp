<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Detalle Programacione'), ['action' => 'edit', $detalleProgramacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Detalle Programacione'), ['action' => 'delete', $detalleProgramacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleProgramacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Programaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Programacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rutas'), ['controller' => 'Rutas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ruta'), ['controller' => 'Rutas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Programaciones'), ['controller' => 'Programaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Programacione'), ['controller' => 'Programaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="detalleProgramaciones view large-9 medium-8 columns content">
    <h3><?= h($detalleProgramacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ruta') ?></th>
            <td><?= $detalleProgramacione->has('ruta') ? $this->Html->link($detalleProgramacione->ruta->descripcion, ['controller' => 'Rutas', 'action' => 'view', $detalleProgramacione->ruta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Programacione') ?></th>
            <td><?= $detalleProgramacione->has('programacione') ? $this->Html->link($detalleProgramacione->programacione->id, ['controller' => 'Programaciones', 'action' => 'view', $detalleProgramacione->programacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Servicio') ?></th>
            <td><?= $detalleProgramacione->has('servicio') ? $this->Html->link($detalleProgramacione->servicio->descripcion, ['controller' => 'Servicios', 'action' => 'view', $detalleProgramacione->servicio->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($detalleProgramacione->id) ?></td>
        </tr>
    </table>
</div>
