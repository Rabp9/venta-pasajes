<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Agencia'), ['action' => 'edit', $agencia->cod_agencia]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Agencia'), ['action' => 'delete', $agencia->cod_agencia], ['confirm' => __('Are you sure you want to delete # {0}?', $agencia->cod_agencia)]) ?> </li>
        <li><?= $this->Html->link(__('List Agencias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agencia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ubigeos'), ['controller' => 'Ubigeos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ubigeo'), ['controller' => 'Ubigeos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="agencias view large-9 medium-8 columns content">
    <h3><?= h($agencia->cod_agencia) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ubigeo') ?></th>
            <td><?= $agencia->has('ubigeo') ? $this->Html->link($agencia->ubigeo->id, ['controller' => 'Ubigeos', 'action' => 'view', $agencia->ubigeo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Direccion') ?></th>
            <td><?= h($agencia->direccion) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefono') ?></th>
            <td><?= h($agencia->telefono) ?></td>
        </tr>
        <tr>
            <th><?= __('Cod Agencia') ?></th>
            <td><?= $this->Number->format($agencia->cod_agencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Celular') ?></th>
            <td><?= $this->Number->format($agencia->celular) ?></td>
        </tr>
    </table>
</div>
