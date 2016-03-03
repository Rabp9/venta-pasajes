<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bus'), ['action' => 'edit', $bus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bus'), ['action' => 'delete', $bus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="buses view large-9 medium-8 columns content">
    <h3><?= h($bus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Placa') ?></th>
            <td><?= h($bus->placa) ?></td>
        </tr>
        <tr>
            <th><?= __('Chasis') ?></th>
            <td><?= h($bus->chasis) ?></td>
        </tr>
        <tr>
            <th><?= __('Año') ?></th>
            <td><?= h($bus->año) ?></td>
        </tr>
        <tr>
            <th><?= __('Motor') ?></th>
            <td><?= h($bus->motor) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $bus->has('estado') ? $this->Html->link($bus->estado->id, ['controller' => 'Estados', 'action' => 'view', $bus->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($bus->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Asientos') ?></th>
            <td><?= $this->Number->format($bus->asientos) ?></td>
        </tr>
    </table>
</div>
