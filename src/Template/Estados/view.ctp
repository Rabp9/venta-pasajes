<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bus'), ['controller' => 'Bus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Bus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bus Asientos'), ['controller' => 'BusAsientos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus Asiento'), ['controller' => 'BusAsientos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estados view large-9 medium-8 columns content">
    <h3><?= h($estado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($estado->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($estado->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bus') ?></h4>
        <?php if (!empty($estado->bus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Placa') ?></th>
                <th><?= __('Chasis') ?></th>
                <th><?= __('Asintos') ?></th>
                <th><?= __('Estado Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->bus as $bus): ?>
            <tr>
                <td><?= h($bus->id) ?></td>
                <td><?= h($bus->placa) ?></td>
                <td><?= h($bus->chasis) ?></td>
                <td><?= h($bus->asintos) ?></td>
                <td><?= h($bus->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bus', 'action' => 'view', $bus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bus', 'action' => 'edit', $bus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bus', 'action' => 'delete', $bus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bus Asientos') ?></h4>
        <?php if (!empty($estado->bus_asientos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Cod Asiento') ?></th>
                <th><?= __('Nro Asiento') ?></th>
                <th><?= __('Cod Bus') ?></th>
                <th><?= __('Estado Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->bus_asientos as $busAsientos): ?>
            <tr>
                <td><?= h($busAsientos->cod_asiento) ?></td>
                <td><?= h($busAsientos->nro_asiento) ?></td>
                <td><?= h($busAsientos->cod_bus) ?></td>
                <td><?= h($busAsientos->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BusAsientos', 'action' => 'view', $busAsientos->cod_asiento]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BusAsientos', 'action' => 'edit', $busAsientos->cod_asiento]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BusAsientos', 'action' => 'delete', $busAsientos->cod_asiento], ['confirm' => __('Are you sure you want to delete # {0}?', $busAsientos->cod_asiento)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Buses') ?></h4>
        <?php if (!empty($estado->buses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Placa') ?></th>
                <th><?= __('Chasis') ?></th>
                <th><?= __('Asientos') ?></th>
                <th><?= __('Año') ?></th>
                <th><?= __('Motor') ?></th>
                <th><?= __('Estado Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->buses as $buses): ?>
            <tr>
                <td><?= h($buses->id) ?></td>
                <td><?= h($buses->placa) ?></td>
                <td><?= h($buses->chasis) ?></td>
                <td><?= h($buses->asientos) ?></td>
                <td><?= h($buses->año) ?></td>
                <td><?= h($buses->motor) ?></td>
                <td><?= h($buses->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Buses', 'action' => 'view', $buses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Buses', 'action' => 'edit', $buses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Buses', 'action' => 'delete', $buses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
