<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ubigeo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agencias'), ['controller' => 'Agencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agencia'), ['controller' => 'Agencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ubigeos index large-9 medium-8 columns content">
    <h3><?= __('Ubigeos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('lft') ?></th>
                <th><?= $this->Paginator->sort('rght') ?></th>
                <th><?= $this->Paginator->sort('descripcion') ?></th>
                <th><?= $this->Paginator->sort('categoria') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ubigeos as $ubigeo): ?>
            <tr>
                <td><?= $this->Number->format($ubigeo->id) ?></td>
                <td><?= $ubigeo->has('parent_ubigeo') ? $this->Html->link($ubigeo->parent_ubigeo->id, ['controller' => 'Ubigeos', 'action' => 'view', $ubigeo->parent_ubigeo->id]) : '' ?></td>
                <td><?= h($ubigeo->lft) ?></td>
                <td><?= h($ubigeo->rght) ?></td>
                <td><?= h($ubigeo->descripcion) ?></td>
                <td><?= h($ubigeo->categoria) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ubigeo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ubigeo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ubigeo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ubigeo->id)]) ?>
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
