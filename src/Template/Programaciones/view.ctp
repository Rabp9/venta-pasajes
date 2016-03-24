<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Programacione'), ['action' => 'edit', $programacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Programacione'), ['action' => 'delete', $programacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Programaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Programacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="programaciones view large-9 medium-8 columns content">
    <h3><?= h($programacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Bus') ?></th>
            <td><?= $programacione->has('bus') ? $this->Html->link($programacione->bus->placa, ['controller' => 'Buses', 'action' => 'view', $programacione->bus->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($programacione->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fechahora Prog') ?></th>
            <td><?= h($programacione->fechahora_prog) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Via') ?></th>
            <td><?= h($programacione->fecha_via) ?></td>
        </tr>
    </table>
</div>
