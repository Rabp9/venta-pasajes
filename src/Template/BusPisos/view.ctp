<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bus Piso'), ['action' => 'edit', $busPiso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bus Piso'), ['action' => 'delete', $busPiso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busPiso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bus Pisos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus Piso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="busPisos view large-9 medium-8 columns content">
    <h3><?= h($busPiso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Bus') ?></th>
            <td><?= $busPiso->has('bus') ? $this->Html->link($busPiso->bus->placa, ['controller' => 'Buses', 'action' => 'view', $busPiso->bus->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Imagen') ?></th>
            <td><?= h($busPiso->imagen) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($busPiso->id) ?></td>
        </tr>
    </table>
</div>
