<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tarifa'), ['action' => 'edit', $tarifa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tarifa'), ['action' => 'delete', $tarifa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarifa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tarifas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tarifa'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tarifas view large-9 medium-8 columns content">
    <h3><?= h($tarifa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tarifa->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Origen') ?></th>
            <td><?= $this->Number->format($tarifa->origen) ?></td>
        </tr>
        <tr>
            <th><?= __('Destino') ?></th>
            <td><?= $this->Number->format($tarifa->destino) ?></td>
        </tr>
        <tr>
            <th><?= __('Precio Min') ?></th>
            <td><?= $this->Number->format($tarifa->precio_min) ?></td>
        </tr>
        <tr>
            <th><?= __('Precio Max') ?></th>
            <td><?= $this->Number->format($tarifa->precio_max) ?></td>
        </tr>
        <tr>
            <th><?= __('Tiempo') ?></th>
            <td><?= $this->Number->format($tarifa->tiempo) ?></td>
        </tr>
    </table>
</div>
