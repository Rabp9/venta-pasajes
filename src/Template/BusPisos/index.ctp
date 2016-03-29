<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bus Piso'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="busPisos index large-9 medium-8 columns content">
    <h3><?= __('Bus Pisos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('bus_id') ?></th>
                <th><?= $this->Paginator->sort('imagen') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($busPisos as $busPiso): ?>
            <tr>
                <td><?= $this->Number->format($busPiso->id) ?></td>
                <td><?= $busPiso->has('bus') ? $this->Html->link($busPiso->bus->placa, ['controller' => 'Buses', 'action' => 'view', $busPiso->bus->id]) : '' ?></td>
                <td><?= h($busPiso->imagen) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $busPiso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $busPiso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $busPiso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busPiso->id)]) ?>
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
