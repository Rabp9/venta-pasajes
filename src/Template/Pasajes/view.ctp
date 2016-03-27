<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pasaje'), ['action' => 'edit', $pasaje->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pasaje'), ['action' => 'delete', $pasaje->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pasaje->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pasajes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pasaje'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bus Asientos'), ['controller' => 'BusAsientos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus Asiento'), ['controller' => 'BusAsientos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Programaciones'), ['controller' => 'Programaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Programacione'), ['controller' => 'Programaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pasajes view large-9 medium-8 columns content">
    <h3><?= h($pasaje->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Persona') ?></th>
            <td><?= $pasaje->has('persona') ? $this->Html->link($pasaje->persona->id, ['controller' => 'Personas', 'action' => 'view', $pasaje->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Bus Asiento') ?></th>
            <td><?= $pasaje->has('bus_asiento') ? $this->Html->link($pasaje->bus_asiento->id, ['controller' => 'BusAsientos', 'action' => 'view', $pasaje->bus_asiento->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Programacione') ?></th>
            <td><?= $pasaje->has('programacione') ? $this->Html->link($pasaje->programacione->id, ['controller' => 'Programaciones', 'action' => 'view', $pasaje->programacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pasaje->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($pasaje->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Fechahora') ?></th>
            <td><?= h($pasaje->fechahora) ?></td>
        </tr>
    </table>
</div>
