<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Agencia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ubigeos'), ['controller' => 'Ubigeos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ubigeo'), ['controller' => 'Ubigeos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="agencias index large-9 medium-8 columns content">
    <h3><?= __('Agencias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('cod_agencia') ?></th>
                <th><?= $this->Paginator->sort('ubigeo_id') ?></th>
                <th><?= $this->Paginator->sort('direccion') ?></th>
                <th><?= $this->Paginator->sort('telefono') ?></th>
                <th><?= $this->Paginator->sort('celular') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agencias as $agencia): ?>
            <tr>
                <td><?= $this->Number->format($agencia->cod_agencia) ?></td>
                <td><?= $agencia->has('ubigeo') ? $this->Html->link($agencia->ubigeo->id, ['controller' => 'Ubigeos', 'action' => 'view', $agencia->ubigeo->id]) : '' ?></td>
                <td><?= h($agencia->direccion) ?></td>
                <td><?= h($agencia->telefono) ?></td>
                <td><?= $this->Number->format($agencia->celular) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $agencia->cod_agencia]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $agencia->cod_agencia]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $agencia->cod_agencia], ['confirm' => __('Are you sure you want to delete # {0}?', $agencia->cod_agencia)]) ?>
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
