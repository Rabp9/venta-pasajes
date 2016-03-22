<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Detalle Programacione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rutas'), ['controller' => 'Rutas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ruta'), ['controller' => 'Rutas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programaciones'), ['controller' => 'Programaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Programacione'), ['controller' => 'Programaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleProgramaciones index large-9 medium-8 columns content">
    <h3><?= __('Detalle Programaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ruta_id') ?></th>
                <th><?= $this->Paginator->sort('programacion_id') ?></th>
                <th><?= $this->Paginator->sort('servicio_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalleProgramaciones as $detalleProgramacione): ?>
            <tr>
                <td><?= $this->Number->format($detalleProgramacione->id) ?></td>
                <td><?= $detalleProgramacione->has('ruta') ? $this->Html->link($detalleProgramacione->ruta->descripcion, ['controller' => 'Rutas', 'action' => 'view', $detalleProgramacione->ruta->id]) : '' ?></td>
                <td><?= $detalleProgramacione->has('programacione') ? $this->Html->link($detalleProgramacione->programacione->id, ['controller' => 'Programaciones', 'action' => 'view', $detalleProgramacione->programacione->id]) : '' ?></td>
                <td><?= $detalleProgramacione->has('servicio') ? $this->Html->link($detalleProgramacione->servicio->descripcion, ['controller' => 'Servicios', 'action' => 'view', $detalleProgramacione->servicio->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $detalleProgramacione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detalleProgramacione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detalleProgramacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleProgramacione->id)]) ?>
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
